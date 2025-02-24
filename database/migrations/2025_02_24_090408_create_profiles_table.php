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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('name', 25);
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('street_address');
            $table->string('city');
            $table->enum('state', ['CA', 'NY', 'AT']);
            $table->enum('country', ['IN', 'US', 'EU']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
