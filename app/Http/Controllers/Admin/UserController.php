<?php

namespace App\Http\Controllers\Admin;


use App\Models\Field;
use App\Models\User;
use App\Models\Bidang;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = '';
        if ($request->ajax()) {
            $post = User::where('id','<>',1)->whereIn('role',['admin','user','dinas'])->latest()->get();
            return DataTables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editPost"><i class="fa fa-edit"></i></a>';

                    if ($row->status == 'Inactive') {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="shutdown" class="btn btn-danger btn-sm shutdownPost"><i class="fa fa-power-off"></i></a>';
                    }

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-primary btn-sm deletePost"><i class="fa fa-trash"></i></a>';


                    if (empty($row->status) || $row->status == 0) {
                        $btn .= ' | <a href="' . url('/admin/user/status/' . $row->id . "?status=Accept") . '" onclick="return confirm(`Are you sure?`);" class="btn btn-success  btn-sm"> OK </a> <a class="btn btn-danger  btn-sm" onclick="return confirm(`Are you sure?`);" href="' . url('/admin/user/status/' . $row->id . "?status=Rejected") . '"> No </a>';
                    }
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 'Accept' || $row->status == '1' ? '<span class="badge badge-success">Di setujui</span>' : '<span class="badge badge-info">Menunggu approval admin</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return date('d M Y H:i:s', strtotime($row->created_at));
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        $bidangs = Bidang::where('status',1)->get();
        return view('admin.user', compact('bidangs'));
    }

    public function status(Request $request, $id)
    {

        if ($request->status == 'Accept') {
            $user = User::find($id);
            $user->status = $request->status;
            $user->save();
            return redirect()->to('/admin/user')->withSuccess("User has been accepted");
        } else {
            $user = User::where('id', $id)->delete();
            return redirect()->to('/admin/user')->withSuccess("User has been rejected");

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (empty($request->id)) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:250',
                'username' => 'required|max:250|unique:users',
                'email' => 'required|email|max:250|unique:users',
                'nrk' => 'required',
                'jabatan' => 'required',
                'bidang' => 'required',
                'password' => 'required|min:6'

            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:250',
                'nrk' => 'required',
                'jabatan' => 'required',
                'bidang' => 'required',
            ]);
        }


        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $password = $request->password;
        $get_bidang = Bidang::find($request->bidang);
        $nama_bidang = strtolower($get_bidang->nama);
        if (!empty($password)) {

            if (!empty($request->id)) {
                User::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'jabatan' => $request->jabatan,
                        'role' => $request->role,
                        'bidang' => $nama_bidang,
                        'fk_bidang' => $request->bidang,
                        'nrk' => $request->nrk,
                        'password' => Hash::make($request->password)
                    ]
                );
            } else {
                User::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'username' => $request->username,
                        'name' => $request->name,
                        'email' => $request->email,
                        'jabatan' => $request->jabatan,
                        'role' => $request->role,
                        'bidang' => $nama_bidang,
                        'fk_bidang' => $request->bidang,
                        'nrk' => $request->nrk,
                        'password' => Hash::make($request->password)
                    ]
                );

            }
        } else {


            if (!empty($request->id)) {
                User::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'jabatan' => $request->jabatan,
                        'role' => $request->role,

                        'bidang' => $nama_bidang,
                        'fk_bidang' => $request->bidang,
                        'nrk' => $request->nrk,
                    ]
                );
            } else {
                User::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'username' => $request->username,
                        'name' => $request->name,
                        'email' => $request->email,
                        'jabatan' => $request->jabatan,
                        'role' => $request->role,

                        'bidang' => $nama_bidang,
                        'fk_bidang' => $request->bidang,
                        'nrk' => $request->nrk,
                    ]
                );

            }
        }

        return response()->json(['success' => 'Post saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = User::find($id);
        $field = Field::query()->get();
        $post->bidangs = $field;
        return response()->json($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'Post deleted successfully.']);
    }
}
