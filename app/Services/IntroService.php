<?php

namespace App\Services;

use App\Repositories\Contracts\IntroInterface;
use App\Repositories\Contracts\SiteInterface;
use App\Traits\ManageImages;
use File;
use Illuminate\Support\Str;

/**
 * Class IntroService
 *
 * @package App\Services
 */
class IntroService
{
    use ManageImages;

    protected $srvIntro;
    protected $srvSite;

    /**
     * IntroService constructor.
     *
     * @param IntroInterface $intro
     */
    public function __construct(IntroInterface $intro, SiteInterface $site)
    {
        $this->srvIntro = $intro;
        $this->srvSite = $site;
        $this->setItemsFromConfig('preset');
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $intros = $this->srvIntro->getAll($relations = ['site']);

        $pathImg = asset('/') . $this->intro['path'];

        foreach($intros as $intro){
            $intro->image = $pathImg . $intro->img_name . '.' . $intro->img_extension . '?t=' . time();
            $intro->text = Str::limit($intro->text, 50, '...');
            $intro->active = $intro->site ? 1 : 0;
        }

        return view('app.intro.index', compact('intros'))->render();
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvCreate()
    {
        return view('app.intro.create')->render();
    }

    /**
     * @param array $data
     */
    public function srvStore(array $data)
    {
        $pathImg = public_path('/') . $this->intro['path'];

        $intro = [
            'alias' => Str::random(10),
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newIntro = $this->srvIntro->store($intro);

        if ($intro['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['intro_id' => $newIntro->id];
            $this->srvSite->update($site_id, $siteData);

        }

        if ($data['img-name']) {

            $extension = File::extension($pathImg . $data['img-name']);
            $name = File::name($pathImg . $data['img-name']);

            $intro['img_name'] = 'intro_' . $newIntro->id;
            $intro['img_extension'] = $extension;

            $this->srvIntro->update($newIntro->id, $intro);

            $imageIntro = $intro['img_name'] . '.' . $intro['img_extension'];
            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageIntro);

        }

    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvShow(int $id)
    {
        $pathImg = asset('/') . $this->intro['path'];

        $intro = $this->srvIntro->getById($id, $relations = ['site']);
        $intro->image = $pathImg . $intro->img_name . '.' . $intro->img_extension;
        $intro->text = Str::limit($intro->text, 50, '...');
        $intro->active = $intro->site ? 1 : 0;

        return view('app.intro.show', compact('intro'))->render();
    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvEdit(int $id)
    {
        $intro = $this->srvIntro->getById($id);
        $intro->active = $intro->site ? 1 : 0;
        $pathImg = asset('/') . $this->intro['path'];
        $intro->image = $pathImg . $intro->img_name . '.' . $intro->img_extension;

        return view('app.intro.edit', compact('intro'))->render();
    }

    /**
     * @param array $data
     * @param int $id
     */
    public function srvUpdate(array $data, int $id)
    {
        $pathImg = public_path('/') . $this->intro['path'];

        $intro = [
            'alias' => Str::random(10),
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newIntro = $this->srvIntro->update($id, $intro);

        if ($intro['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['intro_id' => $newIntro->id];
            $this->srvSite->update($site_id, $siteData);

        }

        if ($data['img-name']) {

            $extension = File::extension($pathImg . $data['img-name']);
            $name = File::name($pathImg . $data['img-name']);

            $intro['img_name'] = 'intro_' . $newIntro->id;
            $intro['img_extension'] = $extension;

            $this->srvIntro->update($newIntro->id, $intro);

            $imageIntro = $intro['img_name'] . '.' . $intro['img_extension'];
            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageIntro);

        }
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function srvDestroy(int $id)
    {
        $pathImgDz = public_path('/') . $this->intro['path'];
        $pathImgSn = public_path('/') . $this->summernote['path'];
        $intro = $this->srvIntro->getById($id);

        if ($intro->site) {

            return 0;

        } else {

            $text = $intro->text;
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

            $fileDz = File::exists($pathImgDz . $intro->img_name . '.' . $intro->img_extension);
            if ($fileDz) {
                File::delete($pathImgDz . $intro->img_name . '.' . $intro->img_extension);
            }

            return $this->srvIntro->destroy($id);
        }

    }
}