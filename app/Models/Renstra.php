<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renstra extends Model
{
    use HasFactory;

    protected $table = 'renstra';
    public $timestamps = true;

    protected $fillable = [
        'upload_file',
        'upload_date',
        'indikator_tujuan',
        'indikator_sasaran',
        'target_satuan_berjalan',
        'satuan',
        'target',
        'realisasi',
        'capaian',
        'keterangan',
        'status',
        'tampilkan',
        'data_triwulan',
        'tahun',
        'user_id',
        'bidang',

        'created_at',
        'updated_at',

    ];
}
