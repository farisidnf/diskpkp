<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterProgram;
use Illuminate\Http\Request;

class MasterProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Program';
        $programs = MasterProgram::query()->paginate(10);

        return view('admin.master_program.index', [
            'title' => $title,
            'programs' => $programs

        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Master Program';
        return view('admin.master_program.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $program = new MasterProgram();
        $program->name = $request->name;
        $program->save();

        return redirect()->route('admin.master-program.index')->with('success', 'Master Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Detail Master Program';
        $post = MasterProgram::find($id);
        if (!$post) abort(404);
        return view('admin.master_program.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Master Program';
        $program = MasterProgram::find($id);
        if (!$program) abort(404);
        return view('admin.master_program.edit', compact('title'), compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $masterProgram = MasterProgram::find($id);
        if (!$masterProgram) abort(404);

        $masterProgram->name = $request->name;
        $masterProgram->save();

        return redirect()->route('admin.master-program.index')->with('success', 'Master Program berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $masterProgram = MasterProgram::find($id);
        if (!$masterProgram) abort(404);
        $masterProgram->delete();
        return redirect()->route('admin.master-program.index')->with('success', 'Master Program berhasil dihapus');
    }
}
