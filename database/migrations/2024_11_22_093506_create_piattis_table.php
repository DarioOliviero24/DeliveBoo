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
        Schema::create('piattis', function (Blueprint $table) {
            $table->id();

            $table->string('name',64);
            $table->string('ingredients',128);
            $table->int('price',6);
            //VISIBILE SI/NO
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piattis');
    }
};
