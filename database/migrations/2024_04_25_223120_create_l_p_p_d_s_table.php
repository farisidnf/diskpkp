<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lppds', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->year('tahun');
            $table->integer('bulan');
            $table->string('upload_file')->nullable();
            $table->dateTime('upload_date')->nullable();
            $table->string('bidang');
            $table->foreignId('user_id')->nullable()->index();
            $table->string('sifat_data');
            $table->string('status');
            $table->string('tampilpan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lppds');
    }
};
