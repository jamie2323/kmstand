<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\User;

class Ride extends Model
{
	/**
	 * Table name
	*/
	protected $table = 'ride';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'time', 'date', 'type_id', 'location_id', 'billabletime'
    ];

    public function type()
    {
    	return $this->belongsTo(Type::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
}
