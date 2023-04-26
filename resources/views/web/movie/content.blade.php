
@auth
    @if( $movie_points->count() > 0 )
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">Keep Watching</h4>
                            <a href="{{ route('movie.viewAll', ['type' => 'keep_watch']) }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="favourite-slider">
                    <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                        <ul class="swiper-wrapper p-0 m-0 ">
                            @foreach( $movie_points as $movie_point )
                                <li class="swiper-slide slide-item">
                                    <div class="block-images position-relative ">
                                        <div class="img-box">
                                            <img src="{{ asset('storage') . '/' . $movie_point->image }}"
                                                 class="img-fluid" alt="" loading="lazy">
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="{{ route('movie.show', ['slug' => $movie_point->slug]) }}">
                                                    {{ $movie_point->name }}
                                                </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                @php
                                                    $point = \App\Models\MoviePoint::where('movie_id', $movie_point->id)->where('user_id', auth()->user()->id)->first()->point;
                                                @endphp
                                                <span class="text-white">{{ round( $point, 0 ) * 100/100 }} seconds</span>
                                            </div>
                                            <div class="hover-buttons">
                                                <a href="{{ route('movie.show', [ 'slug' => $movie_point->slug ]) }}"
                                                   role="button" class="btn btn-hover"><i
                                                        class="fa fa-play mr-1" aria-hidden="true"></i>
                                                    Play Now
                                                </a>
                                            </div>
                                        </div>
                                        @auth
                                            <div class="block-social-info">
                                                <ul class="list-inline p-0 m-0 music-play-lists">
                                                    <li class="share">
                                                        <span>
                                                            <i class="ri-share-fill"></i>
                                                        </span>
                                                        <div class="share-box">
                                                            <div class="d-flex align-items-center">
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('movies') . '/' . $movie_point->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-facebook-fill"></i>
                                                                </a>
                                                                <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('movies') . '/' . $movie_point->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-twitter-fill"></i>
                                                                </a>
                                                                <a href="https://pinterest.com/pin/create/button/?url={{ url('movies') . '/' . $movie_point->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-pinterest-fill"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if( in_array($movie_point->id, $like_exists) )
                                                        <li class="delete_like"
                                                            data-id="{{ $movie_point->id }}">
                                                            <span style="color: #FFF; background-color: #E50914 ">
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_like"
                                                            data-id="{{ $movie_point->id }}">
                                                            <span>
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @endif
                                                    @if( in_array($movie_point->id, $playlist_exists) )
                                                        {{-- Here Will Be Delete --}}
                                                        <li class="delete_playlist"
                                                            data-id="{{ $movie_point->id }}">
                                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                        </li>
                                                    @else
                                                        {{-- Here Will Be Add --}}
                                                        <li class="add_playlist"
                                                            data-id="{{ $movie_point->id }}">
                                                            <span href="#">
                                                                <i class="ri-add-line"></i>
                                                            </span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endauth
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endauth

@if( $popular_movies->count() > 0 )
    <section id="iq-upcoming-movie" class="iq-rtl-direction">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                            Top Viewed Movies
                        </h4>
                        <a href="{{ route('movie.viewAll', ['type' => 'top_viewed']) }}" class="text-primary iq-view-all">View All</a>
                    </div>
                </div>
            </div>
            <!-- Swiper -->
            <div class="favourite-slider">
                <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                    <ul class="swiper-wrapper m-0 p-0">
                        @foreach( $popular_movies as $p_movie )
                            <li class="swiper-slide slide-item" style="height: 160px;">
                                <div class="block-images position-relative ">
                                    <div class="img-box">
                                        <img src="{{ asset('storage') . '/' . $p_movie->image }}" style="height: 185px; width: 100%" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                        <h6 class="iq-title">
                                            <a href="{{ route('movie.show', ['slug' => $p_movie->slug]) }}">
                                                {{ $p_movie->name }}
                                            </a>
                                        </h6>
                                        <div class="movie-time d-flex align-items-center my-2">
                                            <span class="text-white">{{ $p_movie->hour }}hr : {{ $p_movie->minute }}mins</span>
                                        </div>
                                        <div class="hover-buttons">
                                            <a href="{{ route('movie.show', ['slug' => $p_movie->slug]) }}" role="button" class="btn btn-hover"><i
                                                    class="fa fa-play mr-1" aria-hidden="true"></i>
                                                Play Now
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-social-info">
                                        <ul class="list-inline p-0 m-0 music-play-lists">
                                            <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                    <div class="d-flex align-items-center">
                                                        <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                           target="_blank" rel="noopener noreferrer" class="share-ico"
                                                           tabindex="0"><i
                                                                class="ri-facebook-fill"></i></a>
                                                        <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                           target="_blank" rel="noopener noreferrer" class="share-ico"
                                                           tabindex="0"><i
                                                                class="ri-twitter-fill"></i></a>
                                                        <a href="#"
                                                           data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                           class="share-ico iq-copy-link" tabindex="0"><i
                                                                class="ri-links-fill"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @if( in_array($p_movie->id, $like_exists) )
                                                <li class="delete_like" data-id="{{ $p_movie->id }}">
                                                    <span style="color: #FFF; background-color: #E50914 ">
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="add_like" data-id="{{ $p_movie->id }}">
                                                    <span>
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                                </li>
                                            @endif
                                            @if( in_array($p_movie->id, $playlist_exists ) )
                                                <li class="delete_playlist" data-id="{{ $p_movie->id }}">
                                                    <span href="#" style="background-color: #E50914; color: #fff">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="add_playlist" data-id="{{ $p_movie->id }}">
                                                    <span href="#" >
                                                        <i class="ri-add-line"></i>
                                                    </span>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
@endif

