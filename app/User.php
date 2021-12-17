<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Type;
use App\Plate;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'business_name', 'address', 'street_number', 'vat_number', 'slug', 'url_cover', 'description', 'types'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }

    public function orders()
    {
        return $this->hasMany('App\Order')->withPivot('order_id', 'plate_id', 'quantity');
    }
}
