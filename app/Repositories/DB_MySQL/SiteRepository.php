<?php

namespace App\Repositories\DB_MySQL;

use App\Repositories\Contracts\SiteInterface;

/**
 * Class SiteRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class SiteRepository extends BaseRepository implements SiteInterface
{
    protected $modelName = '\App\Site';
}