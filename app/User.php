<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Ride;
use App\Location;
use App\Type;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rides()
    {
        return $this->hasMany(Ride::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function type()
    {
        return $this->hasMany(Type::class);
    }
}
