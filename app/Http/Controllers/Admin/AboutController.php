<?php

namespace App\Http\Controllers\Admin;

use App\Services\AboutService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AboutController
 *
 * @package App\Http\Controllers\Admin
 */
class AboutController extends Controller
{
    protected $about;

    /**
     * AboutController constructor.
     *
     * @param AboutService $aboutService
     */
    public function __construct(AboutService $aboutService)
    {
        $this->about = $aboutService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|string
     * @throws \Throwable
     */
    public function index()
    {
        return $this->about->srvIndex();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|string
     * @throws \Throwable
     */
    public function create()
    {
        return $this->about->srvCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return array|string
     * @throws \Throwable
     */
    public function show($id)
    {
        return $this->about->srvShow($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
