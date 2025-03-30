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

        Schema::create('tasks', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users_credentials');
            $table->string('task_name')->unique()->nullable(false);
            $table->text('description')->nullable();
            $table->dateTime('end_date_time')->nullable();
        });
    }

    public function down(): void
    {   
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('users_credentials');
    }
};
