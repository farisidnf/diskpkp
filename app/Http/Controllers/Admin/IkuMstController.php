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

class IkuMstController extends Controller
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
    public function index()
    {
        return view('admin.ikumst.list', ['ikumsts' => IkuMst::orderBy('tahun', 'desc')->orderBy('judul', 'asc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.ikumst.create', [
            'title' => 'Indikator Kinerja Utama Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
        ]);

        IkuMst::create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('ikumst.index')->with('message', 'Berhasil menambahkan Indikator Kinerja Utama!');
    }

    public function edit($id)
    {
        return view('admin.ikumst.edit', [
            'title' => 'Edit Indikator Kinerja Utama',
            'ikumst' => IkuMst::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
        ]);

        $ikumst = IkuMst::find($id);
        $ikumst->judul = $request->judul;
        $ikumst->tahun = $request->tahun;
        $ikumst->updated_at = Carbon::now()->toDateTimeString();
        $ikumst->updated_by = Auth::id();
        $ikumst->save();

        return redirect()->route('ikumst.index')->with('message', 'Data Indikator Kinerja Utama berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ikumst = IkuMst::find($id);
        $ikumst->delete();
        return redirect()->route('ikumst.index')->with('message', 'Berhasil hapus data Indikator Kinerja Utama!');
    }
}
