<?php

namespace App\Http\Controllers\Admin;

use App\Services\IntroService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class IntroController
 *
 * @package App\Http\Controllers\Admin
 */
class IntroController extends Controller
{
    protected $intro;

    /**
     * IntroController constructor.
     *
     * @param IntroService $introService
     */
    public function __construct(IntroService $introService)
    {
        $this->intro = $introService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|string
     * @throws \Throwable
     */
    public function index()
    {
        return $this->intro->srvIndex();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return $this->intro->srvShow($id);
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
