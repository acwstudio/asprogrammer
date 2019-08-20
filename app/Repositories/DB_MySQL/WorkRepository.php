<?php

namespace App\Repositories\DB_MySQL;

use App\Repositories\Contracts\WorkInterface;

/**
 * Class WorkRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class WorkRepository extends BaseRepository implements WorkInterface
{
    protected $modelName = '\App\Work';
}