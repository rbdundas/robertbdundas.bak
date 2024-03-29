<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->timestamps();
        });

        Schema::create('post_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_category_id')->nullable();
            $table->unsignedBigInteger('post_type_id')->nullable();
            $table->unsignedBigInteger('post_tag_id')->nullable();
            $table->text('summary')->nullable();
            $table->longText('article');
            $table->boolean('published')->default(false);
            $table->timestamp('published_date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_category_id')->references('id')->on('post_categories');
            $table->foreign('post_type_id')->references('id')->on('post_types');
            $table->foreign('post_tag_id')->references('id')->on('post_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('post_types');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('posts');
    }
}
