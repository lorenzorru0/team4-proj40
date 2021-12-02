<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Plate;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_firstname', 'customer_lastname', 'customer_email', 'customer_address', 'customer_street_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plates()
    {
        return $this->belongsToMany('App\Plate');
    }
}
