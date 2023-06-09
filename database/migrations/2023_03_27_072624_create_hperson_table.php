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
        Schema::create('hperson', function (Blueprint $table) {
            $table->string('hpercode')->primary();
            $table->string('patlast');
            $table->string('patfirst');
            $table->string('patmiddle')->nullable();
            $table->date('patbdate');
            $table->string('patsex');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hperson');
    }
};
