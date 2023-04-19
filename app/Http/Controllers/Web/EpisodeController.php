<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\EpisodePoint;
use App\Models\EpisodeUser;
use App\Models\EpisodeUserPlaylist;
use App\Models\EpisodeView;
use App\Models\MovieUser;
use App\Models\SerialUserPlaylist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show(Request $request, $slug)
    {

        $episode = Episode::query()->withCount('user_views')->where('slug', $slug)->where('status', 1)->first();

        $other_episodes = Episode::where('id', '!=', $episode->id)->where('season_id', $episode->season_id)->where('status', 1)->get();

        $playlist_exists = EpisodeUserPlaylist::where('episode_id', $episode->id)->where('user_id', Auth::id())->first();

        $like_exists = EpisodeUser::where('episode_id', $episode->id)->where('user_id', Auth::id())->first();

        $view_exists = EpisodeView::where('episode_id', $episode->id)->where('user_id', Auth::id())->exists();

        $episode_points = Episode::query()->whereHas('user_points', function($query) {
            $query->where('user_id', Auth::id());
        })->get();

        if( !$view_exists ) {
            EpisodeView::create([
                'episode_id' => $episode->id,
                'user_id' => Auth::id()
            ]);
        }

        $episode_point = EpisodePoint::where('episode_id', $episode->id)->where('user_id', Auth::id())->first();

        if( $request->ajax() ) {
            return view('web.episode._icons', compact('episode', 'other_episodes', 'playlist_exists', 'like_exists', 'episode_points', 'episode_point'))->render();
        }

        return view('web.episode.show', compact('episode', 'other_episodes', 'playlist_exists', 'like_exists', 'episode_points', 'episode_point'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     */
    public function playedTime(Request $request, $id)
    {
        $episode = Episode::query()->findOrFail($id);

        $episode_exists = EpisodePoint::query()->where('episode_id', $episode->id)->where('user_id', Auth::id())->first();

        if( !$episode_exists ) {
            EpisodePoint::create([
                'user_id' => Auth::id(),
                'episode_id' => $episode->id,
                'point' => $request->last_played_time
            ]);

        }else{
            $episode_exists->update([
                'point' => $request->last_played_time,
            ]);
        }
    }

    /**
     * @param $type
     * @return Application|Factory|View|void
     */
    public function viewAll($type)
    {
        $pageTitle = null;
        $data = null;

        $playlist_exists = EpisodeUserPlaylist::where('user_id', Auth::id())->pluck('id')->toArray();

        $like_exists = EpisodeUser::query()->where('user_id', Auth::id())->pluck('episode_id')->toArray();





        switch ($type) {
            case 'most_like':
                $pageTitle = 'Top Liked Episode';
                $data = Episode::query()->whereHas('users', function($query) {
                    $query->orderBy('episode_id', 'desc');
                })->where('status', 1)->get();

                return view('web.serial.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;

            case 'most_viewed' :
                $pageTitle = 'Top Viewed Episode';
                $data = Episode::query()->whereHas('user_views', function($query) {
                    $query->orderBy('episode_id', 'desc');
                })->where('status', 1)->get();

                return view('web.episode.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;
        }
    }
}
