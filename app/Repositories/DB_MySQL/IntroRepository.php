<?php

namespace App\Repositories\DB_MySQL;

use App\Repositories\Contracts\IntroInterface;

/**
 * Class IntroRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class IntroRepository extends BaseRepository implements IntroInterface
{
    protected $modelName = '\App\Intro';
}