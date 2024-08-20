<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class SurveilansNkv extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ["id"];

    public function created_by_r()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function perpanjang_r()
    {
        return $this->belongsTo(SurveilansNkv::class, 'fk_surveilans_nkv_perpanjang');
    }

    public function perpanjang_hasmany_r()
    {
        return $this->hasMany(SurveilansNkv::class, 'fk_surveilans_nkv_perpanjang', 'id');
    }

    public function updated_by_r()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getNamaStatusAttribute() {
        if ($this->status==0) {
            return "Belum Mengajukan";
        }elseif($this->status==1){
            return "Mengajukan";
        }elseif($this->status==2){
            return "Sedang Periksa";
        }elseif($this->status==3){
            return "Belum Sesuai";
        }elseif($this->status==4){
            return "Sesuai";
        }elseif($this->status==5){
            return "Penjadwalan";
        }elseif($this->status==6){
            return "Dalam Peninjauan";
        }elseif($this->status==7){
            return "Selesai";
        }else{
            return "Uknown";
        }
    }

    public function getClassStatusAttribute() {
        if ($this->status==0) {
            return "warning";
        }elseif($this->status==1){
            return "info";
        }elseif($this->status==2){
            return "primary";
        }elseif($this->status==3){
            return "danger";
        }elseif($this->status==4){
            return "success";
        }elseif($this->status==5){
            return "warning";
        }elseif($this->status==6){
            return "warning";
        }elseif($this->status==7){
            return "success";
        }else{
            return "Uknown";
        }
    }

    public function getBolehEditAttribute() {
        if($this->created_by==Auth::id()){
            if ($this->status==0 || $this->status==3) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getUbahStatusAttribute() {
        if(Auth::user()->role=="dinas"){
            if ($this->status==0 || $this->status==1 || $this->status==2 || $this->status==3) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getUbahStatusPeninjauanAttribute() {
        if(Auth::user()->role=="dinas"){
            if ($this->status==4 || $this->status==5 || $this->status==6 ) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
