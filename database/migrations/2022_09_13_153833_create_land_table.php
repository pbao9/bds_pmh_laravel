<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_owner_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->text('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('purpose')->nullable();
            $table->integer('level')->nullable();
            $table->string('status')->nullable();
            $table->string('furniture')->nullable();
            $table->string('door_direction')->nullable();
            $table->float('area')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('toilet')->nullable();
            $table->float('road_house')->nullable();
            $table->double('price')->nullable();
            $table->string('currency')->nullable();
            $table->text('note')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('ward_id')->nullable();
            $table->text('address')->nullable();
            $table->text('avatar')->nullable();
            $table->text('image')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreign('house_owner_id')->references('id')->on('house_owner')->onUpdate('NO ACTION')->onDelete('SET NULL');
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
        Schema::dropIfExists('land');
    }
}
