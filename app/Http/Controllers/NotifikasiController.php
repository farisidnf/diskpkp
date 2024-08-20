<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\SurveilansNkv;
use App\Models\PermohonanNkv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotifikasiController extends Controller
{
    public function index(Request $request)
    {
        // - Sasaran Belum Terisi
        // - Program Belum Terisi
        // - SDI Belum Terisi

        $title = "Notifikasi";

        if(Auth::user()->role=="sudin"){
            $notifikasi = Notifikasi::where('role',Auth::user()->role)->where('fk_tujuan',Auth::user()->fk_lokasi_sudin)->orderBy('created_at','desc')->get();
        }elseif(Auth::user()->role=="pengusaha"){
            $notifikasi = Notifikasi::where('role',Auth::user()->role)->where('fk_tujuan',Auth::user()->id)->orderBy('created_at','desc')->get();
        }elseif(Auth::user()->role=="dinas"){
            $notifikasi = Notifikasi::where('role',Auth::user()->role)->orderBy('created_at','desc')->get();
        }else{
            $notifikasi = [];
        }

        return view('admin/notifikasi', compact('title','notifikasi'));
    }

    public function ubahstatus(Request $request,$id)
    {
        $link = $request->link;
        $id = $request->id;
        $dataNotif = Notifikasi::find($id);
        $data['status'] = 1;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        Notifikasi::find($id)->update($data);
        return redirect($link)->with('message', $dataNotif->pesan);
    }

    public function cekExpired(Request $request)
    {
        if($request->action!=="cek-expired"){
            return abort(404);
        }

        $cekData = SurveilansNkv::where('status',7)->where('status_perpanjang','0')->whereDate('expired','<=',Carbon::now()->addMonth(1))->get();
     
        foreach($cekData as $get_data){
            $fk_data = $get_data->id; 
            $role = "pengusaha";
            $judul = "Perpanjangan Masa Aktif Surveilans"; 
            $link = url('pengusaha/surveilansnkv/show')."/".base64_encode($get_data->id); 
            $pesan = "Anda harus melakukan perpanjangan permohonan surveilans NKV $get_data->no_pengajuan yang berakhir pada ".date('d M Y', strtotime($get_data->expired)) ; 
            $fk_tujuan = $get_data->created_by; 
            kirimNotif($fk_data,$role,$judul,$link,$pesan,$fk_tujuan,$get_data->created_by_r->email);
        }

        return "Berhasil";
    }

    public function autocomplete(Request $request)
    {   
        $res = [];
        if($request->model=="SurveilansNkv"){
            $data_awal = SurveilansNkv::where('id','<>','~'); 
        }
        else if($request->model=="PermohonanNkv"){
            $data_awal = PermohonanNkv::where('id','<>','~'); 
        }
        if(Auth::user()->role=="dinas" || Auth::user()->role=="sudin"){
            $res = $data_awal;
        }else{
            $res = $data_awal->where('created_by',Auth::id());
        }
        $res = $res->where($request->field,"LIKE","%".$request->search."%")->groupBy($request->field)->pluck($request->field)->all();
        return response()->json($res);
    }

    public function coba()
    {
        return view('admin/coba');
    }

    public function errorpage()
    {
        return view('admin.error');
    }
}
