<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdi extends Model
{
    use HasFactory;

    protected $table = 'sdi';
    public $timestamps = true;

    protected $fillable = [
        'upload_file',
        'upload_date',
        'bulan',
        'tahun',
        'nama',
        'bidang',
        'sifat_data',
        'status',
        'user_id',
        'created_at',
        'updated_at',

    ];
}
