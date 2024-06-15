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
            $table->string('name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(false);
            $table->longText('description')->nullable(true);
            $table->longText('address')->nullable(true);
            $table->string('phone')->unique()->nullable(false);
            $table->enum('role', ['worker', 'hire'])->nullable(false);
            $table->longText('foto')->nullable(true);
            $table->longText('foto_url')->nullable(true);
            $table->longText('file')->nullable(true);
            $table->longText('file_url')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
