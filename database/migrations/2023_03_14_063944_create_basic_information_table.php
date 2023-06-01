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
        Schema::create('basic_information', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('lot_number')->nullable();
            $table->string('survey_number')->nullable();
            $table->string('title_area')->nullable();
            $table->string('awarded_area')->nullable();
            $table->string('previous_land_owner')->nullable();
            $table->string('field_number')->nullable();
            $table->string('location')->nullable();
            $table->string('municipality')->nullable();
            $table->string('title')->nullable();
            $table->string('cloa_number')->nullable();
            $table->string('page')->nullable();
            $table->json('encumbered')->nullable();
            $table->json('previous_copy_of_title')->nullable();
            $table->string('title_status')->nullable();
            $table->string('title_copy')->nullable();
            $table->string('tax_dec_number')->nullable();
            $table->text('remarks')->nullable();
            $table->text('status')->nullable();
            $table->string('land_bank_amortization')->nullable();
            $table->string('amount')->nullable();
            $table->date('date_paid')->nullable();
            $table->date('date_of_cert')->nullable();
            $table->string('ndc_direct_payment_scheme')->nullable();
            $table->string('ndc_remarks')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_information');
    }
};
