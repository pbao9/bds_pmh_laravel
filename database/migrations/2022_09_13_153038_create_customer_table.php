<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('id_number')->required();
            $table->date('id_date')->required();
            $table->string('id_location')->required();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('zalo')->nullable();
            $table->text('facebook')->nullable();
            $table->text('address')->nullable();
            $table->string('major')->nullable();
            $table->datetime('birthday')->nullable();
            $table->timestamps();
            // $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
