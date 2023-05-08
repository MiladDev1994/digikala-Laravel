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
            $table->unsignedBigInteger('dkp')->unique();
            $table->string('name')->unique();
            $table->unsignedBigInteger('brand_id');
            $table->string('about' , 1500);
            $table->string('variety_type');
            $table->unsignedBigInteger('user_id');
            $table->integer('width');
            $table->integer('height');
            $table->integer('depth');
            $table->integer('Weight');
            $table->integer('active')->default(0);
            $table->string('image',10000);
            $table->string('massage')->default(0);
            $table->timestamps();
        });

        Schema::create('categoryables', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->morphs('categoryable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoryables');
        Schema::dropIfExists('products');
    }
};
