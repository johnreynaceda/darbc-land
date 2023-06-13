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
        Schema::create('actual_lot_field_numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('basic_information_id');
            $table->string('lot_number')->nullable();
            $table->string('field_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actual_lot_field_numbers');
    }
};
