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
        Schema::dropIfExists('plans');
        Schema::dropIfExists('plans_features');


        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('for_who', 100);
            $table->double('price');
            $table->double('discount_price')->nullable();
            $table->boolean('is_discount')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        // Membuat tabel plans_features
        Schema::create('plans_features', function (Blueprint $table) {
            $table->id(); // Membuat kolom id untuk primary key
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->string('feature', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans_features');
        Schema::dropIfExists('plans');
    }
};
