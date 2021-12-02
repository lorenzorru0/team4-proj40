<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Plate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plate_name', 'price', 'visible',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
