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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('basic_information_id');
            $table->string('number')->nullable();
            $table->string('title_number')->nullable();
            $table->string('tax_declaration_number')->nullable();
            $table->string('owner')->nullable();
            $table->string('lease_to_dolefil')->nullable();
            $table->string('darbc_growers_hip')->nullable();
            $table->string('darbc_area_not_planted_pineapple')->nullable();
            $table->text('remarks')->nullable();
            $table->string('market_value')->nullable();
            $table->string('assessed_value')->nullable();
            $table->date('year')->nullable();
            $table->string('square_meter')->nullable();
            $table->string('tax_payment')->nullable();
            $table->date('year_of_payment')->nullable();
            $table->string('official_receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
