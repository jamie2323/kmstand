<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ride;

class RideController extends Controller
{
    public function index()
    {
    	$user = JWTAuth::parseToken()->authenticate();

    	$rides = $user->rides()
    		->with('user', 'location', 'type')
    		->paginate(3);	

        $lastPage = $rides->lastPage();
        
    	if ($rides->isEmpty()) {
            return response('The provided page exceeds the available number of pages', 404);
        }	

        $rides = $rides->map(function($ride) {
        	$ride->user 	= $ride->user;
        	$ride->location = $ride->location;
        	$ride->type 	= $ride->type;

        	return $ride;
        });

        return response()->json(compact('rides', 'lastPage'), 200);
    }
}
