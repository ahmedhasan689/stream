<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\EpisodeUser;
use App\Models\EpisodeUserPlaylist;
use App\Models\Movie;
use App\Models\MovieUser;
use App\Models\MovieUserPlaylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->whereHas('user_movie_playlists', function($q) {
            $q->where('user_id', Auth::id());
        })->where('status', 1)->get();

        $episodes = Episode::query()->whereHas('user_episode_playlists', function($q) {
            $q->where('user_id', Auth::id());
        })->where('status', 1)->get();

        $playlist_exists = MovieUserPlaylist::where('user_id', Auth::id())->pluck('id')->toArray();

        $like_exists = MovieUser::query()->where('user_id', Auth::id())->pluck('movie_id')->toArray();

        $episode_playlist_exists = EpisodeUserPlaylist::where('user_id', Auth::id())->pluck('episode_id')->toArray();

        $episode_like_exists = EpisodeUser::where('user_id', Auth::id())->pluck('episode_id')->toArray();

        return view('web.watch_list.index', compact('movies', 'episodes', 'playlist_exists', 'like_exists', 'episode_playlist_exists', 'episode_like_exists'));
    }

}
