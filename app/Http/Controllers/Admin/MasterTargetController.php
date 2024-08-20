<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterTarget;
use Illuminate\Http\Request;

class MasterTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Target';
        $targets = MasterTarget::query()->paginate(10);
        return view('admin.master_target.index', [
            'title' => $title,
            'targets' => $targets

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Master Target';
        return view('admin.master_target.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $target = new MasterTarget();
        $target->name = $request->name;
        $target->save();

        return redirect()->route('admin.target.index')->with('success', 'Master Target berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Detail Master Target';
        $post = MasterTarget::find($id);
        if (!$post) abort(404);
        return view('admin.master_target.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Master Target';
        $post = MasterTarget::find($id);
        if (!$post) abort(404);
        return view('admin.master_target.edit', [
            'title' => $title,
            'target' => $post

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $masterTarget = MasterTarget::find($id);
        if (!$masterTarget) abort(404);

        $masterTarget->name = $request->name;
        $masterTarget->save();

        return redirect()->route('admin.target.index')->with('success', 'Master Target berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $masterTarget = MasterTarget::find($id);
        if (!$masterTarget) abort(404);
        $masterTarget->delete();
        return redirect()->route('admin.target.index')->with('success', 'Master Target berhasil dihapus');
    }
}
