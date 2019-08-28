<?php

namespace App\Http\Controllers\Admin;

use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ImageUploadController
 *
 * @package App\Http\Controllers\Admin
 */
class ImageUploadController extends Controller
{
    protected $image;

    /**
     * ImageUploadController constructor.
     *
     * @param ImageUploadService $imageUploadService
     */
    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->image = $imageUploadService;
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
//    public function dropzoneStore(Request $request)
//    {
//        return $this->image->srvDropzoneStore($request);
//    }

    /**
     * @param Request $request
     * @return mixed
     */
//    public function dropzoneDelete(Request $request)
//    {
//        return $this->image->srvDropzoneDelete($request);
//    }

    /**
     * @param Request $request
     * @return string
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
//    public function summernoteStore(Request $request)
//    {
//        return $this->image->srvSummernoteStore($request);
//    }

    /**
     * @param Request $request
     * @return string
     */
//    public function summernoteDelete(Request $request)
//    {
//        return $this->image->srvSummernoteDelete($request);
//    }

    /**
     * @param Request $request
     * @return array
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function store(Request $request)
    {
        return $this->image->srvStore($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        return $this->image->srvDelete($request);
    }
}
