<?php

namespace App\Services;

use App\Repositories\Contracts\AboutInterface;
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

    /**
     * AboutService constructor.
     *
     * @param AboutInterface $about
     */
    public function __construct(AboutInterface $about)
    {
        $this->srvAbout = $about;
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

            $about->image = $pathImg . $about->img_name . '.' . $about->img_extension;
//            $about->text = Str::limit($about->text, 150, '...');
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
            'img_name' => 'about_',
            'img_extension' => 'jpg',
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newAbout = $this->srvAbout->store($about);

        if ($files) {

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
     */
    public function srvDestroy(int $id)
    {
        $about = $this->srvAbout->getById($id);

        if ($about->site) {
            return 0;
        } else {
            return $this->srvAbout->destroy($id);
        }

    }
}