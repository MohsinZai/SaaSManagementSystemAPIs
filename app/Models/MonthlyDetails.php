<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyDetails extends Model
{
    use HasFactory;

    protected $table = 'monthly_details';
    protected $fillable = [
        'date',
        'newUsers',
        'deposits',
        'dispensing',
        'numffpeople',
        'numapeople',
        'orderquant',
        'custprofitloss',
        'runningwater'
    ];
}
