<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\IkuMst;
use App\Models\IkuIndikatorTujuan;
use App\Models\IkuIndikatorSasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IkuIndikatorTujuanController extends Controller
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
    public function index(Request $request)
    {
        $id_ikumst = $request->ikumst;
        if(!$id_ikumst){
            return redirect()->route('admin.ikumst.index')->with('message', 'Data tidak ditemukan!');
        }
        $ikumst = IkuMst::find($id_ikumst);
        if(!$ikumst){
            return redirect()->route('admin.ikumst.index')->with('message', 'Data tidak ditemukan!');
        }
      
        return view('admin.ikuindikatortujuan.list', ['ikuindikatortujuans' => IkuIndikatorTujuan::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.ikuindikatortujuan.create', [
            'title' => 'Indikator Kinerja Utama Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
        ]);

        IkuIndikatorTujuan::create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.ikuindikatortujuan.index')->with('message', 'Berhasil menambahkan Indikator Kinerja Utama!');
    }

    public function edit($id)
    {
        return view('admin.ikuindikatortujuan.edit', [
            'title' => 'Edit Indikator Kinerja Utama',
            'ikuindikatortujuan' => IkuIndikatorTujuan::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
        ]);

        $ikuindikatortujuan = IkuIndikatorTujuan::find($id);
        $ikuindikatortujuan->judul = $request->judul;
        $ikuindikatortujuan->tahun = $request->tahun;
        $ikuindikatortujuan->updated_at = Carbon::now()->toDateTimeString();
        $ikuindikatortujuan->updated_by = Auth::id();
        $ikuindikatortujuan->save();

        return redirect()->route('admin.ikuindikatortujuan.index')->with('message', 'Data Indikator Kinerja Utama berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ikuindikatortujuan = IkuIndikatorTujuan::find($id);
        $ikuindikatortujuan->delete();
        return redirect()->route('admin.ikuindikatortujuan.index')->with('message', 'Berhasil hapus data Indikator Kinerja Utama!');
    }
}
