<?php

namespace App\Services;

use App\Repositories\Contracts\SiteInterface;
use App\Repositories\Contracts\WorkInterface;
use App\Traits\ManageImages;
use File;
use Illuminate\Support\Str;

/**
 * Class WorkService
 *
 * @package App\Services
 */
class WorkService
{
    use ManageImages;

    protected $srvWork;
    protected $srvSite;

    /**
     * WorkService constructor.
     *
     * @param WorkInterface $work
     */
    public function __construct(WorkInterface $work, SiteInterface $site)
    {
        $this->srvWork = $work;
        $this->srvSite = $site;
        $this->setItemsFromConfig('preset');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $works = $this->srvWork->getAll($relations = ['site']);

        $pathImg = asset('/') . $this->work['path'];

        foreach($works as $work){
            $work->image = $pathImg . $work->img_name . '.' . $work->img_extension;
            $work->text = Str::limit($work->text, 50, '...');
            $work->active = $work->site ? 1 : 0;
        }

        return view('app.work.index', compact('works'))->render();
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvCreate()
    {
        return view('app.work.create')->render();
    }

    /**
     * @param array $data
     */
    public function srvStore(array $data)
    {
        $pathImg = public_path('/') . $this->work['path'];

        $files = File::exists($pathImg . $data['img-name']);

        $work = [
            'alias' => Str::random(10),
            'img_name' => 'work_',
            'img_extension' => 'jpg',
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newWork = $this->srvWork->store($work);

        if ($work['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['work_id' => $newWork->id];
            $this->srvSite->update($site_id, $siteData);

        }

        if ($files) {

            $extension = File::extension($pathImg . $data['img-name']);
            $name = File::name($pathImg . $data['img-name']);

            $work['img_name'] = 'work_' . $newWork->id;
            $work['img_extension'] = $extension;

            $this->srvWork->update($newWork->id, $work);

            $imageWork = $work['img_name'] . '.' . $work['img_extension'];
            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageWork);

        }

    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvShow(int $id)
    {
        $pathImg = asset('/') . $this->work['path'];

        $work = $this->srvWork->getById($id, $relations = ['site']);
        $work->image = $pathImg . $work->img_name . '.' . $work->img_extension;
        $work->text = Str::limit($work->text, 50, '...');
        $work->active = $work->site ? 1 : 0;

        return view('app.work.show', compact('work'))->render();
    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvEdit(int $id)
    {
        $work = $this->srvWork->getById($id);
        $pathImg = asset('/') . $this->work['path'];
        $work->image = $pathImg . $work->img_name . '.' . $work->img_extension;

        return view('app.work.edit', compact('work'))->render();
    }

    /**
     * @param array $data
     * @param int $id
     */
    public function srvUpdate(array $data, int $id)
    {
        $pathImg = public_path('/') . $this->work['path'];

        $files = File::exists($pathImg . $data['img-name']);

        $work = [
            'alias' => Str::random(10),
            'img_name' => 'work_',
            'img_extension' => 'jpg',
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newWork = $this->srvWork->update($id, $work);

        if ($work['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['work_id' => $newWork->id];
            $this->srvSite->update($site_id, $siteData);

        }

        if ($files) {

            $extension = File::extension($pathImg . $data['img-name']);
            $name = File::name($pathImg . $data['img-name']);

            $work['img_name'] = 'work_' . $newWork->id;
            $work['img_extension'] = $extension;

            $this->srvWork->update($newWork->id, $work);

            $imageWork = $work['img_name'] . '.' . $work['img_extension'];
            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageWork);

        }
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function srvDestroy(int $id)
    {
        $pathImgDz = public_path('/') . $this->work['path'];
        $pathImgSn = public_path('/') . $this->summernote['path'];
        $work = $this->srvWork->getById($id);

        if ($work->site) {

            return 0;

        } else {

            $text = $work->text;
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

            $fileDz = File::exists($pathImgDz . $work->img_name . '.' . $work->img_extension);
            if ($fileDz) {
                File::delete($pathImgDz . $work->img_name . '.' . $work->img_extension);
            }

            return $this->srvWork->destroy($id);
        }

    }
}