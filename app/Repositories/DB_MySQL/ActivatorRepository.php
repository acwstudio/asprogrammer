<?php


namespace App\Repositories\DB_MySQL;

use App\Repositories\Contracts\ActivatorInterface;

/**
 * Class ActivatorRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class ActivatorRepository extends BaseRepository implements ActivatorInterface
{
    protected $modelName = '\App\Site';
}