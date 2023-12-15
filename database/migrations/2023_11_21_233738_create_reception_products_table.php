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
        Schema::create('reception_products', function (Blueprint $table) {
            $table->id();
            $table->decimal('venta',8,2)->default(0);
            $table->integer('reception_id')->default(1);
            $table->integer('cantidad')->default(1);
            $table->integer('product_id')->default(1);
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reception_products');
    }
};
