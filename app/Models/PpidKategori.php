<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpidKategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ["id"];

    public function informasi_r()
    {
        return $this->hasMany(PpidInformasi::class, 'fk_ppid_kategori', 'id')->orderBy('created_at','asc');
    }
}
