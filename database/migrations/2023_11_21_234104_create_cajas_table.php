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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->decimal('inicial',8,2)->default(0);
            $table->decimal('final',8,2)->default(0);
            $table->decimal('diferencia',8,2)->default(0);
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->integer('user_id')->default(1);
            $table->integer('state')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
