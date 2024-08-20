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
        Schema::create('iku_indikator_tujuans', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_iku_mst');
            $table->integer('fk_bidang');
            $table->string('judul');
            $table->integer('fk_satuan');
            $table->decimal('kondisi_awal', 18, 2);
            $table->decimal('target_triwulan_1', 18, 2);
            $table->decimal('target_triwulan_2', 18, 2);
            $table->decimal('target_triwulan_3', 18, 2);
            $table->decimal('target_triwulan_4', 18, 2);
            $table->decimal('realisasi_triwulan_1', 18, 2)->nullable();
            $table->decimal('realisasi_triwulan_2', 18, 2)->nullable();
            $table->decimal('realisasi_triwulan_3', 18, 2)->nullable();
            $table->decimal('realisasi_triwulan_4', 18, 2)->nullable();
            $table->decimal('target_tahunan', 18, 2);
            $table->decimal('realisasi_tahunan', 18, 2)->nullable();
            $table->decimal('capaian_tahunan', 18, 2)->nullable();
            $table->mediumText('keterangan')->nullable();
            $table->mediumText('bukti_dukung')->nullable();
            $table->mediumText('link_bukti_dukung')->nullable();
            $table->mediumText('evaluasi')->nullable();
            $table->mediumText('faktor_pendorong')->nullable();
            $table->mediumText('faktor_penghambat')->nullable();
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
        Schema::dropIfExists('iku_indikator_tujuans');
    }
};
