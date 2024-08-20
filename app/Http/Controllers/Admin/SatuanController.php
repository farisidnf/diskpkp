<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Satuan;
use App\Models\IkuIndikatorTujuan;
use App\Models\IkuIndikatorSasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SatuanController extends Controller
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
        return view('admin.satuan.list', ['satuans' => Satuan::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.satuan.create', [
            'title' => 'Satuan Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Satuan::create([
            'nama' => $request->nama,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.satuan.index')->with('message', 'Berhasil menambahkan satuan!');
    }

    public function edit($id)
    {
        return view('admin.satuan.edit', [
            'title' => 'Edit Satuan',
            'satuan' => Satuan::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $satuan = Satuan::find($id);
        $satuan->nama = $request->nama;
        $satuan->updated_at = Carbon::now()->toDateTimeString();
        $satuan->updated_by = Auth::id();
        $satuan->save();

        return redirect()->route('admin.satuan.index')->with('message', 'Data satuan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        if (IkuIndikatorSasaran::where('fk_satuan', $satuan->id)->first()) {
            return redirect()->route('admin.satuan.index')->with('warning', 'Gagal, satuan masih digunakan!');
        }else if (IkuIndikatorTujuan::where('fk_satuan', $satuan->id)->first()) {
            return redirect()->route('admin.satuan.index')->with('warning', 'Gagal, satuan masih digunakan!');
        } else {
            $satuan->delete();
            return redirect()->route('admin.satuan.index')->with('message', 'Berhasil hapus data satuan!');
        }
    }
}
