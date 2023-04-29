<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SerialCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $categories = Category::query()->whereHas('movies')->where('status', 1)->get();

        $serial_categories = SerialCategory::query()->get();
        return view('web.category.index', compact('categories', 'serial_categories'));
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug): Application|Factory|View
    {
        $category = Category::where('slug', $slug)->first();
        return view('web.category.show', compact('category'));
    }
}
