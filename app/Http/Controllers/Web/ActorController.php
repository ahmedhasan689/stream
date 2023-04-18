<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function show($id)
    {
        $actor = Actor::query()->with(['movies', 'serials'])->withCount('movies')->withCount('serials')->where('id', $id)->first();

        return view('web.actor.show', compact('actor'));
    }
}
