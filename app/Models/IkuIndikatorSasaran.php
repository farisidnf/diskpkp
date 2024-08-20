<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkuIndikatorSasaran extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ["id"];

    public function satuan_r()
    {
        return $this->belongsTo(Satuan::class, 'fk_satuan');
    }
}
