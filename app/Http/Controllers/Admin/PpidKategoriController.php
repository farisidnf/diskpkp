<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PpidNavbar;
use App\Models\PpidKategori;
use App\Models\PpidInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PpidKategoriController extends Controller
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
        return view('admin.ppidkategori.list', ['ppidkategoris' => PpidKategori::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        $ppidnavbar = PpidNavbar::all();
        return view('admin.ppidkategori.create', [
            'title' => 'Kategori Baru',
            'ppidnavbar' => $ppidnavbar,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'fk_ppid_navbar' => 'required',
        ]);

        PpidKategori::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'fk_ppid_navbar' => $request->fk_ppid_navbar,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.ppidkategori.index')->with('message', 'Berhasil menambahkan kategori baru!');
    }

    public function edit($id)
    {
        $ppidnavbar = PpidNavbar::all();
        return view('admin.ppidkategori.edit', [
            'title' => 'Edit Kategori PPID',
            'ppidkategori' => PpidKategori::find($id),
            'ppidnavbar' => $ppidnavbar,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'fk_ppid_navbar' => 'required',
        ]);

        $ppidkategori = PpidKategori::find($id);
        $ppidkategori->nama = $request->nama;
        $ppidkategori->slug = Str::slug($request->nama);
        $ppidkategori->fk_ppid_navbar = $request->fk_ppid_navbar;
        $ppidkategori->updated_at = Carbon::now()->toDateTimeString();
        $ppidkategori->updated_by = Auth::id();
        $ppidkategori->save();

        return redirect()->route('admin.ppidkategori.index')->with('message', 'Data kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ppidkategori = PpidKategori::find($id);
        $cek = PpidInformasi::where('fk_ppid_kategori',$id)->first();
        if ($cek) {
            return redirect()->route('admin.ppidkategori.index')->with('warning', 'Gagal, kategori masih digunakan!');
        }else {
            $ppidkategori->delete();
            return redirect()->route('admin.ppidkategori.index')->with('message', 'Berhasil hapus data kategori PPID!');
        }
    }
}
