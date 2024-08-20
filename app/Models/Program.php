<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';
    public $timestamps = true;

    protected $fillable = [
        'upload_file',
        'upload_date',
        'urusan',
        'program',
        'target_tahun_berjalan',
        'indikator',
        'target',
        'realisasi',
        'capaian',
        'keterangan',
        'status',
        'satuan',
        'tampilkan',
        'data_triwulan',
        'tahun',
        'user_id',
        'bidang',
        'created_at',
        'updated_at',
    ];
}
