<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\Season;
use App\Models\Serial;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results['movies'] = Movie::where('name', 'like', '%' . $request->search . '%')->get();
        $results['serials'] = Serial::where('name', 'like', '%' . $request->search . '%')->get();
        $results['seasons'] = Season::where('name', 'like', '%' . $request->search . '%')->get();
        $results['episodes'] = Episode::where('name', 'like', '%' . $request->search . '%')->get();

        return view('web.search.index', compact('results'));
    }

    public function searchBlog(Request $request)
    {
        $blogs = Blog::where('title', 'like', '%' . $request->title . '%')->get();

        $recent_posts = Blog::query()->orderBy('created_at', 'Desc')->limit(3)->get();

        $categories = Category::all();

        $tags = Tag::all();

        return view('web.search.blog', compact('blogs', 'recent_posts', 'categories', 'tags'));
    }
}
