<?php

namespace App\Services;

use App\Repositories\Contracts\WorkInterface;
use Illuminate\Support\Str;

/**
 * Class WorkService
 *
 * @package App\Services
 */
class WorkService
{
    protected $srvWork;

    /**
     * WorkService constructor.
     *
     * @param WorkInterface $work
     */
    public function __construct(WorkInterface $work)
    {
        $this->srvWork = $work;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $works = $this->srvWork->getAll($relations = ['site']);

        $imgPath = asset('/') . config('asprogrammer.paths.article_image');

        foreach($works as $work){
            $work->image = $imgPath . $work->img_name . '.' . $work->img_extension;
            $work->text = Str::limit($work->text, 50, '...');
            $work->active = $work->site ? 1 : 0;
        }

        return view('app.work.index', compact('works'))->render();
    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvShow(int $id)
    {
        $imgPath = asset('/') . config('asprogrammer.paths.article_image');

        $work = $this->srvWork->getById($id, $relations = ['site']);
        $work->image = $imgPath . $work->img_name . '.' . $work->img_extension;
        $work->text = Str::limit($work->text, 50, '...');
        $work->active = $work->site ? 1 : 0;

        return view('app.work.show', compact('work'))->render();
    }
}