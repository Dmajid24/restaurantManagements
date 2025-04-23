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
        Schema::create('msmenu', function (Blueprint $table) {
            $table->string('menuID', 50)->primary();
            $table->string('menuName', 45);
            $table->string('menuPrice', 45);
            $table->string('menuCalorie', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('msmenu');
    }
};
