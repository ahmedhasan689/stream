<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieLikeController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $movie = Movie::findOrFail($request->id);

        MovieUser::create([
            'movie_id' => $movie->id,
            'user_id' => Auth::id(),
            'like' => 1,
        ]);

        return response()->json([
            'success' => 'Added'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {

        $movie_like = MovieUser::query()->where('id', $request->id)->first();

        if ( !$movie_like ) {
            $movie_like = MovieUser::query()->where('movie_id', $request->id)->delete();
        }else{
            $movie_like->delete();
        }

        return response()->json([
            'success' => 'Deleted'
        ]);
    }
}
