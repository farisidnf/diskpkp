<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        return view('admin.category.list', ['categories' => Category::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.category.create', [
            'title' => 'Kategori Baru',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->category
        ]);

        return redirect()->route('admin.category.index')->with('message', 'Berhasil menambahkan kategori!');
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            'title' => 'Edit Category',
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|max:255',
        ]);

        $category = Category::find($id);
        $category->name = $request->category;
        $category->save();

        return redirect()->route('admin.category.index')->with('message', 'Data kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (Post::where('category_id', '=', $category->id)->first()) {
            return redirect()->route('admin.category.index')->with('warning', 'Gagal, category masih digunakan!');
        } else {
            $category->delete();
            return redirect()->route('admin.category.index')->with('message', 'Berhasil hapus data category!');
        }
    }
}
