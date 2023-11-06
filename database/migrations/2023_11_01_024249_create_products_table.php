<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ProductCode')->unique();
            $table->boolean('HomePageRecommendation');
            $table->string('image');
            $table->decimal('MinimumRiskControlFluctuation');
            $table->decimal('MaximumRiskControlFluctuation');
            $table->decimal('RandomFluctuationRange');
            $table->integer('TimePlayIntervalOne');
            $table->integer('TimePlayIntervalTwo');
            $table->integer('TimePlayIntervalThree');
            $table->integer('TimePlayIntervalFour');
            $table->integer('MinimumLimitAmountOne');
            $table->integer('MinimumLimitAmountTwo');
            $table->integer('MinimumLimitAmountThree');
            $table->integer('MinimumLimitAmountFour');
            $table->integer('TotalLimitAmount')->nullable();
            $table->decimal('ProfitAndLossRatioOne');
            $table->decimal('ProfitAndLossRatioTwo');
            $table->decimal('ProfitAndLossRatioThree');
            $table->decimal('ProfitAndLossRatioFour');
            $table->decimal('LossRatioOne');
            $table->decimal('LossRatioTwo');
            $table->decimal('LossRatioThree');
            $table->decimal('LossRatioFour');
            $table->string('MarketOpeningTimeMonday')->nullable();
            $table->string('MarketOpeningTimeTuesday')->nullable();
            $table->string('MarketOpeningTimeWednesday')->nullable();
            $table->string('MarketOpeningTimeThursday')->nullable();
            $table->string('MarketOpeningTimeFriday')->nullable();
            $table->string('MarketOpeningTimeSaturday')->nullable();
            $table->string('MarketOpeningTimeSunday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
