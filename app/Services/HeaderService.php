<?php

namespace App\Services;

use App\Repositories\Contracts\HeaderInterface;
use Illuminate\Support\Str;

/**
 * Class HeaderService
 *
 * @package App\Services
 */
class HeaderService
{
    protected $srvHeader;

    /**
     * HeaderService constructor.
     *
     * @param HeaderInterface $header
     */
    public function __construct(HeaderInterface $header)
    {
        $this->srvHeader = $header;
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
}