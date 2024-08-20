<?php

namespace App\Http\Controllers\Dinas;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermohonanNkv;
use App\Models\SurveilansNkv;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class UserControllerDinas extends Controller
{
    public function index(Request $request)
    {
        // Ubah Menu dan Submenu
        $menu = "user";
        $submenu = "index";

        if ($request->ajax()) {
            // Ubah Field
            $columns = array(
                0 => 'id',
                1 => 'username',
                2 => 'name',
                3 => 'role',
                4 => 'status',
                5 => 'created_at',
                6 => 'action',
            );

            // Ubah Model
            $selectDatasFirst = User::whereIn('role', ['pengusaha','sudin']);
            if ($request->f_role) {
                $selectDatasFirst = $selectDatasFirst->where('role', $request->f_role);
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
                    $query->where('username', 'LIKE', "%{$search}%")
                        ->orWhere('name', 'LIKE', "%{$search}%")
                        ->orWhere('role', 'LIKE', "%{$search}%");
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
                    $loopData['username'] = $selectdata->username;
                    $loopData['name'] = $selectdata->name;
                    $loopData['role'] = strtoupper($selectdata->role);
                    $loopData['created_at'] = date('d M Y H:i:s', strtotime($selectdata->created_at));

                    $id = base64_encode($selectdata->id);
                    $data_param = [
                        'id','selectdata'
                    ];
                    // Ubah Action
                    $action =  view('dinas/user/action')->with(compact($data_param))->render();
                    $loopData['action'] = $action;

                    $status =  view('dinas/user/status')->with(compact($data_param))->render();
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
        return view('dinas/user/index')->with(compact($data_param));
    }

    public function show($id)
    {
        $id_decode = base64_decode($id);
        $get_data = User::find($id_decode);
        $menu = "user";
        $submenu = "show";
        $title = "Lihat Data Pengguna";
        $data_param = [
            'menu', 'submenu','title','get_data','id'
        ];
        // Ubah View
        return view('dinas/user/show')->with(compact($data_param));
    }


    public function ubahstatus($id)
    {
        $id_decode = base64_decode($id);
        
        $get_data = User::find($id_decode);
        if($get_data->status){
            User::find($id_decode)->update(['status' => 0 ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
        }else{
            User::find($id_decode)->update(['status' => 1 ,'updated_at' => Carbon::now()->toDateTimeString(), 'updated_by' => Auth::id()]);
        }
        
        return response()->json(['text' => 'Status change successfully.']);
    }

    public function edit(Request $request)
    {
        $id_decode = base64_decode($request->id);

        $get_data = User::find($id_decode);
        
        return response()->json($get_data);
    }

    public function destroy($id)
    {
        $id_decode = base64_decode($id);
        $get_data = User::find($id_decode);
        $cek1 = PermohonanNkv::where('created_by',$id_decode)->first();
        $cek2 = SurveilansNkv::where('created_by',$id_decode)->first();
        $cek3 = Notifikasi::where('created_by',$id_decode)->first();
        $cek4 = Notifikasi::where('fk_tujuan',$id_decode)->first();
        if($cek1 || $cek2 || $cek3 || $cek4){
            $message = 'Data tidak dapat dihapus';
            return response()->json(['text' => $message]);
        }
        User::find($id_decode)->delete();
        return response()->json(['text' => 'Data deleted successfully.']);
    }
}
