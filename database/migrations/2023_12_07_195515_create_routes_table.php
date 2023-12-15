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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('rotulo');
            $table->string('route')->nullable();
            // $table->json('roles_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('nivel')->nullable();
            $table->boolean('resource')->default(1);
            $table->boolean('state')->default(1);
            $table->boolean('is_production')->default(1);
            $table->boolean('is_group')->default(0);
            $table->boolean('is_sub_group')->default(0);
            $table->text('label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
