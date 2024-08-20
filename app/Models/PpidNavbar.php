<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpidNavbar extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ["id"];

    public function kategori_r()
    {
        return $this->hasMany(PpidKategori::class, 'fk_ppid_navbar', 'id')->orderBy('created_at','asc');
    }
}
