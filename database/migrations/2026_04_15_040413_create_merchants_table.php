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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->nullable();
            $table->string('merchant_name');
            $table->string('merchant_email')->unique();
            $table->string('merchant_password');
            $table->string('merchant_phone')->unique()->nullable(); // nullable for Google login
            $table->string('merchant_avatar')->nullable();   
            $table->string('merchant_avatar_public_id')->nullable();
            $table->string('merchant_address')->nullable();        // nullable for Google login
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
