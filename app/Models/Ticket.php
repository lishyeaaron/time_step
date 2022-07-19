<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];
    use SoftDeletes;


    public function ticket()
    {
        return $this->belongsTo(Order::class, 'trade_no', 'trade_no');
    }
}

