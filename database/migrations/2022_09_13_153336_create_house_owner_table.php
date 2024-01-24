<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_owner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('fullname')->nullable();
            $table->string('id_number')->nullable();
            $table->date('id_date')->nullable();
            $table->string('id_location')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('purpose')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_owner');
    }
}
