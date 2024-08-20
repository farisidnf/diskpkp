<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Sdgs;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SdgsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $post = '';

        if ($request->ajax()) {
            $where = [];

            if (!empty($request->tahun)) {
                $where['tahun'] = $request->tahun;


                if (!empty($request->data_triwulan)) {
                    $where['data_triwulan'] = $request->data_triwulan;
                }

                if (!empty($request->bulan)) {
                    $where['bulan'] = $request->bulan;
                }

                $post = Sdgs::where($where)->get();
            } else {
                if (Auth::user()->role == 'user') {
                    $where['bidang'] = Auth::user()->bidang;
                    $post = Sdgs::where($where)->get();
                } else {
                    $post = Sdgs::get();
                }
            }
            return DataTables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (Auth::user()->role == 'admin') {

                        $btn = '<a href="' . route('admin.sdgs.edit', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class=" btn btn-success btn-sm editPost"><i class="fa fa-edit"></i></a>';

                        if ($row->status == 'Inactive') {
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="shutdown" class="btn btn-danger btn-sm shutdownPost"><i class="fa fa-trash"></i></a>';
                        }

                        if (Auth::user()->role == 'admin')
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePost"><i class="fa fa-trash"></i></a>';



                    }
                    if ($row->upload_file != "-") {
                        $btn .= ' <a href="' . asset($row->upload_file) . '"  class="btn btn-warning  btn-sm"> Lihat File </a>';
                    }
                    return $btn;
                })
                ->addColumn('updated_at', function ($row) {
                    return date('d M Y H:i:s', strtotime($row->updated_at));
                })
                ->addColumn('upload_date', function ($row) {
                    return date('d M Y H:i:s', strtotime($row->upload_date));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $years = Year::query()->orderBy('year')->get();
        return view('admin.sdgs', [
            'years' => $years
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::query()->get();
        $title = 'Tambah SDGs';
        $years = Year::query()->orderBy('year')->get();
        return view('admin.sdgs.create', [
            'fields' => $fields,
            'title' => $title,
            'years' => $years

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'bidang' => 'required',
            'sifat_data' => 'required',
            'status' => 'required',
        ]);

        $request->validate([
            'nama' => 'required',
            'sifat_data' => 'required',
            'status' => 'required',

        ]);

        $upload_file = '-';

        if (!empty(($_FILES['upload_file']))) {
            $fileTmpPath = $_FILES['upload_file']['tmp_name'];
            $fileName = $_FILES['upload_file']['name'];
            $fileSize = $_FILES['upload_file']['size'];
            $fileType = $_FILES['upload_file']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $path = public_path() . '/';
            $path = $path . $newFileName;

            if ($fileSize <= 1048576) {
                if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $path)) {
                    $upload_file = $newFileName;
                }
            }
        }


        $save = [
            'upload_file' => $upload_file,
            'upload_date' => date('Y-m-d H:i:s'),
            'nama' => $request->nama,
            'user_id' => Auth::user()->role == 'user' ? Auth::user()->id : Auth::user()->id,
//            'bidang' => Auth::user()->role == 'user' ? Auth::user()->bidang : $request->bidang,
            'sifat_data' => $request->sifat_data,
            'status' => $request->status,
            'tahun' => $request->tahun,
//            'bulan' => $request->bulan,
        ];


        if ($upload_file == "-") {
            unset($save['upload_date']);
            unset($save['upload_file']);
        }

        Sdgs::updateOrCreate(
            ['id' => $request->id],
            $save
        );

        $message = $request->id ? 'Data Indonesia updated successfully.' : 'Data Indonesia created successfully.';

        return redirect()->route('admin.sdgs.index')
            ->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sdgs $lPPD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Sdgs::find($id);
        $field = Field::query()->get();
        $years = Year::query()->orderBy('year')->get();

        $title = 'Edit Data LPPD';
        return view('admin.lppd.edit', [
            'post' => $post,
            'fields' => $field,
            'title' => $title,
            'years' => $years
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sdgs $lPPD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sdgs::find($id)->delete();

        return response()->json(['success' => 'Post deleted successfully.']);
    }
}
