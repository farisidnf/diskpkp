<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PpidKategori;
use App\Models\PpidNavbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PpidNavbarController extends Controller
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
        return view('admin.ppidnavbar.list', ['ppidnavbars' => PpidNavbar::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.ppidnavbar.create', [
            'title' => 'Navbar Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        PpidNavbar::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.ppidnavbar.index')->with('message', 'Berhasil menambahkan navbar baru!');
    }

    public function edit($id)
    {
        return view('admin.ppidnavbar.edit', [
            'title' => 'Edit Navbar PPID',
            'ppidnavbar' => PpidNavbar::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $ppidnavbar = PpidNavbar::find($id);
        $ppidnavbar->nama = $request->nama;
        $ppidnavbar->slug = Str::slug($request->nama);
        $ppidnavbar->updated_at = Carbon::now()->toDateTimeString();
        $ppidnavbar->updated_by = Auth::id();
        $ppidnavbar->save();

        return redirect()->route('admin.ppidnavbar.index')->with('message', 'Data navbar berhasil diupdate!');
    }

    public function destroy($id)
    {
        $ppidnavbar = PpidNavbar::find($id);
        $cek = PpidKategori::where('fk_ppid_navbar',$id)->first();
        if ($cek) {
            return redirect()->route('admin.ppidnavbar.index')->with('warning', 'Gagal, navbar masih digunakan!');
        }else {
            $ppidnavbar->delete();
            return redirect()->route('admin.ppidnavbar.index')->with('message', 'Berhasil hapus data navbar PPID!');
        }
    }
}
