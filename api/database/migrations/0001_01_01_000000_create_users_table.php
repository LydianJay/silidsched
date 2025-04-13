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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('idnum');
            $table->string('profile_pic')->nullable()->default(null);
            $table->enum('role', ['admin','user'])->default('user');
        });


        Schema::create('building', function (Blueprint $table) {
            $table->id();
            $table->string('building_img')->nullable();
            $table->string('name');
        });


        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('building_id');
            $table->string('room_name');
            $table->enum('status', ['vacant', 'reserved', 'occupied']);
        });

        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_id');
            $table->timestamp('reserved_date');
            $table->float('duration'); // in hours
        });

        
        

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
