<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ride;
use App\User;

class Location extends Model
{
	/**
	 * Table name
	*/
	protected $table = 'location';
	 
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'from', 'to', 'kmz', 'kmp', 'time', 'hour', 'maps'
    ];

	public function ride()
	{
		return $this->hasMany(Ride::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
