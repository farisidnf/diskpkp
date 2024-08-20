<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bidang;
use App\Models\IkuIndikatorTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BidangController extends Controller
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
        return view('admin.bidang.list', ['bidangs' => Bidang::orderBy('created_at', 'asc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.bidang.create', [
            'title' => 'Bidang Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Bidang::create([
            'nama' => $request->nama,
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.bidang.index')->with('message', 'Berhasil menambahkan bidang!');
    }

    public function edit($id)
    {
        return view('admin.bidang.edit', [
            'title' => 'Edit Bidang',
            'bidang' => Bidang::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $bidang = Bidang::find($id);
        $bidang->nama = $request->nama;
        $bidang->updated_at = Carbon::now()->toDateTimeString();
        $bidang->updated_by = Auth::id();
        $bidang->save();

        return redirect()->route('admin.bidang.index')->with('message', 'Data bidang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $bidang = Bidang::find($id);
        if (User::where('fk_bidang', $bidang->id)->first()) {
            return redirect()->route('admin.bidang.index')->with('warning', 'Gagal, bidang masih digunakan!');
        }else if (IkuIndikatorTujuan::where('fk_bidang', $bidang->id)->first()) {
            return redirect()->route('admin.bidang.index')->with('warning', 'Gagal, bidang masih digunakan!');
        } else {
            $bidang->delete();
            return redirect()->route('admin.bidang.index')->with('message', 'Berhasil hapus data bidang!');
        }
    }
}
