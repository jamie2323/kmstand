<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ride;
use App\User;

class Type extends Model
{
	/**
	 * Table name
	*/
	protected $table = 'type';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name'
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
