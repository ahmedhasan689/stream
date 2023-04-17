<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\EpisodeUserPlaylist;
use App\Models\SerialUserPlaylist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpisodePlaylistController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        EpisodeUserPlaylist::create([
            'episode_id' => $request->episode_id,
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
        $episode = EpisodeUserPlaylist::where('episode_id', $request->id)->where('user_id', Auth::id())->delete();

        return response()->json([
            'success' => 'Done',
        ]);
    }
}
