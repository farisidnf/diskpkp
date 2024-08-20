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
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_data')->nullable();
            $table->string('role');
            $table->string('judul');
            $table->mediumText('link')->nullable();
            $table->mediumText('pesan')->nullable();
            $table->integer('fk_tujuan')->nullable();
            $table->string('email_tujuan')->nullable();
            $table->integer('status')->default('0')->comment = '0 = Belum Dibaca ; 1 = Sudah Dibaca ;';
            $table->integer('created_by');
            $table->datetime('created_at');
            $table->integer('updated_by')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasis');
    }
};
