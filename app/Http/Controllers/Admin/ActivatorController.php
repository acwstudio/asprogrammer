<?php

namespace App\Http\Controllers\Admin;

use App\Services\ActivatorService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ActivatorController
 *
 * @package App\Http\Controllers\Admin
 */
class ActivatorController extends Controller
{
    protected $activator;

    /**
     * ActivatorController constructor.
     *
     * @param ActivatorService $activatorService
     */
    public function __construct(ActivatorService $activatorService)
    {
        $this->activator = $activatorService;
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function activate(Request $request, $id = 1)
    {
//        $this->activator->srvActivate($request->all(), $id);

        return $this->activator->srvActivate($request->all(), $id);
    }
}
