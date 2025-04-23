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
        Schema::create('msstaff', function (Blueprint $table) {
            $table->string('staffID', 10)->primary();
            $table->string('staffName', 45);
            $table->string('staffpositionID', 45);
            $table->string('staffAddress', 45);
            $table->string('cityID', 45);
            $table->timestamps();
        
            $table->foreign('staffpositionID')->references('positionID')->on('staffpositiontable');
            $table->foreign('cityID')->references('cityID')->on('citytable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('msstaff');
    }
};