@if( $liked_movies->count() > 0 )
    <section id="iq-upcoming-movie" class="iq-rtl-direction">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">
                            Most Liked Movies
                        </h4>
                        <a href="{{ route('movie.viewAll', ['type' => 'most_like']) }}" class="text-primary iq-view-all">View All</a>
                    </div>
                </div>
            </div>
            <!-- Swiper -->
            <div class="favourite-slider">
                <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                    <ul class="swiper-wrapper m-0 p-0">
                        @foreach( $liked_movies as $liked_movie )
                            <li class="swiper-slide slide-item" style="height: 160px;">
                                <div class="block-images position-relative ">
                                    <div class="img-box">
                                        <img src="{{ asset('storage') . '/' . $liked_movie->image }}" style="height: 185px; width: 100%" class="img-fluid" alt="">
                                    </div>
                                    <div class="block-description">
                                        <h6 class="iq-title">
                                            <a href="{{ route('movie.show', ['slug' => $liked_movie->slug]) }}">
                                                {{ $liked_movie->name }}
                                            </a>
                                        </h6>
                                        <div class="movie-time d-flex align-items-center my-2">
                                            <span class="text-white">{{ $liked_movie->hour }}hr : {{ $liked_movie->minute }}mins</span>
                                        </div>
                                        <div class="hover-buttons">
                                            <a href="{{ route('movie.show', ['slug' => $liked_movie->slug]) }}" role="button" class="btn btn-hover"><i
                                                    class="fa fa-play mr-1" aria-hidden="true"></i>
                                                Play Now
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-social-info">
                                        <ul class="list-inline p-0 m-0 music-play-lists">
                                            <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                    <div class="d-flex align-items-center">
                                                        <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                           target="_blank" rel="noopener noreferrer" class="share-ico"
                                                           tabindex="0"><i
                                                                class="ri-facebook-fill"></i></a>
                                                        <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                           target="_blank" rel="noopener noreferrer" class="share-ico"
                                                           tabindex="0"><i
                                                                class="ri-twitter-fill"></i></a>
                                                        <a href="#"
                                                           data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                           class="share-ico iq-copy-link" tabindex="0"><i
                                                                class="ri-links-fill"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @if( in_array($liked_movie->id, $like_exists) )
                                                <li class="delete_like" data-id="{{ $liked_movie->id }}">
                                                    <span style="color: #FFF; background-color: #E50914 ">
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="add_like" data-id="{{ $liked_movie->id }}">
                                                    <span>
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                                </li>
                                            @endif
                                            @if( in_array($liked_movie->id, $playlist_exists ) )
                                                <li class="delete_playlist" data-id="{{ $l_movie->id }}">
                                                    <span href="#" style="background-color: #E50914; color: #fff">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="add_playlist" data-id="{{ $liked_movie->id }}">
                                                    <span href="#" >
                                                        <i class="ri-add-line"></i>
                                                    </span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
@endif


@auth
    @if( $recommended_movies->count() > 0 )
        <section id="iq-suggestede" class="iq-rtl-direction">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">
                                Movies Recommended For You
                            </h4>
                            <a href="{{ route('movie.viewAll', ['type' => 'recommended_movie']) }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="favourite-slider">
                    <div class="swiper pt-2 pt-md-4 pt-lg-4  iq-rtl-direction" data-swiper="common-slider">
                        <ul class="swiper-wrapper m-0 p-0">
                            @foreach( $recommended_movies as $r_movie )
                                <li class="swiper-slide slide-item">
                                    <div class="block-images position-relative">
                                        <div class="img-box">
                                            <img src="{{ asset('storage') . '/' . $r_movie->image }}" style="height: 185px; width: 100%" class="img-fluid" alt="">
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="{{ route('movie.show', ['slug' => $r_movie->slug]) }}">
                                                    X-Men
                                                </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <span class="text-white">{{ $r_movie->hour }}hr : {{ $r_movie->minute }}mins</span>
                                            </div>
                                            <div class="hover-buttons">
                                                <a href="{{ route('movie.show', ['slug' => $r_movie->slug]) }}" role="button" class="btn btn-hover">
                                                    <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                    Play Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class="block-social-info">
                                            <ul class="list-inline p-0 m-0 music-play-lists">
                                                <li class="share">
                                                    <span><i class="ri-share-fill"></i></span>
                                                    <div class="share-box">
                                                        <div class="d-flex align-items-center">
                                                            <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                               target="_blank" rel="noopener noreferrer" class="share-ico"
                                                               tabindex="0"><i
                                                                    class="ri-facebook-fill"></i></a>
                                                            <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                               target="_blank" rel="noopener noreferrer" class="share-ico"
                                                               tabindex="0"><i
                                                                    class="ri-twitter-fill"></i></a>
                                                            <a href="#"
                                                               data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                               class="share-ico iq-copy-link" tabindex="0"><i
                                                                    class="ri-links-fill"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                @if( in_array($r_movie->id, $like_exists) )
                                                    <li class="delete_like" data-id="{{ $r_movie->id }}">
                                                    <span style="color: #FFF; background-color: #E50914 ">
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                                    </li>
                                                @else
                                                    <li class="add_like" data-id="{{ $r_movie->id }}">
                                                    <span>
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                                    </li>
                                                @endif
                                                @if( in_array($r_movie->id, $playlist_exists ) )
                                                    <li class="delete_playlist" data-id="{{ $r_movie->id }}">
                                                    <span href="#" style="background-color: #E50914; color: #fff">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    </li>
                                                @else
                                                    <li class="add_playlist" data-id="{{ $r_movie->id }}">
                                                    <span href="#" >
                                                        <i class="ri-add-line"></i>
                                                    </span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endauth
