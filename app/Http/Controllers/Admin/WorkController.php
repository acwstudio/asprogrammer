<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkCreateRequest;
use App\Http\Requests\WorkUpdateRequest;
use App\Services\WorkService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class WorkController
 *
 * @package App\Http\Controllers\Admin
 */
class WorkController extends Controller
{
    protected $work;

    /**
     * WorkController constructor.
     *
     * @param WorkService $workService
     */
    public function __construct(WorkService $workService)
    {
        $this->work = $workService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        return $this->work->srvIndex();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|string
     * @throws \Throwable
     */
    public function create()
    {
        return $this->work->srvCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorkCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkCreateRequest $request)
    {
        $this->work->srvStore($request->all());

        return redirect()->route('works.index');
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
        return $this->work->srvShow($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return array|string
     * @throws \Throwable
     */
    public function edit(int $id)
    {
        return $this->work->srvEdit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorkUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkUpdateRequest $request, $id)
    {
        $this->work->srvUpdate($request->all(), $id);

        return redirect()->route('works.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->work->srvDestroy($id);
    }
}
