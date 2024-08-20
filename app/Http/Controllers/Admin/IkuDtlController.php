<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\IkuMst;
use App\Models\IkuIndikatorTujuan;
use App\Models\IkuIndikatorSasaran;
use App\Models\Bidang;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Helpers\Global;
use Illuminate\Support\Facades\Validator;

class IkuDtlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        return view('admin.ikudtl.index', ['ikumst' => IkuMst::find($id)]);
    }

    public function createtujuan(Request $request)
    {
        $ikumst_id = $request->ikumst_id;
        $bidangs = Bidang::where('status',1)->orderBy('created_at','asc')->get();
        $satuans = Satuan::where('status',1)->orderBy('nama','asc')->get();
        $data_param = [
            'ikumst_id','bidangs','satuans'
        ];
        $modal_content =  view('admin/ikudtl/modal_tujuan')->with(compact($data_param))->render();
        return response()->json(['modal_content' => $modal_content]);
    }

    public function createsasaran(Request $request)
    {
        $tujuan_id = $request->tujuan_id;
        $satuans = Satuan::where('status',1)->orderBy('nama','asc')->get();
        $data_param = [
            'tujuan_id','satuans'
        ];
        $modal_content =  view('admin/ikudtl/modal_sasaran')->with(compact($data_param))->render();
        return response()->json(['modal_content' => $modal_content]);
    }

    public function edittujuan(Request $request)
    {
        $tujuan_id = $request->tujuan_id;
        $data = IkuIndikatorTujuan::find($tujuan_id);
        $bidangs = Bidang::where('status',1)->orderBy('created_at','asc')->get();
        $satuans = Satuan::where('status',1)->orderBy('nama','asc')->get();
        $data_param = [
            'bidangs','satuans','data'
        ];
        $modal_content =  view('admin/ikudtl/modal_tujuan_edit')->with(compact($data_param))->render();
        return response()->json(['modal_content' => $modal_content]);
    }

    public function edittujuanuser(Request $request)
    {
        $tujuan_id = $request->tujuan_id;
        $data = IkuIndikatorTujuan::find($tujuan_id);
        $satuans = Satuan::where('status',1)->orderBy('nama','asc')->get();
        $data_param = [
            'data','satuans'
        ];
        $modal_content =  view('admin/ikudtl/user_modal_tujuan_edit')->with(compact($data_param))->render();
        return response()->json(['modal_content' => $modal_content]);
    }

    public function editsasaran(Request $request)
    {
        $sasaran_id = $request->sasaran_id;
        $data = IkuIndikatorSasaran::find($sasaran_id);
        $bidangs = Bidang::where('status',1)->orderBy('created_at','asc')->get();
        $satuans = Satuan::where('status',1)->orderBy('nama','asc')->get();
        $data_param = [
            'bidangs','satuans','data'
        ];
        $modal_content =  view('admin/ikudtl/modal_sasaran_edit')->with(compact($data_param))->render();
        return response()->json(['modal_content' => $modal_content]);
    }

    public function editsasaranuser(Request $request)
    {
        $sasaran_id = $request->sasaran_id;
        $data = IkuIndikatorSasaran::find($sasaran_id);
        $satuans = Satuan::where('status',1)->orderBy('nama','asc')->get();
        $data_param = [
            'satuans','data'
        ];
        $modal_content =  view('admin/ikudtl/user_modal_sasaran_edit')->with(compact($data_param))->render();
        return response()->json(['modal_content' => $modal_content]);
    }
    public function storetujuan(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'fk_bidang' => 'required',
                'judul' => 'required',
                'fk_satuan' => 'required',
                'kondisi_awal' => 'required',
                'target_tahunan' => 'required',
                'target_triwulan_1' => 'required',
                'target_triwulan_2' => 'required',
                'target_triwulan_3' => 'required',
                'target_triwulan_4' => 'required',
            ],
            [
                'fk_bidang.required' => 'Bidang harus diisi',
                'judul.required' => 'Indikator tujuan harus diisi',
                'fk_satuan.required' => 'Satuan harus diisi',
                'kondisi_awal.required' => 'Kondisi awal harus diisi',
                'target_tahunan.required' => 'Target tahunan harus diisi',
                'target_triwulan_1.required' => 'Target triwulan 1 harus diisi',
                'target_triwulan_2.required' => 'Target triwulan 2 harus diisi',
                'target_triwulan_3.required' => 'Target triwulan 3 harus diisi',
                'target_triwulan_4.required' => 'Target triwulan 4 harus diisi',
            ]
        );

        if ($validator->fails()) {
            $validator->validate();
        }

        $kondisi_awal = simpanRupiah($request->kondisi_awal);
        $target_tahunan = simpanRupiah($request->target_tahunan);
        $target_triwulan_1 = simpanRupiah($request->target_triwulan_1);
        $target_triwulan_2 = simpanRupiah($request->target_triwulan_2);
        $target_triwulan_3 = simpanRupiah($request->target_triwulan_3);
        $target_triwulan_4 = simpanRupiah($request->target_triwulan_4);

        $data['fk_bidang'] = $request->fk_bidang;
        $data['judul'] = $request->judul;
        $data['fk_satuan'] = $request->fk_satuan;
        $data['kondisi_awal'] = $kondisi_awal;
        $data['target_tahunan'] = $target_tahunan;
        $data['target_triwulan_1'] = $target_triwulan_1;
        $data['target_triwulan_2'] = $target_triwulan_2;
        $data['target_triwulan_3'] = $target_triwulan_3;
        $data['target_triwulan_4'] = $target_triwulan_4;
        $data['keterangan'] = $request->keterangan;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        if($request->fk_iku_mst){
            $data['fk_iku_mst'] = $request->fk_iku_mst;
            $data['created_by'] = Auth::id();
            $data['created_at'] = Carbon::now()->toDateTimeString();
            IkuIndikatorTujuan::create($data);
            $responsedata['message'] = "Data berhasil ditambahkan";
        }else{
            IkuIndikatorTujuan::find($request->id_data)->update($data);
            $getData = IkuIndikatorTujuan::find($request->id_data);
            if($getData->realisasi_tahunan){
                $capaian_tahunan = $getData->realisasi_tahunan / $getData->target_tahunan * 100;
                IkuIndikatorTujuan::find($request->id_data)->update(['capaian_tahunan' => $capaian_tahunan ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
            }
            $responsedata['message'] = "Data berhasil diedit";
        }

        $responsedata['status'] = true;
        $responsedata['duration'] = 1000;
        $responsedata['icon'] = "success";
        
        return response()->json(['responsedata' => $responsedata]);
    }

    public function storetujuanuser(Request $request)
    {
        $realisasi_tahunan = simpanRupiah($request->realisasi_tahunan);
        $realisasi_triwulan_1 = simpanRupiah($request->realisasi_triwulan_1);
        $realisasi_triwulan_2 = simpanRupiah($request->realisasi_triwulan_2);
        $realisasi_triwulan_3 = simpanRupiah($request->realisasi_triwulan_3);
        $realisasi_triwulan_4 = simpanRupiah($request->realisasi_triwulan_4);

        $data['realisasi_tahunan'] = $realisasi_tahunan;
        $data['realisasi_triwulan_1'] = $realisasi_triwulan_1;
        $data['realisasi_triwulan_2'] = $realisasi_triwulan_2;
        $data['realisasi_triwulan_3'] = $realisasi_triwulan_3;
        $data['realisasi_triwulan_4'] = $realisasi_triwulan_4;
        $data['bukti_dukung'] = $request->bukti_dukung;
        $data['link_bukti_dukung'] = $request->link_bukti_dukung;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        IkuIndikatorTujuan::find($request->id_data)->update($data);
        $getData = IkuIndikatorTujuan::find($request->id_data);
        if($getData->realisasi_tahunan){
            $capaian_tahunan = $getData->realisasi_tahunan / $getData->target_tahunan * 100;
            IkuIndikatorTujuan::find($request->id_data)->update(['capaian_tahunan' => $capaian_tahunan ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
        }

        $responsedata['message'] = "Data berhasil diupdate";

        $responsedata['status'] = true;
        $responsedata['duration'] = 1000;
        $responsedata['icon'] = "success";
        
        return response()->json(['responsedata' => $responsedata]);
    }

    public function storesasaran(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'fk_satuan' => 'required',
                'kondisi_awal' => 'required',
                'target_tahunan' => 'required',
                'target_triwulan_1' => 'required',
                'target_triwulan_2' => 'required',
                'target_triwulan_3' => 'required',
                'target_triwulan_4' => 'required',
            ],
            [
                'judul.required' => 'Indikator sasaran harus diisi',
                'fk_satuan.required' => 'Satuan harus diisi',
                'kondisi_awal.required' => 'Kondisi awal harus diisi',
                'target_tahunan.required' => 'Target tahunan harus diisi',
                'target_triwulan_1.required' => 'Target triwulan 1 harus diisi',
                'target_triwulan_2.required' => 'Target triwulan 2 harus diisi',
                'target_triwulan_3.required' => 'Target triwulan 3 harus diisi',
                'target_triwulan_4.required' => 'Target triwulan 4 harus diisi',
            ]
        );

        if ($validator->fails()) {
            $validator->validate();
        }

        $kondisi_awal = simpanRupiah($request->kondisi_awal);
        $target_tahunan = simpanRupiah($request->target_tahunan);
        $target_triwulan_1 = simpanRupiah($request->target_triwulan_1);
        $target_triwulan_2 = simpanRupiah($request->target_triwulan_2);
        $target_triwulan_3 = simpanRupiah($request->target_triwulan_3);
        $target_triwulan_4 = simpanRupiah($request->target_triwulan_4);

        $data['judul'] = $request->judul;
        $data['fk_satuan'] = $request->fk_satuan;
        $data['kondisi_awal'] = $kondisi_awal;
        $data['target_tahunan'] = $target_tahunan;
        $data['target_triwulan_1'] = $target_triwulan_1;
        $data['target_triwulan_2'] = $target_triwulan_2;
        $data['target_triwulan_3'] = $target_triwulan_3;
        $data['target_triwulan_4'] = $target_triwulan_4;
        $data['keterangan'] = $request->keterangan;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        if($request->fk_iku_indikator_tujuan){
            $data['fk_iku_indikator_tujuan'] = $request->fk_iku_indikator_tujuan;
            $data['created_by'] = Auth::id();
            $data['created_at'] = Carbon::now()->toDateTimeString();
            IkuIndikatorSasaran::create($data);
            $responsedata['message'] = "Data berhasil ditambahkan";
        }else{
            IkuIndikatorSasaran::find($request->id_data)->update($data);
            $getData = IkuIndikatorSasaran::find($request->id_data);
            if($getData->realisasi_tahunan){
                $capaian_tahunan = $getData->realisasi_tahunan / $getData->target_tahunan * 100;
                IkuIndikatorSasaran::find($request->id_data)->update(['capaian_tahunan' => $capaian_tahunan ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
            }
            $responsedata['message'] = "Data berhasil diedit";
        }

        $responsedata['status'] = true;
        $responsedata['duration'] = 1000;
        $responsedata['icon'] = "success";
        
        return response()->json(['responsedata' => $responsedata]);
    }

    public function storesasaranuser(Request $request)
    {

        $realisasi_tahunan = simpanRupiah($request->realisasi_tahunan);
        $realisasi_triwulan_1 = simpanRupiah($request->realisasi_triwulan_1);
        $realisasi_triwulan_2 = simpanRupiah($request->realisasi_triwulan_2);
        $realisasi_triwulan_3 = simpanRupiah($request->realisasi_triwulan_3);
        $realisasi_triwulan_4 = simpanRupiah($request->realisasi_triwulan_4);

        $data['realisasi_tahunan'] = $realisasi_tahunan;
        $data['realisasi_triwulan_1'] = $realisasi_triwulan_1;
        $data['realisasi_triwulan_2'] = $realisasi_triwulan_2;
        $data['realisasi_triwulan_3'] = $realisasi_triwulan_3;
        $data['realisasi_triwulan_4'] = $realisasi_triwulan_4;
        $data['bukti_dukung'] = $request->bukti_dukung;
        $data['link_bukti_dukung'] = $request->link_bukti_dukung;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        IkuIndikatorSasaran::find($request->id_data)->update($data);
        $getData = IkuIndikatorSasaran::find($request->id_data);
        if($getData->realisasi_tahunan){
            $capaian_tahunan = $getData->realisasi_tahunan / $getData->target_tahunan * 100;
            IkuIndikatorSasaran::find($request->id_data)->update(['capaian_tahunan' => $capaian_tahunan ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
        }
        $responsedata['message'] = "Data berhasil diupdate";

        $responsedata['status'] = true;
        $responsedata['duration'] = 1000;
        $responsedata['icon'] = "success";
        
        return response()->json(['responsedata' => $responsedata]);
    }

    public function deletetujuan($id)
    {
        $id_decode = base64_decode($id);
        $get_data = IkuIndikatorTujuan::find($id_decode);
        if(!$get_data){
            $message = 'Error, please try again';
        }else{
            IkuIndikatorTujuan::find($id_decode)->delete();
            $message = 'Data deleted successfully';
        }
        return response()->json(['text' => $message]);
    }

    public function deletesasaran($id)
    {
        $id_decode = base64_decode($id);
        $get_data = IkuIndikatorSasaran::find($id_decode);
        if(!$get_data){
            $message = 'Error, please try again';
        }else{
            IkuIndikatorSasaran::find($id_decode)->delete();
            $message = 'Data deleted successfully';
        }
        return response()->json(['text' => $message]);
    }

  
}
