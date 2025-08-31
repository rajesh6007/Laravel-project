<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CustomerDetails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); //add unique for email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();// Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CustomerDetails');
    }
};
