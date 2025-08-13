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
        Schema::dropIfExists('class_transaction');
        Schema::dropIfExists('class');
        
        Schema::create('class', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image_src', 255);
            $table->enum('status', ['DRAFT', 'AVAILABLE', 'FULL', 'EXPIRED'])->default('DRAFT');
            $table->integer('slot')->default(0);
            $table->double('price')->default(0);
            $table->timestamps();
        });

        Schema::create('class_transaction', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('class_id');
            $table->string('email');
            $table->enum('status', ['NOW', 'SOON', 'PASSED', 'CANCELLED'])->default('NOW');
            $table->string('explanation_canceled',  255)->nullable();
            $table->string('evidence', 255)->nullable();
            $table->timestamps();

            // ** Foreign Key */
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_transaction');
        Schema::dropIfExists('class');
    }
};
