<?php

namespace App\Http\Controllers\Sudin;

use App\Models\PermohonanNkv;
use App\Models\JenisUnitUsaha;
use App\Models\LokasiSudin;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PermohonanNkvControllerSudin extends Controller
{
    public function index(Request $request)
    {
        // Ubah Menu dan Submenu
        $menu = "permohonan";
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
                9 => 'action',
            );

            // Ubah Model
            $selectDatasFirst = PermohonanNkv::where('fk_lokasi_sudin', Auth::user()->fk_lokasi_sudin);

            if ($request->f_from) {
                $selectDatasFirst = $selectDatasFirst->whereDate('created_at', '>=', $request->f_from);
            }
            if ($request->f_to) {
                $selectDatasFirst = $selectDatasFirst->whereDate('created_at', '<=', $request->f_to);
            }
            
            foreach($request->input('columns') as $key => $filterColomn){
                // if(!is_null($filterColomn['search']['value'])){
                //     if($key==4){
                //         $selectDatasFirst = $selectDatasFirst->where($columns[$key],'>=',$filterColomn['search']['value']);
                //     }elseif($key==5){
                //         $selectDatasFirst = $selectDatasFirst->where($columns[$key],'<=',$filterColomn['search']['value']);
                //     }
                // }
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
                    $loopData['no_pengajuan'] = $selectdata->no_pengajuan;
                    $loopData['nama_perusahaan'] = $selectdata->nama_perusahaan;
                    $loopData['nama_pimpinan'] = $selectdata->nama_pimpinan;
                    $loopData['kontak_person'] = $selectdata->kontak_person;
                    $loopData['nomor_hp'] = $selectdata->nomor_hp;
                    $loopData['created_by'] = $selectdata->created_by_r->name;
                    $loopData['created_at'] = date('d M Y', strtotime($selectdata->created_at));

                    $id = base64_encode($selectdata->id);
                    $data_param = [
                        'id','selectdata'
                    ];
                    // Ubah Action
                    $action =  view('sudin/permohonannkv/action')->with(compact($data_param))->render();
                    $loopData['action'] = $action;

                    $status =  view('sudin/permohonannkv/status')->with(compact($data_param))->render();
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
        return view('sudin/permohonannkv/index')->with(compact($data_param));
    }

    public function show($id)
    {
        $id_decode = base64_decode($id);
        $get_data = PermohonanNkv::find($id_decode);
        if(!$get_data){
            return redirect()->to('sudin/permohonannkv')->with('success', 'Data sudah dihapus');
        }
        $menu = "permohonan";
        $submenu = "show";
        $title = "Detail Permohonan Rekomendasi NKV";
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','get_data','id'
        ];
        // Ubah View
        return view('pengusaha/permohonannkv/show')->with(compact($data_param));
    }

    public function cekdata(Request $request , $id)
    {
        $id_decode = base64_decode($id);
        $get_data = PermohonanNkv::find($id_decode);
        if(!$get_data){
            return redirect()->to('sudin/permohonannkv')->with('success', 'Data sudah dihapus');
        }
        if(!$get_data->ubah_status){
            return redirect()->to('sudin/permohonannkv')->with('success', 'Data tidak dapat diubah');
        }
        $menu = "permohonan";
        $submenu = "show";
        $title = "Approval Permohonan Rekomendasi NKV";
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','get_data','id'
        ];
        // Ubah View
        return view('sudin/permohonannkv/cekdata')->with(compact($data_param));
    }

    public function getdata($id)
    {
        $id_decode = base64_decode($id);
        $get_data = PermohonanNkv::find($id_decode);
        return response()->json(['status'=>true ,'get_data'=>$get_data ,'text' => 'Get data successfully.']);
    }

    public function ubahstatus(Request $request)
    {

        $id_decode = base64_decode($request->id_data);

        $get_data = PermohonanNkv::find($id_decode);

        // Ubah Validasi
        $validator =  Validator::make(
            $request->all(),
            [
                'status' => 'required',
                'file_rekom' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            ],
            [
                'status.required' => 'Status harus diisi',
            ]
        );

        if ($validator->fails()) {
            $validator->validate();
        }

        if($request->status==5 || $request->status==6){
            if(!$get_data->file_rekom){
                if(!$request->file_rekom){
                    $validator->after(function ($validator) {
                        $validator->errors()->add('file_rekom', 'File rekomendasi harus diisi');
                    });
                    $validator->validate();
                }
            }
        }

        if ($files = $request->file("file_rekom")) {
            $destinationPath = 'uploads/user/'.$get_data->created_by.'/';
            $file = 'file_rekom_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_rekom = $destinationPath.$file;
            $data['file_rekom'] = $file_rekom;
        }
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
            PermohonanNkv::find($id_decode)->update($data);
            $update = PermohonanNkv::find($id_decode);
            $fk_data = $id_decode; 
            $role = "pengusaha";
            $judul = "Perubahan Status Permohonan Rekomendasi NKV (".$get_data->no_pengajuan.")";  
            $link = url('pengusaha/permohonannkv/show')."/".base64_encode($id_decode); 
            $pesan = "Perubahan status permohonan rekomendasi NKV oleh Sudin terkait dari ".$get_data->nama_status." menjadi ".$update->nama_status ; 
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


}
