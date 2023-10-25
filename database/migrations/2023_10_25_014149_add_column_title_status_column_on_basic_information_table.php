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
        Schema::table('basic_information', function (Blueprint $table) {
            $table->foreignId('title_status_id')->after('status_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basic_information', function (Blueprint $table) {
            $table->dropForeign(['title_status_id']);
            $table->dropColumn('title_status_id');
        });
    }
};
