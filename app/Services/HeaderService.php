<?php

namespace App\Services;

use App\Repositories\Contracts\HeaderInterface;
use App\Repositories\Contracts\SiteInterface;
use Illuminate\Support\Str;

/**
 * Class HeaderService
 *
 * @package App\Services
 */
class HeaderService
{
    protected $srvHeader;
    protected $srvSite;

    /**
     * HeaderService constructor.
     *
     * @param HeaderInterface $header
     */
    public function __construct(HeaderInterface $header, SiteInterface $site)
    {
        $this->srvHeader = $header;
        $this->srvSite = $site;
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvIndex()
    {
        $headers = $this->srvHeader->getAll($relations = ['site']);

        foreach($headers as $header){
            $header->text = Str::limit($header->text, 50, '...');
            $header->active = $header->site ? 1 : 0;
        }

        return view('app.header.index', compact('headers'))->render();
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function srvCreate()
    {
        return view('app.header.create')->render();
    }

    /**
     * @param array $data
     */
    public function srvStore(array $data)
    {
        //$pathImg = public_path('/') . $this->header['path'];

        //$files = File::exists($pathImg . $data['img-name']);

        $header = [
            'alias' => Str::random(10),
            'icon' => 'fa-gem',
            //'img_name' => 'header_',
            //'img_extension' => 'jpg',
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newHeader = $this->srvHeader->store($header);

        if ($header['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['header_id' => $newHeader->id];
            $this->srvSite->update($site_id, $siteData);

        }

//        if ($files) {
//
//            $extension = File::extension($pathImg . $data['img-name']);
//            $name = File::name($pathImg . $data['img-name']);
//
//            $header['img_name'] = 'header_' . $newHeader->id;
//            $header['img_extension'] = $extension;
//
//            $this->srvHeader->update($newHeader->id, $header);
//
//            $imageHeader = $header['img_name'] . '.' . $header['img_extension'];
//            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageHeader);
//
//        }

    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvShow(int $id)
    {
        $header = $this->srvHeader->getById($id, $relations = ['site']);
        $header->text = Str::limit($header->text, 50, '...');
        $header->active = $header->site ? 1 : 0;

        return view('app.header.show', compact('header'))->render();
    }

    /**
     * @param int $id
     * @return array|string
     * @throws \Throwable
     */
    public function srvEdit(int $id)
    {
        $header = $this->srvHeader->getById($id);
        $header->active = $header->site ? 1 : 0;
//        $pathImg = asset('/') . $this->header['path'];
//        $header->image = $pathImg . $header->img_name . '.' . $header->img_extension;

        return view('app.header.edit', compact('header'))->render();
    }

    /**
     * @param array $data
     * @param int $id
     */
    public function srvUpdate(array $data, int $id)
    {
//        $pathImg = public_path('/') . $this->header['path'];
//
//        $files = File::exists($pathImg . $data['img-name']);

        $header = [
            'alias' => Str::random(10),
            'icon' => 'fa-gem',
//            'img_name' => 'header_',
//            'img_extension' => 'jpg',
            'active' => isset($data['active']) ? 1 : 0,
            app()->getLocale() => [
                'title' => $data['title'],
                'text' => $data['text'],
                'description' => $data['description'],
            ],
        ];

        $newHeader = $this->srvHeader->update($id, $header);

        if ($header['active']) {

            $site_id = $this->srvSite->getAll()->first()->id;
            $siteData = ['header_id' => $newHeader->id];
            $this->srvSite->update($site_id, $siteData);

        }

//        if ($files) {
//
//            $extension = File::extension($pathImg . $data['img-name']);
//            $name = File::name($pathImg . $data['img-name']);
//
//            $header['img_name'] = 'header_' . $newHeader->id;
//            $header['img_extension'] = $extension;
//
//            $this->srvHeader->update($newHeader->id, $header);
//
//            $imageHeader = $header['img_name'] . '.' . $header['img_extension'];
//            File::move($pathImg . $name . '.' . $extension, $pathImg . $imageHeader);
//
//        }
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public function srvDestroy(int $id)
    {
//        $pathImgDz = public_path('/') . $this->header['path'];
//        $pathImgSn = public_path('/') . $this->summernote['path'];
        $header = $this->srvHeader->getById($id);

        if ($header->site) {

            return 0;

        } else {

//            $text = $header->text;
//            preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $text, $out);
//            $images = [];
//            foreach($out[0] as $image){
//                $pos = strpos($image, 'summernote-');
//                $name = substr($image, $pos);
//                array_push($images, $name);
//            }

//            foreach ($images as $image) {
//                if (File::exists($pathImgSn . $image)){
//                    File::delete($pathImgSn . $image);
//                }
//            }

//            $fileDz = File::exists($pathImgDz . $header->img_name . '.' . $header->img_extension);
//            if ($fileDz) {
//                File::delete($pathImgDz . $header->img_name . '.' . $header->img_extension);
//            }

            return $this->srvHeader->destroy($id);
        }

    }
}