<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryToLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_to_land', function (Blueprint $table) {
            $table->unsignedBigInteger('category_to_land_id')->autoIncrement();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('land_id');
            // $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('CASCADE');  
            $table->foreign('land_id')->references('id')->on('land')->onUpdate('NO ACTION')->onDelete('CASCADE');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_to_land');
    }
}
