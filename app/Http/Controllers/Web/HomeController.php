<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\MoviePoint;
use App\Models\MovieUser;
use App\Models\MovieUserPlaylist;
use App\Models\Serial;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * ? Return Home Page
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data['slider_movies'] = Movie::query()->orderBy('evaluation', 'desc')->limit(3)->get();
        $data['latest_movies'] = Movie::query()->orderBy('created_at', 'desc')->limit(8)->get();

        $data['playlist_exists'] = MovieUserPlaylist::where('user_id', Auth::id())->pluck('movie_id')->toArray();

        $data['like_exists'] = MovieUser::query()->where('user_id', Auth::id())->pluck('movie_id')->toArray();

        $data['upcoming_movies'] = Movie::query()->where('release_year', '>=', Carbon::now())->limit(6)->get();

        $data['top_serials'] = Serial::query()->orderBy('evaluation', 'desc')->limit(8)->get();

        $data['recommended_episodes'] = Episode::query()
            ->with('users', function($query) {
                $query->where('user_id', Auth::id());
            })->with('user_episode_playlists', function($query) {
                $query->where('user_id', Auth::id());
            })->get();

        $data['recommended_movies'] = Movie::query()
            ->with('users', function($query) {
                $query->where('user_id', Auth::id());
            })->with('user_movie_playlists', function($query) {
                $query->where('user_id', Auth::id());
            })->get();

        $data['movie_points'] = Movie::query()->whereHas('user_points', function($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('web.home', $data);
    }
}
