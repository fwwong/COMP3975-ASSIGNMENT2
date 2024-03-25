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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('Date');
            $table->string('TransactionName', 100);
            $table->double('Expense');
            $table->double('Revenue');
            $table->double('NetTotal');
            $table->string('TransactionType', 50);
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('TransactionType')->references('TransactionType')->on('buckets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
