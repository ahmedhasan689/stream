<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\EpisodeUser;
use App\Models\EpisodeUserPlaylist;
use App\Models\Season;
use App\Models\Serial;
use App\Models\SerialUser;
use App\Models\SerialView;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SerialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $serials = Serial::query()->where('status', 1)->get();

        $latest_serials = Serial::query()->orderBy('created_at', 'desc')->where('status', 1)->limit(10)->get();

        $top_serials = Serial::query()->orderBy('evaluation', 'desc')->where('status', 1)->limit(3)->get();

        $popular_serials = Serial::query()->orderBy('viewer', 'desc')->where('status', 1)->get();

        $liked_episodes = Episode::query()->whereHas('users', function($query) {
            $query->orderBy('episode_id', 'desc');
        })->where('status', 1)->get();

        $viewed_episodes = Episode::query()->whereHas('user_views', function($query) {
            $query->orderBy('episode_id', 'desc');
        })->where('status', 1)->get();

        $playlist_exists = EpisodeUserPlaylist::where('user_id', Auth::id())->pluck('id')->toArray();

        $like_exists = EpisodeUser::query()->where('user_id', Auth::id())->pluck('episode_id')->toArray();

        $recommended_episodes = Episode::query()
            ->whereHas('users', function($query) {
                $query->where('user_id', Auth::id());
            })->whereHas('user_episode_playlists', function($query) {
                $query->where('user_id', Auth::id());
            })->whereHas('season')->withCount('user_views')->where('status', 1)->get();

        $episode_points = Episode::query()->whereHas('user_points', function($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('web.serial.index', compact('serials', 'like_exists', 'playlist_exists', 'latest_serials', 'popular_serials', 'liked_episodes', 'viewed_episodes', 'top_serials', 'recommended_episodes', 'episode_points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $serial = Serial::query()->where('slug', $slug)->first();

        $latest_episode = Episode::query()->with(['season' => function($query) use ($serial) {
            $query->where('serial_id', $serial->id)->orderBy('id', 'desc');
        }])->orderBy('id', 'desc')->first();



        return view('web.serial.show', compact('serial', 'latest_episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        $like_exists = SerialUser::query()->where('user_id', Auth::id())->pluck('serial_id')->toArray();

        switch ($type) {
            case 'top_serial':
                $pageTitle = 'Top Rated Serials';
                $data = Serial::query()->orderBy('evaluation', 'desc')->where('status', 1)->get();

                return view('web.serial.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;

            case 'top_viewed' :
                $pageTitle = 'Top Viewed Serials';
                $data = Serial::query()->where('status', 1)->get();

                return view('web.serial.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;

            case 'recommended_serial':
                $pageTitle = 'Recommended For You';
                $data = Episode::query()
                    ->whereHas('users', function($query) {
                        $query->where('user_id', Auth::id());
                    })->whereHas('user_episode_playlists', function($query) {
                        $query->where('user_id', Auth::id());
                    })->whereHas('season')->withCount('user_views')->where('status', 1)->get();

                return view('web.serial.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;
        }
    }
}
