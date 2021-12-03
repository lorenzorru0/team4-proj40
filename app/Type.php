<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    public function users() 
    {
        return $this->belongsToMany('App\User');
    }

    protected $table = 'types';
}
