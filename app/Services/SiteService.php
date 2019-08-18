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

        return view('dim.dimension', compact('site'))->render();
    }
}