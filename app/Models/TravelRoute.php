<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TravelRoute extends Model
{
	
    use SoftDeletes;

    protected $table = 'travel_routes';
    
}
