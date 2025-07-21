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
        Schema::create('orderdetails', function (Blueprint $table) {
       $table->id();
        $table->foreignId('order_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreignId('product_id')->constrained();
        $table->decimal('price', 10, 2);  // Changed to decimal for monetary values
        $table->integer('quantity');      // Fixed spelling from 'quntity' to 'quantity'
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
