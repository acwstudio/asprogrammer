<?php

namespace App\Http\Controllers;

use App\Services\SiteService;

/**
 * Class SiteController
 *
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    protected $site;

    /**
     * SiteController constructor.
     *
     * @param SiteService $siteService
     */
    public function __construct(SiteService $siteService)
    {
        $this->site = $siteService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        return $this->site->srvIndex();
    }
}
