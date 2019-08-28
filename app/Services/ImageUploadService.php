<?php


namespace App\Services;

use App\Traits\ManageImages;

/**
 * Class ImageUploadService
 *
 * @package App\Services
 */
class ImageUploadService
{
    use ManageImages;

    public function __construct()
    {

    }

    /**
     * @param $request
     * @return string
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
//    public function srvDropzoneStore($request)
//    {
//        $this->setItemsFromConfig('preset');
//
//        $useImage = $request->useImage;
//        $propsImage = $this->$useImage;
//
//        return $this->storeImage($propsImage, $request);
//    }

    /**
     * @param $request
     * @return mixed
     */
//    public function srvDropzoneDelete($request)
//    {
//        $this->setItemsFromConfig('preset');
//
//        $useImage = $request->useImage;
//        $propsImage = $this->$useImage;
//
//        return $this->deleteImage($propsImage, $request);
//    }

    /**
     * @param $request
     * @return string
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
//    public function srvSummernoteStore($request)
//    {
//        $this->setItemsFromConfig('preset');
//
//        $useImage = $request->useImage;
//        $propsImage = $this->$useImage;
//
//        return asset('/') . $propsImage['path'] . $this->storeImage($propsImage, $request);
//    }

    /**
     * @param $request
     * @return mixed
     */
//    public function srvSummernoteDelete($request)
//    {
//        $this->setItemsFromConfig('preset');
//
//        $useImage = $request->useImage;
//        $propsImage = $this->$useImage;
//
//        return $this->deleteImage($propsImage, $request);
//    }

    /**
     * @param $request
     * @return array
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function srvStore($request)
    {
        $this->setItemsFromConfig('preset');

        $useImage = $request->useImage;
        $propsImage = $this->$useImage;

        $path = asset('/') . $propsImage['path'];
        $nameImage = $this->storeImage($propsImage, $request);

        return compact('path', 'nameImage');
    }

    /**
     * @param $request
     * @return mixed
     */
    public function srvDelete($request)
    {
        $this->setItemsFromConfig('preset');

        $useImage = $request->useImage;
        $propsImage = $this->$useImage;

        return $this->deleteImage($propsImage, $request);
    }
}