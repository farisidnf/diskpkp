<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class IkuMst extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ["id"];
    public function tujuan_r()
    {
        return $this->hasMany(IkuIndikatorTujuan::class, 'fk_iku_mst', 'id')->orderBy('created_at','desc');
    }

    public function tujuan_bidang_r()
    {
        return $this->hasMany(IkuIndikatorTujuan::class, 'fk_iku_mst', 'id')->where('fk_bidang',Auth::user()->fk_bidang)->orderBy('created_at','desc');
    }
}
