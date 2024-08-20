<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
        return view('admin.tag.list', ['tags' => Tag::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.tag.create', [
            'title' => 'Tag Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        Tag::create([
            'content' => $request->tag
        ]);

        return redirect()->route('admin.tag.index')->with('message', 'Berhasil menambahkan tag!');
    }

    public function edit($id)
    {
        return view('admin.tag.edit', [
            'title' => 'Edit Tag',
            'tag' => Tag::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tag' => 'required',
        ]);

        $tag = Tag::find($id);
        $tag->content = $request->tag;
        $tag->save();

        return redirect()->route('admin.tag.index')->with('message', 'Data tag berhasil diupdate!');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (Post::where('tag_id', $tag->id)->first()) {
            return redirect()->route('admin.tag.index')->with('warning', 'Gagal, tag masih digunakan!');
        } else {
            $tag->delete();
            return redirect()->route('admin.tag.index')->with('message', 'Berhasil hapus data tag!');
        }
    }
}
