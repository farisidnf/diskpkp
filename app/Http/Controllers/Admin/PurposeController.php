<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purposes = Purpose::query()->paginate(10);
        $title = 'Tujuan';
        return view('admin.master.purpose.index', compact('purposes'), compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Tujuan';
        return view('admin.master.purpose.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'purpose' => 'required|string',
        ]);

        $purpose = new Purpose();
        $purpose->purpose = $request->purpose;
        $purpose->save();

        return redirect()->route('admin.purpose.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Purpose::find($id);
        return view('admin.master.purpose.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update Tujuan';

        $data = Purpose::find($id);
        return view('admin.master.purpose.edit', compact('data'), compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'purpose' => 'required|string',
        ]);

        $purpose = Purpose::find($id);
        $purpose->purpose = $request->purpose;
        $purpose->save();

        return redirect()->route('admin.purpose.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purpose = Purpose::find($id);
        $purpose->delete();

        return redirect()->route('admin.purpose.index')->with('success', 'Data berhasil dihapus');
    }
}
