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
        Schema::create('comprehensive_reports', function (Blueprint $table) {
            $table->id();
            $table->string('remark');
            $table->decimal('deposits');
            $table->decimal('dispensing');
            $table->integer('numffpeople');
            $table->integer('numapeople');
            $table->decimal('profitloss');
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
        Schema::dropIfExists('comprehensive_reports');
    }
};
