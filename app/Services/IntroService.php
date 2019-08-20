<?php

namespace App\Services;

use App\Repositories\Contracts\IntroInterface;
use Illuminate\Support\Str;

/**
 * Class IntroService
 *
 * @package App\Services
 */
class IntroService
{
    protected $srvIntro;

    /**
     * IntroService constructor.
     *
     * @param IntroInterface $intro
     */
    public function __construct(IntroInterface $intro)
    {
        $this->srvIntro = $intro;
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $intros = $this->srvIntro->getAll($relations = ['site']);

        $imgPath = asset('/') . config('asprogrammer.paths.article_image');

        foreach($intros as $intro){
            $intro->image = $imgPath . $intro->img_name . '.' . $intro->img_extension;
            $intro->text = Str::limit($intro->text, 50, '...');
            $intro->active = $intro->site ? 1 : 0;
        }

        return view('app.intro.index', compact('intros'))->render();
    }
}