<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert admin user
        // DB::table('users')->insert([
        //     'uuid' => \Illuminate\Support\Str::uuid(),
        //     'name' => 'Admin Laravel',
        //     'email' => 'admin@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('Admin123!'),
        //     'remember_token' => \Illuminate\Support\Str::random(10),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
