<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterIndikatorProgram;
use Illuminate\Http\Request;

class MasterIndikatorProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Indikator Program';
        $programs = MasterIndikatorProgram::query()->paginate(10);
        return view('admin.master-indikator-program.index', compact('title', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Master Indikator Program';
        return view('admin.master-indikator-program.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $store = new MasterIndikatorProgram();
        $store->name = $request->name;
        $store->save();

        return redirect()->route('admin.master-indikator-program.index')->with('success', 'Master Indikator Program berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Detail Master Indikator Program';
        $masterIndikatorProgram = MasterIndikatorProgram::find($id);
        return view('admin.master-indikator-program.show', compact('title', 'masterIndikatorProgram'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Master Indikator Program';
        $masterIndikatorProgram = MasterIndikatorProgram::find($id);
        if (!$masterIndikatorProgram) {
            return redirect()->route('admin.master-indikator-program.index')->with('error', 'Master Indikator Program tidak ditemukan');
        }
        return view('admin.master-indikator-program.edit', compact('title', 'masterIndikatorProgram'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterIndikatorProgram $masterIndikatorProgram)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $masterIndikatorProgram->name = $request->name;
        $masterIndikatorProgram->save();

        return redirect()->route('admin.master-indikator-program.index')->with('success', 'Master Indikator Program berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterIndikatorProgram $masterIndikatorProgram)
    {
        $masterIndikatorProgram->delete();
        return redirect()->route('admin.master-indikator-program.index')->with('success', 'Master Indikator Program berhasil dihapus');
    }
}
