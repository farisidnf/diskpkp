<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
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
        return view('admin.blog', ['posts' => Post::orderBy('created_at', 'desc')->with(['category', 'tag'])->paginate(10)]);
    }

    public function create()
    {
        return view('admin.post.create', [
            'title' => 'Postingan Baru',
            'category' => Category::all(),
            'tag' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category' => 'required|max:10',
            'tag' => 'required|max:10',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
        ]);

        $image = $request->file('thumbnail');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->move(public_path('img/thumbnail'), $imageName);
        $imageSrc = url('img/thumbnail') . '/' . $imageName;

        if ($request->has('publish')) {
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => str_replace(' ', '-', $request->title),
                'category_id' => $request->category,
                'tag_id' => $request->tag,
                'thumbnail' => $imageSrc,
                'thumbnail_path' => $imagePath,
                'body' => $request->content,
                'publish' => 1,
                'published_at' => now(),
            ]);
        } else {
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => str_replace(' ', '-', $request->title),
                'category_id' => $request->category,
                'tag_id' => $request->tag,
                'thumbnail' => $imageSrc,
                'thumbnail_path' => $imagePath,
                'body' => $request->content,
                'publish' => 0,
                'published_at' => null,
            ]);
        }


        return redirect()->route('admin.blog')->with('message', 'Berhasil menambahkan postingan!');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.post.edit', [
            'title' => 'Edit Post',
            'category' => Category::all(),
            'tag' => Tag::all(),
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'category' => 'required|max:10',
            'tag' => 'required|max:10',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('thumbnail')) {
            File::delete($post->thumbnail_path);

            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move(public_path('img/thumbnail'), $imageName);
            $imageSrc = url('img/thumbnail') . '/' . $imageName;

            $post->thumbnail = $imageSrc;
            $post->thumbnail_path = $imagePath;
        }

        if ($request->has('publish')) {
            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = str_replace(' ', '-', $request->title);
            $post->category_id = $request->category;
            $post->tag_id = $request->tag;
            $post->body = $request->content;
            $post->publish = 1;
            $post->published_at = $request->published_at;
            $post->save();
        } else {
            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = str_replace(' ', '-', $request->title);
            $post->category_id = $request->category;
            $post->tag_id = $request->tag;
            $post->body = $request->content;
            $post->publish = 0;
            $post->published_at = null;
            $post->save();
        }

        return redirect()->to('/admin/blog')->with('message', 'Data postingan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete($post->thumbnail_path);
        $post->delete();

        return redirect()->to('/admin/blog')->with('message', 'Berhasil hapus data posttingan!');
    }
}
