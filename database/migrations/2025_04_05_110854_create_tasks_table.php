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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('task_name')->unique()->nullable(false);
            $table->text('description')->nullable();
            $table->dateTime('end_date_time')->nullable();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users_credentials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
