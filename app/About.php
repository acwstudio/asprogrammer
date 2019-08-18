<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 *
 * @package App
 */
class About extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'text', 'description'];
    protected $fillable = ['alias', 'img_name', 'img_extension'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function site()
    {
        return $this->hasOne('App\Site');
    }
}
