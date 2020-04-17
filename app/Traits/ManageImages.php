<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Spatie\Image\Image;

/**
 * Trait ManageImages
 *
 * @package App\Traits
 */
trait ManageImages
{
    public $imageDefaults;
    public $about;
    public $intro;
    public $work;
    public $summernote;

    /**
     * @param $imageTypeKey
     */
    private function setItemsFromConfig($imageTypeKey)
    {
        $imageType = 'asp-images.' . $imageTypeKey;
        $this->imageDefaults = config($imageType);
        $this->setImageProperties();
    }

    private function setImageProperties()
    {
        if ($this->imageDefaults){
            foreach ($this->imageDefaults as $propertyName => $propertyValue){

                if ( property_exists( $this , $propertyName) ){
                    $this->$propertyName = $propertyValue;

                    if (!is_dir($this->$propertyName['temp'])){
                        File::makeDirectory(public_path('/') . $this->$propertyName['temp'], 0775, true, true);
                    }

                    if (!is_dir($this->$propertyName['path'])){
                        File::makeDirectory(public_path('/') . $this->$propertyName['path'], 0775, true, true);
                    }

                }

            }
        }
    }

    /**
     * @param $propsImage
     * @param Request $request
     * @return string
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    private function storeImage($propsImage, $request)
    {
        $file = $request->file('file');

        $temp_image_name = $propsImage['prefix'] . $request->fileId
            . '.' . $file->getClientOriginalExtension();

        $spatie = Image::load($file);

        $spatie->fit(
            $propsImage['manipulation'],
            $propsImage['width'],
            $propsImage['height']
        )->save(public_path('/') . $propsImage['path'] . $temp_image_name);

        return $temp_image_name;
    }

    /**
     * @param $propsImage
     * @param Request $request
     * @return mixed
     */
    private function deleteImage($propsImage, $request)
    {
        if (file_exists(public_path('/') . $propsImage['path'] . $request->fileName)){

            File::delete(public_path('/') . $propsImage['path'] . $request->fileName);

            return $request->fileName;

        }

        return $request->fileName;
    }
}
