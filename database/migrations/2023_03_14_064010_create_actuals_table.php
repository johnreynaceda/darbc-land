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
        Schema::create('actuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('basic_information_id');
            $table->string('number')->nullable();
            $table->string('land_status')->nullable();
            $table->string('dolephil_leased')->nullable();
            $table->string('darbc_grower')->nullable();
            $table->string('owned_but_not_planted')->nullable();
            $table->text('status')->nullable();
            $table->text('remarks')->nullable();
            $table->string('gross_area')->nullable();
            $table->string('planted_area')->nullable();
            $table->string('gulley_area')->nullable();
            $table->string('total_area')->nullable();
            $table->string('facility_area')->nullable();
            $table->string('unutilized_area')->nullable();
            $table->json('portion_field_areas')->nullable();
            $table->json('planted_areas')->nullable();
            $table->json('gulley_areas')->nullable();
            $table->json('total_areas')->nullable();
            $table->json('unutilized_areas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actuals');
    }
};
