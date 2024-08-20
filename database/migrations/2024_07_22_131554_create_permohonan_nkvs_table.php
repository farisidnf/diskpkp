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
        Schema::create('permohonan_nkvs', function (Blueprint $table) {
            $table->id();
            $table->string('no_pengajuan')->nullable();
            $table->integer('fk_lokasi_sudin');
            $table->string('nama_perusahaan');
            $table->mediumText('alamat_perusahaan')->nullable();
            $table->mediumText('alamat_tempat_usaha')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('jenis_unit_usaha')->nullable();
            $table->integer('jenis_unit_usaha_laincek')->default('0');
            $table->string('jenis_unit_usaha_lainnya')->nullable();
            $table->string('kontak_person')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->mediumText('file_ktp')->nullable();
            $table->mediumText('file_nib')->nullable();
            $table->mediumText('file_surat_permohonan_perusahaan')->nullable();
            // $table->mediumText('file_surat_keterangan')->nullable();
            $table->mediumText('file_bukti_kepemilikan')->nullable();
            $table->mediumText('file_surat_keabsahan')->nullable();
            $table->mediumText('file_surat_kuasa')->nullable();
            $table->mediumText('file_kontrak_kerja')->nullable();
            $table->mediumText('file_rekom')->nullable();
            $table->integer('file_ktp_cek')->default('0');
            $table->integer('file_nib_cek')->default('0');
            $table->integer('file_surat_permohonan_perusahaan_cek')->default('0');
            // $table->integer('file_surat_keterangan_cek')->default('0');
            $table->integer('file_bukti_kepemilikan_cek')->default('0');
            $table->integer('file_surat_keabsahan_cek')->default('0');
            $table->integer('file_surat_kuasa_cek')->default('0');
            $table->integer('file_kontrak_kerja_cek')->default('0');
            $table->integer('status')->default('0')->comment = '0 = Belum Mengajukan ; 1 = Menunggu Periksa ; 2 = Sedang Periksa ; 3 = Belum Sesuai ; 4 = Sesuai';
            $table->mediumText('catatan')->nullable()->nullable();
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
        Schema::dropIfExists('permohonan_nkvs');
    }
};
