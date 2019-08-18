<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AboutTranslation
 *
 * @package App
 */
class AboutTranslation extends Model
{
    public $timestamps = false;
    protected $fillable  = ['title', 'text', 'description'];
}
