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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_val');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('variety_id');
            $table->integer('number');
            $table->integer('price');
            $table->enum('pay_status' , ['online' , 'offline']);
            $table->string('date');
            $table->string('time');
            $table->string('address' , 1500);
            $table->string('phone' , 11);
            $table->enum('order_status' , ['sending' , 'sent' , 'canceled']);
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
        Schema::dropIfExists('orders');
    }
};
