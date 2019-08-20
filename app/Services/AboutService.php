<?php

namespace App\Services;

use App\Repositories\Contracts\AboutInterface;
use Illuminate\Support\Str;

/**
 * Class AboutService
 *
 * @package App\Services
 */
class AboutService
{
    protected $srvAbout;

    /**
     * AboutService constructor.
     *
     * @param AboutInterface $about
     */
    public function __construct(AboutInterface $about)
    {
        $this->srvAbout = $about;
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $abouts = $this->srvAbout->getAll($relations = ['site']);

        $imgPath = asset('/') . config('asprogrammer.paths.article_image');

        foreach($abouts as $about){
            $about->image = $imgPath . $about->img_name . '.' . $about->img_extension;
            $about->text = Str::limit($about->text, 50, '...');
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
}