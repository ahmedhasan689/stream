<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MoviePoint;
use App\Models\MovieUser;
use App\Models\MovieUserPlaylist;
use App\Models\MovieView;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\Share;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {

        $top_movies = Movie::query()->orderBy('evaluation', 'desc')->where('status', 1)->limit(10)->get();

        $latest_movies = Movie::query()->orderBy('created_at', 'desc')->where('status', 1)->get();

        $popular_movies = Movie::query()->orderBy('evaluation', 'asc')->where('status', 1)->get();

        $playlist_exists = MovieUserPlaylist::where('user_id', Auth::id())->pluck('id')->toArray();

        $liked_movies = Movie::query()->with('users', function($query) {
            $query->orderBy('movie_id', 'desc');
        })->where('status', 1)->get();

        $like_exists = MovieUser::query()->where('user_id', Auth::id())->pluck('movie_id')->toArray();

        $recommended_movies = Movie::query()
            ->with('users', function($query) {
                $query->where('user_id', Auth::id());
            })->with('user_movie_playlists', function($query) {
                $query->where('user_id', Auth::id());
            })->withCount('user_views')->where('status', 1)->get();



        if( $request->ajax() ) {
            return view('web.movie.content', compact('latest_movies',  'like_exists', 'recommended_movies', 'liked_movies', 'top_movies', 'popular_movies', 'playlist_exists'))->render();
        }

        return view('web.movie.index', compact('latest_movies', 'like_exists','recommended_movies', 'top_movies', 'liked_movies', 'popular_movies', 'playlist_exists'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show(Request $request, $slug)
    {
        $data['movie'] = Movie::query()->withCount('user_views')->where('slug', $slug)->first();

        $data['categories'] = $data['movie']->categories()->where('movie_id', $data['movie']->id)->pluck('movie_id')->toArray();

        $data['related_movies'] = Movie::query()->withCount('user_views')->whereIn('id', $data['categories'])->where('id', '!=', $data['movie']->id)->get();

        $data['recommended_movies'] = Movie::query()
            ->with('users', function($query) {
                $query->where('user_id', Auth::id());
        })->with('user_movie_playlists', function($query) {
                $query->where('user_id', Auth::id());
            })->withCount('user_views')->whereIn('id', $data['categories'])->where('id', '!=', $data['movie']->id)->get();

        $data['upcoming_movies'] = Movie::query()->where('release_year', '>', Carbon::now())->get();

        $data['playlist_exists'] = MovieUserPlaylist::where('movie_id', $data['movie']->id)->where('user_id', Auth::id())->first();

        $data['like_exists'] = MovieUser::where('movie_id', $data['movie']->id)->where('user_id', Auth::id())->first();

        $data['view_exists'] = MovieView::where('movie_id', $data['movie']->id)->where('user_id', Auth::id())->exists();

        if( !$data['view_exists'] ) {
            MovieView::create([
                'movie_id' => $data['movie']->id,
                'user_id' => Auth::id()
            ]);
        }
        $data['last_played_time'] = session('last_played_time_'.$data['movie']->id) ?? 0;

        if( $request->ajax() ) {
            return view('web.movie._icons', $data)->render();
        }

        return view('web.movie.show', $data);
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
     * @param  \Illuminate\Http\Request  $request
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

    public function playedTime(Request $request, $id)
    {
        $movie = Movie::query()->findOrFail($id);

        $movie_exists = MoviePoint::query()->where('movie_id', $movie->id)->where('user_id', Auth::id())->first();

        if( !$movie_exists ) {
            MoviePoint::create([
                'user_id' => Auth::id(),
                'movie_id' => $movie->id,
                'point' => $request->last_played_time
            ]);

        }else{
            $movie_exists->update([
                'point' => $request->last_played_time,
            ]);
        }


//        $last_played_time = $request->last_played_time;
//        $request->session()->put('last_played_time_'.$movie->id , $last_played_time);
//        return response()->json([
//            'status' => session('last_played_time_'.$movie->id),
//        ]);

    }

    public function viewAll($type)
    {
        $pageTitle = null;
        $data = null;

        $playlist_exists = MovieUserPlaylist::where('user_id', Auth::id())->pluck('id')->toArray();

        $like_exists = MovieUser::query()->where('user_id', Auth::id())->pluck('movie_id')->toArray();

        switch ($type) {
            case 'top_movie':
                $pageTitle = 'Top Rated Movies';
                $data = Movie::query()->orderBy('evaluation', 'desc')->where('status', 1)->get();

                return view('web.movie.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;

            case 'top_viewed' :
                $pageTitle = 'Top Viewed Movies';
                $data = Movie::query()->whereHas('user_views')->withCount('user_views')->orderByDesc('user_views_count')->where('status', 1)->get();

                return view('web.movie.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;

            case 'most_like' :
                $pageTitle = 'Most Liked Movies';
                $data = Movie::query()->with('users', function($query) {
                    $query->orderBy('movie_id', 'desc');
                })->where('status', 1)->get();;

                return view('web.movie.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;

            case 'recommended_movie':
                $pageTitle = 'Recommended For You';
                $data = Movie::query()
                    ->with('users', function($query) {
                        $query->where('user_id', Auth::id());
                    })->with('user_movie_playlists', function($query) {
                        $query->where('user_id', Auth::id());
                    })->withCount('user_views')->where('status', 1)->get();

                return view('web.movie.view_all', compact('pageTitle', 'data', 'playlist_exists' , 'like_exists'));
                break;
        }
    }
}
