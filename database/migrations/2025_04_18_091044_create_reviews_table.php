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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // علاقة مع جدول users
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // علاقة مع جدول products
            $table->text('comment');  // تعليق المستخدم
            $table->integer('rating')->nullable();  // تقييم المستخدم من 1 إلى 5
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};