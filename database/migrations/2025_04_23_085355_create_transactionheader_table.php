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
        Schema::create('transactionheader', function (Blueprint $table) {
            $table->string('TransactionID', 20)->primary();
            $table->string('customerID', 45);
            $table->string('staffID', 45);
            $table->timestamps();
        
            $table->foreign('customerID')->references('customerID')->on('mscustomer');
            $table->foreign('staffID')->references('staffID')->on('msstaff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionheader');
    }
};
