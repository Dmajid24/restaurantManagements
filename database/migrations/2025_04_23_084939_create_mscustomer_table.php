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
        Schema::create('mscustomer', function (Blueprint $table) {
            $table->string('customerID', 50)->primary();
            $table->string('customerName', 45);
            $table->string('customerAddress', 45);
            $table->string('memberTypeID', 45);
            $table->string('cityID', 20);
            $table->timestamps();
        
            $table->foreign('memberTypeID')->references('memberTypeID')->on('membertypetable');
            $table->foreign('cityID')->references('cityID')->on('citytable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mscustomer');
    }
};
