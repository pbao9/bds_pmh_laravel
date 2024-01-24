<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('admin_id')->required();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->integer('type')->required();
            $table->string('rental_land_code')->nullable();
            $table->string('rental_land_title')->nullable();
            $table->string('rental_land_address')->nullable();
            $table->date('rental_date_create')->nullable();
            $table->string('rental_owner_fullname')->nullable();
            $table->string('rental_owner_id_number')->nullable();
            $table->date('rental_owner_id_date')->nullable();
            $table->string('rental_owner_id_location')->nullable();
            $table->string('rental_customer_fullname')->nullable();
            $table->string('rental_customer_id_number')->nullable();
            $table->date('rental_customer_id_date')->nullable();
            $table->string('rental_customer_id_location')->nullable();
            $table->string('rental_performer_fullname')->nullable();
            $table->string('rental_purpose')->nullable();
            $table->integer('rental_time')->nullable();
            $table->date('rental_time_start')->nullable();
            $table->double('rental_price_vnd')->nullable();
            $table->double('rental_price_usd')->nullable();
            $table->integer('rental_month_earnest')->nullable();
            $table->integer('rental_month_pay')->nullable();
            $table->integer('rental_pay_start')->nullable();
            $table->integer('rental_pay_end')->nullable();
            $table->text('rental_condition')->nullable();

            $table->date('transfer_date_create')->nullable();
            $table->string('transfer_owner_fullname')->nullable();
            $table->string('transfer_owner_id_number')->nullable();
            $table->date('transfer_owner_id_date')->nullable();
            $table->string('transfer_owner_id_location')->nullable();
            $table->string('transfer_owner_address')->nullable();
            $table->string('transfer_owner_bank')->nullable();
            $table->string('transfer_land_title')->nullable();
            $table->string('transfer_land_code')->nullable();
            $table->string('transfer_land_address')->nullable();
            $table->string('transfer_customer_fullname')->nullable();
            $table->string('transfer_customer_id_number')->nullable();
            $table->date('transfer_customer_id_date')->nullable();
            $table->string('transfer_customer_id_location')->nullable();
            $table->string('transfer_customer_address')->nullable();
            $table->string('transfer_performer_fullname')->nullable();
            $table->double('transfer_land_area')->nullable();
            $table->string('transfer_land_certification_number')->nullable();
            $table->string('transfer_land_certification_input_number')->nullable();
            $table->string('transfer_land_number')->nullable();
            $table->string('transfer_land_map_number')->nullable();
            $table->date('transfer_land_certification_date')->nullable();
            $table->double('transfer_price_number')->nullable();
            $table->string('transfer_price_text')->nullable();
            $table->date('transfer_payment1_date')->nullable();
            $table->double('transfer_payment1_price_number')->nullable();
            $table->string('transfer_payment1_price_text')->nullable();
            $table->date('transfer_payment2_date')->nullable();
            $table->double('transfer_payment2_price_number')->nullable();
            $table->string('transfer_payment2_price_text')->nullable();
            $table->double('transfer_earnest_price_number')->nullable();
            $table->string('transfer_earnest_price_text')->nullable();
            $table->double('transfer_fine_price_number')->nullable();
            $table->string('transfer_fine_price_text')->nullable();
            $table->double('transfer_fine_all_price_number')->nullable();
            $table->string('transfer_fine_all_price_text')->nullable();

            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
