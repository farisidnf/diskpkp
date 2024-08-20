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
        Schema::table('rpjmds', function (Blueprint $table) {
            $table->dropColumn('bidang');
        });

        Schema::table('sdgs', function (Blueprint $table) {
            $table->dropColumn('bidang');
        });
        Schema::table('lppds', function (Blueprint $table) {
            $table->dropColumn('bidang');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rpjmds', function (Blueprint $table) {
            $table->string('bidang')->nullable();
        });

        Schema::table('sdgs', function (Blueprint $table) {
            $table->string('bidang')->nullable();
        });
        Schema::table('lppds', function (Blueprint $table) {
            $table->string('bidang')->nullable();
        });
    }
};
