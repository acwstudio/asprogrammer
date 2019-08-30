<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutCreateRequest;
use App\Http\Requests\AboutUpdateRequest;
use App\Services\AboutService;
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
     * @param AboutCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AboutCreateRequest $request)
    {
        $this->about->srvStore($request->all());

        return redirect()->route('abouts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return array|string
     * @throws \Throwable
     */
    public function show(int $id)
    {
        return $this->about->srvShow($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(int $id)
    {
        return $this->about->srvEdit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AboutUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AboutUpdateRequest $request, int $id)
    {
        $this->about->srvUpdate($request->all(), $id);

        return redirect()->route('abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->about->srvDestroy($id);
    }
}
