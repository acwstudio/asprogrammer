<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IntroTranslation
 *
 * @package App
 */
class IntroTranslation extends Model
{
    public $timestamps = false;
    protected $fillable  = ['title', 'text', 'description'];
}
