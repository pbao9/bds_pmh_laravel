<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminToCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_to_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_to_customer_id')->autoIncrement();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('customer_id');
            // $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('CASCADE');  
            $table->foreign('customer_id')->references('id')->on('customer')->onUpdate('NO ACTION')->onDelete('CASCADE');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_to_customer');
    }
}
