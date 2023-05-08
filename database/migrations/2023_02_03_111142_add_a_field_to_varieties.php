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
        Schema::table('varieties', function (Blueprint $table) {
            $table->after('variety' , function ($table){
                $table->enum('shipping_time' , ['1' , '2' , '3' , '4' , '5']);
                $table->integer('access');
                $table->integer('remain');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('varieties', function (Blueprint $table) {
            //
        });
    }
};
