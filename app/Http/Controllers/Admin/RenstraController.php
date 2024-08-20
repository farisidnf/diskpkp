<?php

namespace App\Http\Controllers\Admin;



use App\Models\Field;
use App\Models\Purpose;
use App\Models\Unit;
use App\Models\User;
use App\Models\Year;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Renstra;
use Illuminate\Support\Facades\Auth;

class RenstraController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = '';
        if ($request->ajax()) {
            if(!empty($request->tahun) && empty($request->data_triwulan) && empty($request->data_bidang)) {
                if(Auth::user()->role == 'user') {
                    $where = ['tahun' => $request->tahun,'bidang' => Auth::user()->bidang];
                } else {
                    $where = ['tahun' => $request->tahun];
                }
                $post = Renstra::where($where)->get();
            } elseif(!empty($request->tahun) && empty($request->data_triwulan) && !empty($request->data_bidang)) {
                if(Auth::user()->role == 'user') {
                    $where = ['tahun' => $request->tahun,'bidang' => Auth::user()->bidang];
                } else {
                    $where = ['tahun' => $request->tahun,'bidang' => $request->data_bidang,];
                }
                $post = Renstra::where($where)->get();
            } elseif(!empty($request->tahun) && !empty($request->data_triwulan) && empty($request->data_bidang)) {

                if(Auth::user()->role == 'user') {
                    $where = ['tahun' => $request->tahun,'data_triwulan' => $request->data_triwulan,'bidang' => Auth::user()->bidang];
                } else {
                    $where = ['tahun' => $request->tahun,'data_triwulan' => $request->data_triwulan];
                }
                $post = Renstra::where($where)->get();
            } elseif(!empty($request->tahun) && !empty($request->data_triwulan) && !empty($request->data_bidang)) {

                if(Auth::user()->role == 'user') {
                    $where = ['tahun' => $request->tahun, 'data_triwulan' => $request->data_triwulan,'bidang' => Auth::user()->bidang];
                } else {
                    $where = ['tahun' => $request->tahun,'bidang' => $request->data_bidang, 'data_triwulan' => $request->data_triwulan];
                }
                $post = Renstra::where($where)->get();
            } else {

                if(Auth::user()->role == 'user') {
                    $where = ['bidang' => Auth::user()->bidang];
                    $post = Renstra::where($where)->get();
                } else {
                    $post = Renstra::get();
                }
            }
            return DataTables::of($post)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="id[]" value="'.$row->id.'">';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('admin.renstra.edit', $row->id).'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class=" btn btn-success btn-sm "><i class="fa fa-edit"></i></a>';

                    if ($row->status == 'Inactive') {
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="shutdown" class="btn btn-danger btn-sm shutdownPost"><i class="fa fa-power-off"></i></a>';
                    }

                    if (Auth::user()->role == 'admin')
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePost"><i class="fa fa-trash"></i></a>';


                    if ($row->upload_file != "-") {
                        $btn .= ' <a href="' . asset($row->upload_file) . '"  class="btn btn-warning  btn-sm"> Lihat File </a>';
                    }
                    return $btn;
                })



                ->addColumn('capaian', function ($row) {
                    return number_format($row->capaian,2);
                })



                ->addColumn('updated_at', function ($row) {
                    return date('d M Y H:i:s',strtotime($row->updated_at));
                })
                ->addColumn('upload_date', function ($row) {
                    return date('d M Y H:i:s',strtotime($row->upload_date));
                })
                ->rawColumns(['action','checkbox'])
                ->make(true);
        }
        $fields = Field::query()->get();
        $years = Year::query()->orderBy('year')->get();
        $title = 'Data Renstra';

        return view('admin.renstra',[
            'title' => $title,
            'fields' => $fields,
            'years' => $years
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::user()->role == 'admin') {
            $request->validate([
                'satuan' => 'required',
                'target_satuan_berjalan' => 'required',
            ]);


        } else {
            $request->validate([
                'realisasi' => 'required',
                'keterangan' => 'required|min:50',
            ]);

        }


        $upload_file = '-';






        if(!empty(($_FILES['upload_file'])))
        {
            $fileTmpPath = $_FILES['upload_file']['tmp_name'];
            $fileName = $_FILES['upload_file']['name'];
            $fileSize = $_FILES['upload_file']['size'];
            $fileType = $_FILES['upload_file']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $path = public_path().'/';
            $path = $path . $newFileName;

            if($fileSize <= 1048576) {
                if(move_uploaded_file($_FILES['upload_file']['tmp_name'],$path))
                {
                    $upload_file = $newFileName;
                }
            }

        }

        $target = null;
        if ($request->targetNa) {
            $target = "N/A";
        } else {
            $target = $request->target;
        }

        $realisasi = null;
        if ($request->realisasiNa) {
            $realisasi = "N/A";
        } else {
            $realisasi = $request->realisasi;
        }

        $save = [
            'upload_file' => $upload_file,
            'upload_date' => date('Y-m-d H:i:s'),
            'indikator_sasaran' => $request->indikator_sasaran,
            'indikator_tujuan' => $request->indikator_tujuan,
            'target_satuan_berjalan' => $request->target_satuan_berjalan,
            'target' => $target,
            'realisasi' => $realisasi,
           'capaian' => empty($request->realisasi) || empty($request->target) ? 0 : ($request->realisasi / $request->target  * 100),
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'status' => $request->status,
            'data_triwulan' => $request->data_triwulan,
            'tahun' => $request->tahun,
            'user_id' => Auth::user()->role == 'user' ? Auth::user()->id : Auth::user()->id,
            'bidang' => Auth::user()->role == 'user' ? Auth::user()->bidang : $request->bidang,
        ];



        if($upload_file == "-") {
            unset($save['upload_date']);
            unset($save['upload_file']);
        }

        Renstra::updateOrCreate(
            ['id' => $request->id],
            $save);

        $message = $request->id ? 'Data berhasil diubah' : 'Data berhasil ditambahkan';

        return redirect()->route('admin.renstra.index')->with('success', $message);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post
     */
    public function edit($id)
    {
        $years = Year::query()->orderBy('year')->get();
        $purpose = Purpose::query()->get();
        $unit = Unit::query()->get();
        $post = Renstra::find($id);
        $fields = Field::query()->get();

        return view('admin.renstra.edit', [
            'post' => $post,
            'years' => $years,
            'purposes' => $purpose,
            'units' => $unit,
            'fields' => $fields
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Renstra::find($id)->delete();

        return response()->json(['success' => 'Post deleted successfully.']);
    }

    public function create()
    {
        $title = 'Tambah Data Renstra';
        $years = Year::query()->orderBy('year')->get();
        $purpose = Purpose::query()->get();
        $unit = Unit::query()->get();
        $fields = Field::query()->get();
        return view('admin.renstra.create',[
            'years' => $years,
            'purposes' => $purpose,
            'units' => $unit,
            'fields' => $fields,
            'title' => $title
        ]);
    }


}
