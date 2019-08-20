<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkTranslation
 *
 * @package App
 */
class WorkTranslation extends Model
{
    public $timestamps = false;
    protected $fillable  = ['title', 'text', 'description'];
}
