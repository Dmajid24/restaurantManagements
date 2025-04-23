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
        Schema::create('menuinventory', function (Blueprint $table) {
            $table->string('menuinventoryID', 20)->primary();
            $table->string('menuID', 45);
            $table->string('ingredientID', 45);
            $table->string('ingredient_quantity', 45);
            $table->timestamps();
        
            $table->foreign('menuID')->references('menuID')->on('msmenu');
            $table->foreign('ingredientID')->references('ingredientID')->on('msinventory');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menuinventory');
    }
};
