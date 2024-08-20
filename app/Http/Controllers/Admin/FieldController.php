<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::query()->paginate(10);
        return view('admin.field.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $field = new Field();
        $field->name = $request->name;
        $field->save();

        return redirect()->route('admin.field.index')->with('success', 'Sukses membuat bidang.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $field = Field::find($id);
        return view('admin.field.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $field = Field::find($id);
        $field->name = $request->name;
        $field->save();

        return redirect()->route('admin.field.index')->with('success', 'Sukses mengubah bidang.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $field = Field::find($id);
        if(!$field){
            return redirect()->route('admin.field.index')->with('error', 'Bidang tidak ditemukan.');
        }

        return redirect()->route('admin.field.index')->with('success', 'Sukses menghapus bidang.');
    }
}
