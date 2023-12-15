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
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',8,2)->default(0);
            $table->integer('dias')->default(1);
            $table->integer('client_id')->default(1);
            $table->integer('room_id')->default(1);
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->text('hora_start')->nullable();
            $table->text('hora_end')->nullable();
            $table->integer('active')->default(1);
            $table->integer('state')->default(1);
            $table->decimal('adelanto',8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptions');
    }
};
