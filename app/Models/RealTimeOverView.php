<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealTimeOverView extends Model
{
    use HasFactory;

    protected $table = "real_time_over_views";

    protected $fillable = [ 
        'recharge',
        'withdraw',
        'image',
        'newToday',
        'onlineUsers'
    ];
}
