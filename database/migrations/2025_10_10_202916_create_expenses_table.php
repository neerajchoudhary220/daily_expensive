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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->auditable();
            $table->foreignId('expense_category_id')->constrained('expense_categories');
            $table->string('name');
            $table->decimal('amount', 8)->nullable();
            $table->date('expense_date');
            $table->enum('payment_mode', ['online', 'cash'])->default('online');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
