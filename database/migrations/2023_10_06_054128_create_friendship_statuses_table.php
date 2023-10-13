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
        Schema::create('friendship_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('friendship_id');
            $table->foreign('friendship_id')->references('id')->on('friendships');
            $table->unsignedBigInteger('specifier_id');
            $table->foreign('specifier_id')->references('id')->on('users');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('message', 255)->nullable();
            $table->timestamps();
            $table->index('friendship_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendship_statuses');
    }
};
