<?php

namespace App\Http\Controllers\Dinas;

use App\Models\SurveilansNkv;
use App\Models\JenisUnitUsaha;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SurveilansNkvControllerDinas extends Controller
{
    public function index(Request $request)
    {
        // Ubah Menu dan Submenu
        $menu = "surveilans";
        $submenu = "index";

        if ($request->ajax()) {
            // Ubah Field
            $columns = array(
                0 => 'id',
                1 => 'status',
                2 => 'no_pengajuan',
                3 => 'nama_perusahaan',
                4 => 'nama_pimpinan',
                5 => 'kontak_person',
                6 => 'nomor_hp',
                7 => 'created_by',
                8 => 'created_at',
                9 => 'expired',
                10 => 'action',
            );

            // Ubah Model
            $selectDatasFirst = SurveilansNkv::where('id', '<>' ,'~');

            if ($request->f_from) {
                $selectDatasFirst = $selectDatasFirst->whereDate('created_at', '>=', $request->f_from);
            }
            if ($request->f_to) {
                $selectDatasFirst = $selectDatasFirst->whereDate('created_at', '<=', $request->f_to);
            }

            // dd($selectDatasFirst);
            $totalData = $selectDatasFirst->count();
            $totalFiltered = $totalData;
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir') ?? 'desc';
            if (empty($request->input('search.value'))) {
                // Ubah Model
                $selectDatas = $selectDatasFirst->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                // Ubah Model
                $wheresearch = $selectDatasFirst->where(function ($query) use ($search) {
                    $query->where('nama_perusahaan', 'LIKE', "%{$search}%")
                        ->orWhere('alamat_perusahaan', 'LIKE', "%{$search}%")
                        ->orWhere('no_pengajuan', 'LIKE', "%{$search}%")
                        ->orWhere('nama_pimpinan', 'LIKE', "%{$search}%");
                });

                $totalFiltered = $wheresearch
                    ->count();

                $selectDatas =  $wheresearch
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }

            $data = array();
            if (!empty($selectDatas)) {
                foreach ($selectDatas as $selectdata) {
                    $loopData['id'] = $selectdata->id;
                    $textperpanjang = "";
                    if($selectdata->perpanjang_r){
                        $textperpanjang = " (Perpanjangan ".$selectdata->perpanjang_r->no_pengajuan.")";
                    }
                    $loopData['no_pengajuan'] = $selectdata->no_pengajuan.$textperpanjang;
                    $loopData['nama_perusahaan'] = $selectdata->nama_perusahaan;
                    $loopData['nama_pimpinan'] = $selectdata->nama_pimpinan;
                    $loopData['kontak_person'] = $selectdata->kontak_person;
                    $loopData['nomor_hp'] = $selectdata->nomor_hp;
                    $loopData['created_by'] = $selectdata->created_by_r->name;
                    $loopData['created_at'] = date('d M Y', strtotime($selectdata->created_at));
                    $loopData['expired'] = $selectdata->expired ? date('d M Y', strtotime($selectdata->expired)) : "";

                    $id = base64_encode($selectdata->id);
                    $data_param = [
                        'id','selectdata'
                    ];
                    // Ubah Action
                    $action =  view('dinas/surveilansnkv/action')->with(compact($data_param))->render();
                    $loopData['action'] = $action;

                    $status =  view('dinas/surveilansnkv/status')->with(compact($data_param))->render();
                    $loopData['status'] = $status;

                    $data[] = $loopData;
                }
            }

            $jsonData = [
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'data' => $data,
            ];

            return $jsonData;
        }
        $data_param = [
            'menu', 'submenu'
        ];
        // Ubah View
        return view('dinas/surveilansnkv/index')->with(compact($data_param));
    }

    public function show($id)
    {
        $id_decode = base64_decode($id);
        $get_data = SurveilansNkv::find($id_decode);
        if(!$get_data){
            return redirect()->to('dinas/surveilansnkv')->with('success', 'Data sudah dihapus');
        }
        $menu = "surveilans";
        $submenu = "show";
        $title = "Detail Permohonan Surveilans NKV";
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','get_data','id'
        ];
        // Ubah View
        return view('pengusaha/surveilansnkv/show')->with(compact($data_param));
    }

    public function cekdata(Request $request , $id)
    {
        $id_decode = base64_decode($id);
        $get_data = SurveilansNkv::find($id_decode);
        if(!$get_data){
            return redirect()->to('dinas/surveilansnkv')->with('success', 'Data sudah dihapus');
        }
        if(!$get_data->ubah_status){
            return redirect()->to('dinas/surveilansnkv')->with('success', 'Data tidak dapat diubah');
        }
        $menu = "surveilans";
        $submenu = "show";
        $title = "Approval Permohonan Surveilans NKV";
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','get_data','id'
        ];
        // Ubah View
        return view('dinas/surveilansnkv/cekdata')->with(compact($data_param));
    }

    public function peninjauan(Request $request , $id)
    {
        $id_decode = base64_decode($id);
        $get_data = SurveilansNkv::find($id_decode);
        if(!$get_data){
            return redirect()->to('dinas/surveilansnkv')->with('success', 'Data sudah dihapus');
        }
        if(!$get_data->ubah_status_peninjauan){
            return redirect()->to('dinas/surveilansnkv')->with('success', 'Data tidak dapat diubah');
        }
        $menu = "surveilans";
        $submenu = "show";
        $title = "Peninjauan Permohonan Surveilans NKV";
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','get_data','id'
        ];
        // Ubah View
        return view('dinas/surveilansnkv/peninjauan')->with(compact($data_param));
    }

    public function getdata($id)
    {
        $id_decode = base64_decode($id);
        $get_data = SurveilansNkv::find($id_decode);
        return response()->json(['status'=>true ,'get_data'=>$get_data ,'text' => 'Get data successfully.']);
    }

    public function ubahstatus(Request $request)
    {

        $id_decode = base64_decode($request->id_data);

        $get_data = SurveilansNkv::find($id_decode);

        // Ubah Validasi
        $validator =  Validator::make(
            $request->all(),
            [
                'status' => 'required',
                // 'file_rekom' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            ],
            [
                'status.required' => 'Status harus diisi',
            ]
        );

        if ($validator->fails()) {
            $validator->validate();
        }

        // if($request->status==4){
        //     if(!$get_data->file_rekom){
        //         if(!$request->file_rekom){
        //             $validator->after(function ($validator) {
        //                 $validator->errors()->add('file_rekom', 'File rekomendasi harus diisi');
        //             });
        //             $validator->validate();
        //         }
        //     }
        // }

        // if ($files = $request->file("file_rekom")) {
        //     $destinationPath = 'uploads/user/'.Auth::id().'/';
        //     $file = 'file_rekom_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
        //     $files->move($destinationPath, $file);
        //     $file_rekom = $destinationPath.$file;
        //     $data['file_rekom'] = $file_rekom;
        // }
        // Ubah Data
        $data['file_ktp_cek'] = $request->file_ktp_cek ? 1 : 0;
        $data['file_nib_cek'] = $request->file_nib_cek ? 1 : 0;
        $data['file_surat_permohonan_perusahaan_cek'] = $request->file_surat_permohonan_perusahaan_cek ? 1 : 0;
        $data['file_bukti_kepemilikan_cek'] = $request->file_bukti_kepemilikan_cek ? 1 : 0;
        $data['file_surat_keabsahan_cek'] = $request->file_surat_keabsahan_cek ? 1 : 0;
        $data['file_surat_kuasa_cek'] = $request->file_surat_kuasa_cek ? 1 : 0;
        $data['file_kontrak_kerja_cek'] = $request->file_kontrak_kerja_cek ? 1 : 0;
        $data['status'] = $request->status;
        $data['catatan'] = $request->catatan;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        if($get_data->ubah_status){
            SurveilansNkv::find($id_decode)->update($data);
            $update = SurveilansNkv::find($id_decode);
            $fk_data = $id_decode; 
            $role = "pengusaha";
            $judul = "Perubahan Status Permohonan Surveilans NKV (".$get_data->no_pengajuan.")"; 
            $link = url('pengusaha/surveilansnkv/show')."/".base64_encode($id_decode); 
            $pesan = "Perubahan status permohonan surveilans NKV oleh Dinas terkait dari ".$get_data->nama_status." menjadi ".$update->nama_status ; 
            $fk_tujuan = $get_data->created_by; 

            if($get_data->status!=$request->status){
                kirimNotif($fk_data,$role,$judul,$link,$pesan,$fk_tujuan,$get_data->created_by_r->email);
            }

            $responsedata['status'] = true;
            $responsedata['duration'] = 1000;
            $responsedata['icon'] = "success";
            $responsedata['message'] = "Data berhasil diupdate";
        }else{
            $responsedata['status'] = false;
            $responsedata['duration'] = 3000;
            $responsedata['icon'] = "danger";
            $responsedata['message'] = "Data gagal diubah, harap coba lagi";
        }
     
        return response()->json(['responsedata' => $responsedata]);
    }

    public function ubahstatuspeninjauan(Request $request)
    {

        $id_decode = base64_decode($request->id_data);

        $get_data = SurveilansNkv::find($id_decode);

        // Ubah Validasi
        $validator =  Validator::make(
            $request->all(),
            [
                'status' => 'required',
                // 'file_rekom' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            ],
            [
                'status.required' => 'Status harus diisi',
            ]
        );

        if ($validator->fails()) {
            $validator->validate();
        }

        if($request->status==5){
            if(!$get_data->file_surat_tugas_peninjauan_lapangan){
                if(!$request->file_surat_tugas_peninjauan_lapangan){
                    $validator->after(function ($validator) {
                        $validator->errors()->add('file_surat_tugas_peninjauan_lapangan', 'File surat tugas peninjauan lapangan harus diisi');
                    });
                    $validator->validate();
                }
            }
        }

        if($request->status==7){
          
            if(!$request->level){
                $validator->after(function ($validator) {
                    $validator->errors()->add('level', 'Level harus diisi');
                });
            }
          
            if(!$get_data->file_sertifikat_nkv){
                if(!$request->file_sertifikat_nkv){
                    $validator->after(function ($validator) {
                        $validator->errors()->add('file_sertifikat_nkv', 'File sertifikat NKV harus diisi');
                    });
                }
            }
            
            $validator->validate();
            
        }
      

        if ($files = $request->file("file_surat_tugas_peninjauan_lapangan")) {
            $destinationPath = 'uploads/user/'.$get_data->created_by.'/';
            $file = 'file_surat_tugas_peninjauan_lapangan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_tugas_peninjauan_lapangan = $destinationPath.$file;
            $data['file_surat_tugas_peninjauan_lapangan'] = $file_surat_tugas_peninjauan_lapangan;
        }

        if ($files = $request->file("file_berkas_hasil_tinjauan")) {
            $destinationPath = 'uploads/user/'.$get_data->created_by.'/';
            $file = 'file_berkas_hasil_tinjauan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_berkas_hasil_tinjauan = $destinationPath.$file;
            $data['file_berkas_hasil_tinjauan'] = $file_berkas_hasil_tinjauan;
        }

        if ($files = $request->file("file_sertifikat_nkv")) {
            $destinationPath = 'uploads/user/'.$get_data->created_by.'/';
            $file = 'file_sertifikat_nkv_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_sertifikat_nkv = $destinationPath.$file;
            $data['file_sertifikat_nkv'] = $file_sertifikat_nkv;
        }

        $expired = null ; 

        if($request->level==1){
            $expired = Carbon::now()->addMonths(12);
        }elseif($request->level==2){
            $expired = Carbon::now()->addMonths(6);
        }elseif($request->level==3){
            $expired = Carbon::now()->addMonths(4);
        }

        $data['expired'] = $expired;
        $data['level'] = $request->level;
        $data['status'] = $request->status;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        if($get_data->ubah_status_peninjauan){
            SurveilansNkv::find($id_decode)->update($data);
            $dataupdate = SurveilansNkv::find($id_decode);
            if($request->status==7){
                if($get_data->fk_surveilans_nkv_perpanjang){
                    SurveilansNkv::find($get_data->fk_surveilans_nkv_perpanjang)->update(['status_perpanjang' => 1 ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
                }
            }
            $fk_data = $id_decode; 
            $role = "pengusaha";
            $judul = "Perubahan Status Permohonan Surveilans NKV (".$get_data->no_pengajuan.")"; 
            $link = url('pengusaha/surveilansnkv/show')."/".base64_encode($id_decode); 
            $pesan = "Perubahan status permohonan surveilans NKV oleh Dinas terkait dari ".$get_data->nama_status." menjadi ".$dataupdate->nama_status ; 
            $fk_tujuan = $get_data->created_by; 

            if($get_data->status!=$request->status){
                kirimNotif($fk_data,$role,$judul,$link,$pesan,$fk_tujuan,$get_data->created_by_r->email);
            }

            $responsedata['status'] = true;
            $responsedata['duration'] = 1000;
            $responsedata['icon'] = "success";
            $responsedata['message'] = "Data berhasil diupdate";
        }else{
            $responsedata['status'] = false;
            $responsedata['duration'] = 3000;
            $responsedata['icon'] = "danger";
            $responsedata['message'] = "Data gagal diubah, harap coba lagi";
        }
     
        return response()->json(['responsedata' => $responsedata]);
    }

    public function notifPerpanjang($id)
    {
        $id_decode = base64_decode($id);
        
        $get_data = SurveilansNkv::find($id_decode);

        $fk_data = $get_data->id; 
        $role = "pengusaha";
        $judul = "Perpanjangan Masa Aktif Surveilans (".$get_data->no_pengajuan.")";  
        $link = url('pengusaha/surveilansnkv/show')."/".base64_encode($id_decode); 
        $pesan = "Anda harus melakukan perpanjangan permohonan surveilans NKV $get_data->no_pengajuan yang berakhir pada ".date('d M Y', strtotime($get_data->expired)) ; 
        $fk_tujuan = $get_data->created_by; 

        $kirim_notif = kirimNotif($fk_data,$role,$judul,$link,$pesan,$fk_tujuan);
        
        if($kirim_notif){
            // SurveilansNkv::find($id_decode)->update(['status' => 1 ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
            return response()->json(['text' => 'Data send successfully.']);
        }else{
            return response()->json(['text' => 'Failed, please try again']);
        }
    }


}
