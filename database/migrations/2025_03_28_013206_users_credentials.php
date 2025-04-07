<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_credentials', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('username')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {   
        Schema::dropIfExists('users_credentials');
    }
};
