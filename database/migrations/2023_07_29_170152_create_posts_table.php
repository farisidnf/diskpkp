<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tag_id');
            $table->string('title');
            $table->string('description');
            $table->string('slug');
            $table->text('thumbnail');
            $table->text('thumbnail_path');
            $table->text('body');
            $table->integer('publish');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("tag_id")->references("id")->on("tags")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
