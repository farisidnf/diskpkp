<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkuIndikatorTujuan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ["id"];

    public function sasaran_r()
    {
        return $this->hasMany(IkuIndikatorSasaran::class, 'fk_iku_indikator_tujuan', 'id')->orderBy('created_at','desc');
    }

    public function bidang_r()
    {
        return $this->belongsTo(Bidang::class, 'fk_bidang');
    }

    public function satuan_r()
    {
        return $this->belongsTo(Satuan::class, 'fk_satuan');
    }
}
