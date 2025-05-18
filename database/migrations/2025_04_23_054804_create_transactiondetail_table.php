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
        Schema::create('transactiondetail', function (Blueprint $table) {
            $table->string('TransactionID', 50);
            $table->date('TransactionDate');
            $table->string('menuID', 45);
            $table->string('Quantity', 45);
            $table->timestamps();

            $table->foreign('TransactionID')->references('TransactionID')->on('transactionheader');
            $table->foreign('menuID')->references('menuID')->on('msmenu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactiondetail');
    }
};
