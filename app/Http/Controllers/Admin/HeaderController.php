<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HeaderCreateRequest;
use App\Http\Requests\HeaderUpdateRequest;
use App\Services\HeaderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class HeaderController
 *
 * @package App\Http\Controllers\Admin
 */
class HeaderController extends Controller
{
    protected $header;

    /**
     * HeaderController constructor.
     *
     * @param HeaderService $headerService
     */
    public function __construct(HeaderService $headerService)
    {
        $this->header = $headerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|string
     * @throws \Throwable
     */
    public function index()
    {
        return $this->header->srvIndex();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|string
     * @throws \Throwable
     */
    public function create()
    {
        return $this->header->srvCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HeaderCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderCreateRequest $request)
    {
        $this->header->srvStore($request->all());

        return redirect()->route('headers.index');
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
        return $this->header->srvShow($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return array|string
     * @throws \Throwable
     */
    public function edit($id)
    {
        return $this->header->srvEdit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeaderUpdateRequest $request, $id)
    {
        $this->header->srvUpdate($request->all(), $id);

        return redirect()->route('headers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->header->srvDestroy($id);
    }
}
