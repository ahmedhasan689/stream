<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $blogs = Blog::query()->orderBy('created_at', 'Desc')->get();

        $recent_posts = Blog::query()->orderBy('created_at', 'Desc')->limit(3)->get();

        $categories = Category::all();

        $tags = Tag::all();

        return view('web.blog.index', compact('blogs', 'recent_posts', 'categories', 'tags'));
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug): Application|Factory|View
    {
        $blog = Blog::where('slug', $slug)->first();

        $recent_posts = Blog::query()->orderBy('created_at', 'Desc')->limit(3)->get();

        $categories = Category::all();

        $tags = Tag::all();

        return view('web.blog.show', compact('blog', 'recent_posts', 'categories', 'tags'));
    }
}
