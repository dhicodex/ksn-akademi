<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('slug', 255)->unique();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('image_src', 255)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('author');
            $table->enum('status', ['DRAFT', 'PUBLISHED', 'ARCHIVED', 'DELETED'])->default('DRAFT');
            $table->timestamps();

            // ** Foreign Key */
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('blogs_tags', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('blog_id');
            $table->json('tags');
            $table->timestamp('created_at', null);

            // ** Foreign Key */
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_tags');
        Schema::dropIfExists('blogs');
    }
};
