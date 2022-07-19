<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Order extends Model
{

    use SoftDeletes;


    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'trade_no', 'trade_no');
    }
}
