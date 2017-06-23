<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Star extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'user_name', 'post_id', 'empl_id', 'phoneno', 'category', 'star',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
