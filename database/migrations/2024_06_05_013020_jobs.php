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
        Schema::create('jobs', function(Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('company')->nullable(false);
            $table->string('location')->nullable(false);
            $table->integer('salary')->nullable(false);
            $table->longText('description')->nullable(false);
            $table->timestamp('date')->nullable(false);
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->foreign('id_user')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
