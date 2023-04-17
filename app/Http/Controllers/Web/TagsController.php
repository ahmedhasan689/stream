<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug): Application|Factory|View
    {
        /**
         * ! Get Tag Name => Send It To View
         */

        return view('web.tag.show');
    }
}
