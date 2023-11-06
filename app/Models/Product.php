<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'ProductCode',
        'HomePageRecommendation',
        'image',
        'MinimumRiskControlFluctuation',
        'MaximumRiskControlFluctuation',
        'RandomFluctuationRange',
        'TimePlayIntervalOne',
        'TimePlayIntervalTwo',
        'TimePlayIntervalThree',
        'TimePlayIntervalFour',
        'MinimumLimitAmountOne',
        'MinimumLimitAmountTwo',
        'MinimumLimitAmountThree',
        'MinimumLimitAmountFour',
        'TotalLimitAmount',
        'ProfitAndLossRatioOne',
        'ProfitAndLossRatioTwo',
        'ProfitAndLossRatioThree',
        'ProfitAndLossRatioFour',
        'LossRatioOne',
        'LossRatioTwo',
        'LossRatioThree',
        'LossRatioFour',
        'MarketOpeningTimeMonday' ,
        'MarketOpeningTimeTuesday',
        'MarketOpeningTimeWednesday',
        'MarketOpeningTimeThursday',
        'MarketOpeningTimeFriday',
        'MarketOpeningTimeSaturday',
        'MarketOpeningTimeSunday'
    ];

}
