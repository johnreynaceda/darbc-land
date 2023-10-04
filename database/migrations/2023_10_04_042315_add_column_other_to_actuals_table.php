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
        Schema::table('actuals', function (Blueprint $table) {
            $table->string('darbc_other')->after('owned_but_not_planted')->nullable();
            $table->string('darbc_other_specify')->after('darbc_other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actuals', function (Blueprint $table) {
            $table->dropColumn('darbc_other');
            $table->dropColumn('darbc_other_specify');
        });
    }
};
