<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('avatar')->nullable();
            $table->string('status')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('NO ACTION')->onDelete('SET NULL');
        });

        Schema::create('category_to_post', function (Blueprint $table) {
            $table->unsignedBigInteger('category_to_post_id')->autoIncrement();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('post_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('CASCADE');  
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('NO ACTION')->onDelete('CASCADE'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('category_to_post');
    }
}
