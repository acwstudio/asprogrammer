<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 *
 * @package App
 */
class Site extends Model
{
    protected $fillable = ['intro_id', 'about_id', 'work_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function intro()
    {
        return $this->belongsTo('App\Intro');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function about()
    {
        return $this->belongsTo('App\About');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function header()
    {
        return $this->belongsTo('App\Header');
    }
}
