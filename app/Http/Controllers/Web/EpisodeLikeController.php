<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\EpisodeUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpisodeLikeController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $episode = Episode::findOrFail($request->id);

        EpisodeUser::create([
            'episode_id' => $episode->id,
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
        $episode_like = EpisodeUser::query()->where('user_id', Auth::id())->where('episode_id',$request->id)->delete();

        return response()->json([
            'success' => 'Deleted'
        ]);
    }
}
