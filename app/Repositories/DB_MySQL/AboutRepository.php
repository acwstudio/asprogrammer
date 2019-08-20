<?php

namespace App\Repositories\DB_MySQL;

use App\Repositories\Contracts\AboutInterface;

/**
 * Class AboutRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class AboutRepository extends BaseRepository implements AboutInterface
{
    protected $modelName = '\App\About';
}