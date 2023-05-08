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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('subject' , 80);
            $table->string('Introduction' , 500 );
            $table->string('about1' , 1500);
            $table->string('about2' , 1500)->nullable();
            $table->string('about3' , 1500)->nullable();
            $table->string('about4' , 1500)->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('file' , 200);
            $table->string('logo' , 200);
            $table->integer('special')->default(0);
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
        Schema::dropIfExists('articles');
    }
};
