<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PpidKategori;
use App\Models\PpidInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PpidInformasiController extends Controller
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
        return view('admin.ppidinformasi.list', ['ppidinformasis' => PpidInformasi::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        $ppidkategori = PpidKategori::all();
        return view('admin.ppidinformasi.create', [
            'title' => 'Informasi Baru',
            'ppidkategori' => $ppidkategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'fk_ppid_kategori' => 'required',
            'file_informasi' => 'required|max:10240|mimes:jpeg,jpg,png,pdf',
        ]);

        if ($files = $request->file("file_informasi")) {
            $destinationPath = 'uploads/ppid/informasi/';
            $file = 'file_informasi_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_informasi = $destinationPath.$file;
        }

        PpidInformasi::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'fk_ppid_kategori' => $request->fk_ppid_kategori,
            'file_informasi' => $file_informasi,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.ppidinformasi.index')->with('message', 'Berhasil menambahkan informasi baru!');
    }

    public function edit($id)
    {
        $ppidkategori = PpidKategori::all();
        return view('admin.ppidinformasi.edit', [
            'title' => 'Edit Informasi PPID',
            'ppidinformasi' => PpidInformasi::find($id),
            'ppidkategori' => $ppidkategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'fk_ppid_kategori' => 'required',
            'file_informasi' => 'max:10240|mimes:jpeg,jpg,png,pdf',
        ]);

        $ppidinformasi = PpidInformasi::find($id);

        if ($files = $request->file("file_informasi")) {
            $destinationPath = 'uploads/ppid/informasi/';
            $file = 'file_informasi_'.Carbon::now()->timestamp. "." .$files->getClientOriginalExtension();
            $files->move($destinationPath, $file);
            $file_informasi = $destinationPath.$file;
            $ppidinformasi->file_informasi = $file_informasi;
        }

        $ppidinformasi->nama = $request->nama;
        $ppidinformasi->slug = Str::slug($request->nama);
        $ppidinformasi->fk_ppid_kategori = $request->fk_ppid_kategori;
        $ppidinformasi->updated_at = Carbon::now()->toDateTimeString();
        $ppidinformasi->updated_by = Auth::id();
        $ppidinformasi->save();

        return redirect()->route('admin.ppidinformasi.index')->with('message', 'Data informasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ppidinformasi = PpidInformasi::find($id);
        if (!$ppidinformasi) {
            return redirect()->route('admin.ppidinformasi.index')->with('warning', 'Gagal, informasi masih digunakan!');
        }else {
            $ppidinformasi->delete();
            return redirect()->route('admin.ppidinformasi.index')->with('message', 'Berhasil hapus data informasi PPID!');
        }
    }
}
