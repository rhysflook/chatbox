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
        Schema::create('color_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('--main-color', 10);
            $table->string('--secondary-color', 10);
            $table->string('--accent-color', 10);
            $table->string('--highlight-color', 10);
            $table->string('--alt-color', 10);
            $table->string('--heading-color', 10);
            $table->string('--font-color', 10);
            $table->string('--border-color', 10);
            $table->string('--icon-color', 10);
            $table->string('--nav-color', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_schemes');
    }
};
