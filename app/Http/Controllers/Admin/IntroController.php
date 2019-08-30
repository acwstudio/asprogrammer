<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IntroCreateRequest;
use App\Http\Requests\IntroUpdateRequest;
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
     * @return array|string
     * @throws \Throwable
     */
    public function create()
    {
        return $this->intro->srvCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(IntroCreateRequest $request)
    {
        $this->intro->srvStore($request->all());

        return redirect()->route('intros.index');
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
     * @param  int $id
     * @return array|string
     * @throws \Throwable
     */
    public function edit(int $id)
    {
        return $this->intro->srvEdit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IntroUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IntroUpdateRequest $request, int $id)
    {
        $this->intro->srvUpdate($request->all(), $id);

        return redirect()->route('intros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return $this->intro->srvDestroy($id);
    }
}
