<?php

namespace App\Http\Controllers\Pengusaha;

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
use App\Helpers\Notifikasi;


class PermohonanNkvControllerPengusaha extends Controller
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
                3 => 'fk_lokasi_sudin',
                4 => 'nama_perusahaan',
                5 => 'nama_pimpinan',
                6 => 'kontak_person',
                7 => 'nomor_hp',
                8 => 'created_at',
                9 => 'action',
            );

            // Ubah Model
            $selectDatasFirst = PermohonanNkv::where('created_by', Auth::id());
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
                    $loopData['fk_lokasi_sudin'] = "Sudin KPKP ".$selectdata->lokasi_sudin_r->lokasi;
                    $loopData['nama_perusahaan'] = $selectdata->nama_perusahaan;
                    $loopData['nama_pimpinan'] = $selectdata->nama_pimpinan;
                    $loopData['kontak_person'] = $selectdata->kontak_person;
                    $loopData['nomor_hp'] = $selectdata->nomor_hp;
                    $loopData['created_at'] = date('d M Y', strtotime($selectdata->created_at));

                    $id = base64_encode($selectdata->id);
                    $data_param = [
                        'id','selectdata'
                    ];
                    // Ubah Action
                    $action =  view('pengusaha/permohonannkv/action')->with(compact($data_param))->render();
                    $loopData['action'] = $action;

                    $status =  view('pengusaha/permohonannkv/status')->with(compact($data_param))->render();
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
        return view('pengusaha/permohonannkv/index')->with(compact($data_param));
    }

    public function create()
    {
        $menu = "permohonan";
        $submenu = "create";
        $lokasisudin = LokasiSudin::orderBy('lokasi','asc')->get();
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $title = "Tambah Permohonan Rekomendasi NKV";
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','lokasisudin'
        ];
        // Ubah View
        return view('pengusaha/permohonannkv/create')->with(compact($data_param));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'fk_lokasi_sudin' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'alamat_tempat_usaha' => 'required',
            'nama_pimpinan' => 'required',
            'kontak_person' => 'required',
            'nomor_hp' => 'required',
            'file_ktp' => 'required|max:1536|mimes:jpeg,jpg,png,pdf',
            'file_nib' => 'required|max:1536|mimes:jpeg,jpg,png,pdf',
            'file_surat_permohonan_perusahaan' => 'required|max:1536|mimes:jpeg,jpg,png,pdf',
            'file_bukti_kepemilikan' => 'required|max:1536|mimes:jpeg,jpg,png,pdf',
            'file_surat_keabsahan' => 'required|max:1536|mimes:jpeg,jpg,png,pdf',
            'file_surat_kuasa' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_kontrak_kerja' => 'max:1536|mimes:jpeg,jpg,png,pdf',
        ]);

        if ($files = $request->file("file_ktp")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_ktp_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_ktp = $destinationPath.$file;
        }
        if ($files = $request->file("file_nib")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_nib_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_nib = $destinationPath.$file;
        }
        if ($files = $request->file("file_surat_permohonan_perusahaan")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_surat_permohonan_perusahaan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_permohonan_perusahaan = $destinationPath.$file;
        }
        // if ($files = $request->file("file_surat_keterangan")) {
        //     $destinationPath = 'uploads/user/'.Auth::id().'/';
        //     $file = 'file_surat_keterangan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
        //     $files->move($destinationPath, $file);
        //     $file_surat_keterangan = $destinationPath.$file;
        // }
        if ($files = $request->file("file_bukti_kepemilikan")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_bukti_kepemilikan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_bukti_kepemilikan = $destinationPath.$file;
        }
        if ($files = $request->file("file_surat_keabsahan")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_surat_keabsahan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_keabsahan = $destinationPath.$file;
        }
        if ($files = $request->file("file_surat_kuasa")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_surat_kuasa_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_kuasa = $destinationPath.$file;
        }else{
            $file_surat_kuasa = null;
        }
        if ($files = $request->file("file_kontrak_kerja")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_kontrak_kerja_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_kontrak_kerja = $destinationPath.$file;
        }else{
            $file_kontrak_kerja = null;
        }


        $save = [
            'fk_lokasi_sudin' => $request->fk_lokasi_sudin,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'alamat_tempat_usaha' => $request->alamat_tempat_usaha,
            'nama_pimpinan' => $request->nama_pimpinan,
            'kontak_person' => $request->kontak_person,
            'nomor_hp' => $request->nomor_hp,
            'jenis_unit_usaha' => $request->jenis_unit_usaha ? json_encode($request->jenis_unit_usaha) : null,
            'jenis_unit_usaha_laincek' => $request->jenis_unit_usaha_laincek ? 1 : 0,
            'jenis_unit_usaha_lainnya' => $request->jenis_unit_usaha_laincek ? $request->jenis_unit_usaha_lainnya : null,
            'file_ktp' => $file_ktp,
            'file_nib' => $file_nib,
            'file_surat_permohonan_perusahaan' => $file_surat_permohonan_perusahaan,
            'file_bukti_kepemilikan' => $file_bukti_kepemilikan,
            'file_surat_keabsahan' => $file_surat_keabsahan,
            'file_surat_kuasa' => $file_surat_kuasa,
            'file_kontrak_kerja' => $file_kontrak_kerja,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ];

        $create = PermohonanNkv::Create(
            $save
        );
        $no_pengajuan = 'Rekom-'.sprintf("%05d", $create->id);
        PermohonanNkv::find($create->id)->update(['no_pengajuan' => $no_pengajuan]);

        $message = 'Permohonan created successfully';

        return redirect()->route('pengusaha.permohonannkv')
            ->with('success', $message);
    }

    public function show($id)
    {
        $id_decode = base64_decode($id);
        $get_data = PermohonanNkv::find($id_decode);
        if(!$get_data){
            return redirect()->to('pengusaha/permohonannkv')->with('success', 'Data sudah dihapus');
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

    public function edit($id)
    {
        $id_decode = base64_decode($id);
        $get_data = PermohonanNkv::find($id_decode);
        if(!$get_data->boleh_edit){
            $message = 'Permohonan tidak dapat diedit';
            return redirect()->route('pengusaha.permohonannkv')
                ->with('success', $message);
        }
        $menu = "permohonan";
        $submenu = "edit";
        $title = "Edit Permohonan Rekomendasi NKV";
        $jenisunitusaha = JenisUnitUsaha::orderBy('nama','asc')->get();
        $data_param = [
            'menu', 'submenu','title','jenisunitusaha','get_data','id'
        ];
        // Ubah View
        return view('pengusaha/permohonannkv/edit')->with(compact($data_param));
    }

    public function update(Request $request)
    {
        $id_decode = base64_decode($request->id);
        $get_data = PermohonanNkv::find($id_decode);
        if(!$get_data->boleh_edit){
            $message = 'Permohonan tidak dapat diedit';
            return redirect()->route('pengusaha.permohonannkv')
                ->with('success', $message);
        }
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'alamat_tempat_usaha' => 'required',
            'nama_pimpinan' => 'required',
            'kontak_person' => 'required',
            'nomor_hp' => 'required',
            'file_ktp' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_nib' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_surat_permohonan_perusahaan' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            // 'file_surat_keterangan' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_bukti_kepemilikan' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_surat_keabsahan' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_surat_kuasa' => 'max:1536|mimes:jpeg,jpg,png,pdf',
            'file_kontrak_kerja' => 'max:1536|mimes:jpeg,jpg,png,pdf',
        ]);

        if ($files = $request->file("file_ktp")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_ktp_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_ktp = $destinationPath.$file;
            $data['file_ktp'] = $file_ktp;
        }
        if ($files = $request->file("file_nib")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_nib_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_nib = $destinationPath.$file;
            $data['file_nib'] = $file_nib;
        }
        if ($files = $request->file("file_surat_permohonan_perusahaan")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_surat_permohonan_perusahaan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_permohonan_perusahaan = $destinationPath.$file;
            $data['file_surat_permohonan_perusahaan'] = $file_surat_permohonan_perusahaan;
        }
        if ($files = $request->file("file_bukti_kepemilikan")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_bukti_kepemilikan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_bukti_kepemilikan = $destinationPath.$file;
            $data['file_bukti_kepemilikan'] = $file_bukti_kepemilikan;
        }
        if ($files = $request->file("file_surat_keabsahan")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_surat_keabsahan_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_keabsahan = $destinationPath.$file;
            $data['file_surat_keabsahan'] = $file_surat_keabsahan;
        }
        if ($files = $request->file("file_surat_kuasa")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_surat_kuasa_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_surat_kuasa = $destinationPath.$file;
            $data['file_surat_kuasa'] = $file_surat_kuasa;
        }
        if ($files = $request->file("file_kontrak_kerja")) {
            $destinationPath = 'uploads/user/'.Auth::id().'/';
            $file = 'file_kontrak_kerja_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_kontrak_kerja = $destinationPath.$file;
            $data['file_kontrak_kerja'] = $file_kontrak_kerja;
        }

        $data['nama_perusahaan'] = $request->nama_perusahaan;
        $data['alamat_perusahaan'] = $request->alamat_perusahaan;
        $data['alamat_tempat_usaha'] = $request->alamat_tempat_usaha;
        $data['nama_pimpinan'] = $request->nama_pimpinan;
        $data['kontak_person'] = $request->kontak_person;
        $data['nomor_hp'] = $request->nomor_hp;
        $data['jenis_unit_usaha'] = $request->jenis_unit_usaha ? json_encode($request->jenis_unit_usaha) : null;
        $data['jenis_unit_usaha_laincek'] = $request->jenis_unit_usaha_laincek ? 1 : 0;
        $data['jenis_unit_usaha_lainnya'] = $request->jenis_unit_usaha_laincek ? $request->jenis_unit_usaha_lainnya : null;
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        // Ubah Model
        $update = PermohonanNkv::find($id_decode)->update($data);

        $message = 'Permohonan updated successfully';

        return redirect()->route('pengusaha.permohonannkv')
            ->with('success', $message);
    }

    public function destroy($id)
    {
        $id_decode = base64_decode($id);
        $get_data = PermohonanNkv::find($id_decode);
        if($get_data->status==6){
            $message = 'Permohonan tidak dapat dihapus';
            return response()->json(['text' => $message]);
        }
        PermohonanNkv::find($id_decode)->delete();
        return response()->json(['text' => 'Data deleted successfully.']);
    }

    public function ajukandata($id)
    {
        $id_decode = base64_decode($id);
        
        $get_data = PermohonanNkv::find($id_decode);

        if(!$get_data->boleh_edit){
            $message = 'Permohonan tidak dapat diajukan';
            return redirect()->route('pengusaha.permohonannkv')->with('success', $message);
        }

        $fk_data = $get_data->id; 
        $role = "sudin";
        $judul = "Pengajuan Permohonan Rekomendasi NKV (".$get_data->no_pengajuan.")";  
        $link = url('sudin/permohonannkv/show')."/".base64_encode($get_data->id); 
        $pesan = "Pengajuan permohonan rekomendasi NKV dari ".$get_data->nama_perusahaan." ke Sudin ".$get_data->lokasi_sudin_r->lokasi ; 
        $fk_tujuan = $get_data->fk_lokasi_sudin; 

        $kirim_notif = kirimNotif($fk_data,$role,$judul,$link,$pesan,$fk_tujuan);
        
        if($kirim_notif){
            PermohonanNkv::find($id_decode)->update(['status' => 1 ,'catatan' => null,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
            return response()->json(['text' => 'Data send successfully.']);
        }else{
            return response()->json(['text' => 'Failed, please try again']);
        }
    }
}
