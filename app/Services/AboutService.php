<?php

namespace App\Services;

use App\Repositories\Contracts\AboutInterface;
use App\Repositories\Contracts\SiteInterface;
use App\Traits\ManageImages;
use File;
use Illuminate\Support\Str;

/**
 * Class AboutService
 *
 * @package App\Services
 */
class AboutService
{
    use ManageImages;

    protected $srvAbout;
    protected $srvSite;

    /**
     * AboutService constructor.
     *
     * @param AboutInterface $about
     */
    public function __construct(AboutInterface $about, SiteInterface $site)
    {
        $this->srvAbout = $about;
        $this->srvSite = $site;
        $this->setItemsFromConfig('preset');
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $abouts = $this->srvAbout->getAll($relations = ['site']);

        $pathImg = asset('/') . $this->about['path'];

        foreach($abouts as $about){

            $about->image = $pathImg . $about->img_name . '.' . $about->img_extension . '?t=' . time();
            $about->text = $about->text ? 'Text exists, but it is very long...' : 'No translated';
            $about->active = $about->site ? 1 : 0;

        }

        return view('app.about.index', compact('abouts'))->render();
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvCreate()
    {
        return view('app.about.create')->render();
    }

    /**
     * @param array $data
     */
    public function srvStore(array $data)
    {
        $pathImg = public_path('/') . $this->about['path'];

        $files = File::exists($pathImg . $data['img-name']);

        $about = [
            'alias' => Str::random(10),
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newAbout = $this->srvAbout->store($about);

        if ($about['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['about_id' => $newAbout->id];
            $this->srvSite->update($site_id, $siteData);

        }

        if ($data['img-name']) {

            $extension = File::extension($pathImg . $data['img-name']);
            $name = File::name($pathImg . $data['img-name']);

            $about['img_name'] = 'about_' . $newAbout->id;
            $about['img_extension'] = $extension;

            $this->srvAbout->update($newAbout->id, $about);

            $imageAbout = $about['img_name'] . '.' . $about['img_extension'];
            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageAbout);

        }

    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvShow(int $id)
    {
        $pathImg = asset('/') . $this->about['path'];

        $about = $this->srvAbout->getById($id, $relations = ['site']);
        $about->image = $pathImg . $about->img_name . '.' . $about->img_extension;
        $about->text = Str::limit($about->text, 250, '...');
        $about->active = $about->site ? 1 : 0;

        return view('app.about.show', compact('about'))->render();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function srvEdit(int $id)
    {
        $about = $this->srvAbout->getById($id);
        $about->active = $about->site ? 1 : 0;
        $pathImg = asset('/') . $this->about['path'];
        $about->image = $pathImg . $about->img_name . '.' . $about->img_extension;

        return view('app.about.edit', compact('about'))->render();
    }

    /**
     * @param array $data
     * @param int $id
     */
    public function srvUpdate(array $data, int $id)
    {
        $pathImg = public_path('/') . $this->about['path'];

        $about = [
            'alias' => Str::random(10),
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newAbout = $this->srvAbout->update($id, $about);

        if ($about['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['about_id' => $newAbout->id];
            $this->srvSite->update($site_id, $siteData);

        }

        if ($data['img-name']) {

            $extension = File::extension($pathImg . $data['img-name']);
            $name = File::name($pathImg . $data['img-name']);

            $about['img_name'] = 'about_' . $newAbout->id;
            $about['img_extension'] = $extension;

            $this->srvAbout->update($newAbout->id, $about);

            $imageAbout = $about['img_name'] . '.' . $about['img_extension'];
            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageAbout);

        }
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function srvDestroy(int $id)
    {
        $pathImgDz = public_path('/') . $this->about['path'];
        $pathImgSn = public_path('/') . $this->summernote['path'];
        $about = $this->srvAbout->getById($id);

        if ($about->site) {

            return 0;

        } else {

            $text = $about->text;
            preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $text, $out);
            $images = [];
            foreach($out[0] as $image){
                $pos = strpos($image, 'summernote-');
                $name = substr($image, $pos);
                array_push($images, $name);
            }

            foreach ($images as $image) {
                if (File::exists($pathImgSn . $image)){
                    File::delete($pathImgSn . $image);
                }
            }

            $fileDz = File::exists($pathImgDz . $about->img_name . '.' . $about->img_extension);
            if ($fileDz) {
                File::delete($pathImgDz . $about->img_name . '.' . $about->img_extension);
            }

            return $this->srvAbout->destroy($id);
        }

    }
}