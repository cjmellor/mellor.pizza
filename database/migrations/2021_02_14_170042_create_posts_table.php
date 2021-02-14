<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->text('body')->index();
            $table->boolean('is_published')->default(false)->index();
            $table->boolean('is_markdown')->default(false)->index();
            $table->string('post_image')->nullable();
            $table->string('post_image_caption')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
