<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = Year::query()->orderBy('year')->paginate(10);
        $title = 'Tahun';
        return view('admin.master.year.index', compact('years'), compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Tahun';
        return view('admin.master.year.create', compact('title')    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|numeric',
        ]);

        $year = new Year();
        $year->year = $request->year;
        $year->save();

        return redirect()->route('admin.year.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Year::find($id);
        return view('admin.master.year.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Update Tahun';
        $data = Year::find($id);
        return view('admin.master.year.edit', compact('data'), compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'year' => 'required|numeric',
        ]);

        $year = Year::find($id);
        $year->year = $request->year;
        $year->save();

        return redirect()->route('admin.year.index')->with('success', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Year::find($id)->delete();
        return redirect()->route('admin.year.index')->with('success', 'Data berhasil dihapus');
    }
}
