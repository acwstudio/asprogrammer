<?php

namespace App\Repositories\DB_MySQL;

use App\Repositories\Contracts\HeaderInterface;

/**
 * Class HeaderRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class HeaderRepository extends BaseRepository implements HeaderInterface
{
    protected $modelName = '\App\Header';
}