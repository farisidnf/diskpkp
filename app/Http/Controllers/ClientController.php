<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PpidNavbar;
use App\Models\PpidKategori;
use App\Models\PpidInformasi;
use DateTime;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(Post $post, Category $category)
    {
        $title = "Beranda";
        $announcements = $category->where("name", "Pengumuman")->with("posts")->first();
        $news = $category->where("name", "Berita")->with("posts")->first();

        if ($announcements && $announcements->posts) {
            foreach ($announcements->posts as $post) {
                $post->date = $this->formatDate($post->published_at);
                $post->month = $this->formatMonth($post->published_at);
                $post->year = $this->formatYear($post->published_at);
            }
        }

        if ($news && $news->posts) {
            foreach ($news->posts as $post) {
                $post->date = $this->formatDate($post->published_at);
                $post->month = $this->formatMonth($post->published_at);
                $post->year = $this->formatYear($post->published_at);
            }
        }

        $data = [
            "posts" => $post->all(),
            "announcements" => $announcements ? $announcements : null,
            "news" => $news ? $news : null,
            "title" => $title
        ];

        // dd(count($data["announcements"]->posts));

        return view("home", $data);
    }

    public function blogs(Post $post, Request $request)
    {
        $category_id = $request->query('category_id');
        $tag_id = $request->query('tag_id');

        if ($category_id != null || $tag_id != null) {
            if ($category_id != null) {
                $posts = $post->with("category")->where("category_id", $category_id);
            }
            if ($tag_id != null) {
                if ($category_id != null) {
                    $posts = $posts->where("tag_id", $tag_id);
                } else {
                    $posts = $post->with("category")->where("tag_id", $tag_id);
                }
            }
        } else {
            $posts = $post;
        }

        $posts = $posts->where("publish", 1)->orderBy("id", "desc")->paginate(5);

        foreach ($posts as $post) {
            $post->date = $this->formatDate($post->published_at);
            $post->month = $this->formatMonth($post->published_at);
            $post->year = $this->formatYear($post->published_at);
        }

        $categories = Category::all();
        $tags = Tag::all();

        if ($request->has('search')) {
            $posts = Post::where('title', 'LIKE', '%' . $request->input('search') . '%')->orWhere('body', 'LIKE', '%' . $request->input('search') . '%')->paginate(5);
        }

        $data = [
            "title" => "Blog",
            "posts" => $posts,
            "categories" => $categories,
            "tags" => $tags,
            "category_id" => $category_id
        ];

        return view("blog.index", $data);
    }

    public function blog($slug)
    {
        // if($request->query("slug")) {
        //     $slug = $request->query("slug");
        // }
        // dd($slug);
        $post = Post::where("slug", $slug)->with(["category", "tag"])->first();
        $posts = Post::where("publish", 1)->orderBy("id", "desc")->limit(3)->get();

        foreach ($posts as $p) {
            $p->date = $this->formatDate($p->published_at);
            $p->month = $this->formatMonth($p->published_at);
            $p->year = $this->formatYear($p->published_at);
        }

        $post->date = $this->formatDate($post->published_at);
        $post->month = $this->formatMonth($post->published_at);
        $post->year = $this->formatYear($post->published_at);

        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            "title" => $post->title,
            "post" => $post,
            "posts" => $posts,
            "categories" => $categories,
            "tags" => $tags,
        ];

        return view("blog.view", $data);
    }

    public function profile(Category $category)
    {
        $news = $category->where("name", "Berita")->with("posts")->first();

        if ($news && $news->posts) {
            foreach ($news->posts as $post) {
                $post->date = $this->formatDate($post->published_at);
                $post->month = $this->formatMonth($post->published_at);
                $post->year = $this->formatYear($post->published_at);
            }
        }

        $data = [
            "news" => $news,
            "title" => "Profil"
        ];

        return view("profil", $data);
    }

    public function ppid()
    {
  
        $ppidnavbarall = PpidNavbar::orderBy('created_at','desc')->get();
       
        $data = [
            "title" => "PPID",
            "ppidnavbarall" => $ppidnavbarall,
        ];

        return view("ppid", $data);
    }

    public function ppidnavbar($slug,$id)
    {
  
        $ppidnavbarall = PpidNavbar::orderBy('created_at','desc')->get();
        $ppidnavbar = PpidNavbar::find($id);
       
        $data = [
            "title" => $ppidnavbar->id,
            "ppidnavbarall" => $ppidnavbarall,
            "ppidnavbar" => $ppidnavbar,
        ];

        return view("ppid-navbar", $data);
    }


    // Fungsi untuk mengambil tanggal dari format datetime
    private function formatDate($datetime)
    {
        $date = new DateTime($datetime);
        return $date->format('d');
    }

    // Fungsi untuk mengambil nama bulan dari format datetime
    private function formatMonth($datetime)
    {
        $date = new DateTime($datetime);
        return $date->format('F');
    }

    // Fungsi untuk mengambil tahun dari format datetime
    private function formatYear($datetime)
    {
        $date = new DateTime($datetime);
        return $date->format('Y');
    }
}
