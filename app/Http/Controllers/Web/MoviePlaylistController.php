<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieUserPlaylist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoviePlaylistController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        MovieUserPlaylist::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => 'Done',
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $movie = MovieUserPlaylist::where('movie_id', $request->id)->where('user_id', Auth::id())->first()->delete();

        return response()->json([
            'success' => 'Done',
        ]);
    }
}

