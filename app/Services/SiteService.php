<?php

namespace App\Services;

use App\Repositories\Contracts\SiteInterface;

/**
 * Class SiteService
 *
 * @package App\Services
 */
class SiteService
{
    protected $srvSite;

    /**
     * SiteService constructor.
     *
     * @param SiteInterface $site
     */
    public function __construct(SiteInterface $site)
    {
        $this->srvSite = $site;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $site = $this->srvSite->getAll($relations = ['about', 'work', 'intro', 'header'])->first();
        $site->about->image = $site->about->img_name . '.' . $site->about->img_extension;
        $site->intro->image = $site->intro->img_name . '.' . $site->intro->img_extension;
        $site->work->image = $site->work->img_name . '.' . $site->work->img_extension;
        //dd($site);
        return view('dim.dimension', compact('site'))->render();
    }
}