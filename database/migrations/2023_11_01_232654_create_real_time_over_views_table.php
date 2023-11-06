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
        Schema::create('real_time_over_views', function (Blueprint $table) {
            $table->id();
            $table->decimal('recharge');
            $table->decimal('withdraw');
            $table->string('image');
            $table->integer('newToday');
            $table->integer('onlineUsers');
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
        Schema::dropIfExists('real_time_over_views');
    }
};
