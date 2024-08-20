<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Unit';
        $units = Unit::query()->paginate(10);
        return view('admin.master.unit.index', compact('units'), compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Buat Unit';
        return view('admin.master.unit.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required|string',
        ]);

        $unit = new Unit();
        $unit->unit = $request->unit;
        $unit->save();

        return redirect()->route('admin.unit.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Unit::find($id);
        $title = 'Detail Unit';
        return view('admin.master.unit.show', compact('data'), compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Unit::find($id);
        $title = 'Edit Unit';
        return view('admin.master.unit.edit', compact('data'), compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'unit' => 'required|string',
        ]);

        $unit = Unit::find($id);
        $unit->unit = $request->unit;
        $unit->save();

        return redirect()->route('admin.unit.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->route('admin.unit.index')->with('success', 'Data berhasil dihapus');
    }
}
