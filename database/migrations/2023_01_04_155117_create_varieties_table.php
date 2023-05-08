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
        Schema::create('varieties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dkpc');
            $table->unsignedBigInteger('dkp');
            $table->unsignedBigInteger('variety');
            $table->integer('price');
            $table->integer('price_off');
            $table->integer('number');
            $table->integer('reserve_num');
            $table->integer('active')->default(0);
            $table->integer('special')->default(0);
            $table->integer('moreSell')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('Warranty');
            $table->unsignedBigInteger('brand_id');
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
        Schema::dropIfExists('varieties');
    }
};
