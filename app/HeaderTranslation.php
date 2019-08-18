<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HeaderTranslation
 *
 * @package App
 */
class HeaderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable  = ['title', 'text', 'description'];
}
