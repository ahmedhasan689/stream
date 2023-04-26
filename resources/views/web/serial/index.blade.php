<x-front-layout title="Serials">
    <!-- Slider Start -->
    @if( $latest_serials->count() > 0 )
        <section class="banner-container iq-rtl-direction">
            <div class="movie-banner  tvshows-slider">
                <div  class="swiper-banner-container " data-swiper="banner-detail-slider">
                    <div class="swiper-wrapper ">
                        @foreach( $latest_serials as $l_serial )
                            <div class="swiper-slide show-banner-2 swiper-bg" style="background-image: url({{ asset('storage') . '/' . $l_serial->image }})">
                                <div class="shows-content h-100">
                                    <div class="row align-items-center h-100" >
                                        <div class=" col-lg-7 col-md-12">
                                            <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                                                data-delay-in="0.6">
                                                {{ $l_serial->name }}
                                            </h1>
                                            <div class="flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft" style="opacity: 1;">
                                                <div class="slider-ratting d-flex align-items-center">
                                                    <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                        @for( $i = 1; $i <= $l_serial->evaluation; $i++ )
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <span class="text-white ml-3">{{ $l_serial->evaluation }} (lmdb)</span>
                                                </div>
                                                <div class="d-flex align-items-center movie-banner-time">
                                                    <span class="trending-year">{{ $l_serial->seasons()->count() }} Seasons</span>
                                                    <span class="mx-2 mx-md-3">
                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                    </span>
                                                    <span class="trending-year">
                                                        {{ \Carbon\Carbon::parse($l_serial->release_year)->isoFormat('MMM YY') }}
                                                    </span>
                                                </div>
                                                <p class="movie-banner-text" data-animation-in="fadeInUp" data-delay-in="1.2">
                                                    {{ $l_serial->describe }}
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                                                <a href="{{ route('serial.show', ['slug' => $l_serial->slug]) }}" class="btn btn-hover iq-button">
                                                    <i class="fa fa-play mr-2" aria-hidden="true"></i>
                                                    Play Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class=" col-lg-5 col-md-12 trailor-video text-center d-none d-lg-block">
                                            <a href="{{ $l_serial->trailer }}" class="video-open playbtn">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                                                     enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                                    <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                                         stroke-linejoin="round" stroke-miterlimit="10"
                                                         points="73.5,62.5 148.5,105.8 73.5,149.1 "
                                                    />
                                                    <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                                                 </svg>
                                                <span class="w-trailor">Watch Trailer</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-banner-button-next ">
                        <i class="ri-arrow-left-s-line arrow-icon"></i>
                    </div>
                    <div class="swiper-banner-button-prev">
                        <i class="ri-arrow-right-s-line arrow-icon"></i>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Slider End -->
    <!-- MainContent -->
    <div class="main-content">

        @auth
            @if( $episode_points->count() > 0 )
                <section id="iq-favorites">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="main-title">Keep Watching</h4>
                                    <a href="{{ route('episode.viewAll', ['type' => 'keep_watch']) }}" class="text-primary iq-view-all">View All</a>
                                </div>
                            </div>
                        </div>
                        <!-- Swiper -->
                        <div class="favourite-slider">
                            <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                                <ul class="swiper-wrapper p-0 m-0 ">
                                    @foreach( $episode_points as $episode_point )
                                        <li class="swiper-slide slide-item">
                                            <div class="block-images position-relative ">
                                                <div class="img-box">
                                                    <img src="{{ asset('storage') . '/' . $episode_point->image }}"
                                                         class="img-fluid" alt="" loading="lazy">
                                                </div>
                                                <div class="block-description">
                                                    <h6 class="iq-title">
                                                        <a href="{{ route('episode.show', ['slug' => $episode_point->slug]) }}">
                                                            {{ $episode_point->name }}
                                                        </a>
                                                    </h6>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        @php
                                                            $point = \App\Models\EpisodePoint::where('episode_id', $episode_point->id)->where('user_id', auth()->user()->id)->first()->point;
                                                        @endphp
                                                        <span class="text-white">{{ round( $point, 0 ) * 100/100 }} seconds</span>
                                                    </div>
                                                    <div class="hover-buttons">
                                                        <a href="{{ route('episode.show', [ 'slug' => $episode_point->slug ]) }}"
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
                                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('episode') . '/' . $episode_point->slug }}"
                                                                           class="share-ico">
                                                                            <i class="ri-facebook-fill"></i>
                                                                        </a>
                                                                        <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('episode') . '/' . $episode_point->slug }}"
                                                                           class="share-ico">
                                                                            <i class="ri-twitter-fill"></i>
                                                                        </a>
                                                                        <a href="https://pinterest.com/pin/create/button/?url={{ url('episode') . '/' . $episode_point->slug }}"
                                                                           class="share-ico">
                                                                            <i class="ri-pinterest-fill"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @if( in_array($episode_point->id, $like_exists) )
                                                                <li class="delete_like"
                                                                    data-id="{{ $episode_point->id }}">
                                                            <span style="color: #FFF; background-color: #E50914 ">
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                                </li>
                                                            @else
                                                                <li class="add_like"
                                                                    data-id="{{ $episode_point->id }}">
                                                            <span>
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                                </li>
                                                            @endif
                                                            @if( in_array($episode_point->id, $playlist_exists) )
                                                                {{-- Here Will Be Delete --}}
                                                                <li class="delete_playlist"
                                                                    data-id="{{ $episode_point->id }}">
                                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                                </li>
                                                            @else
                                                                {{-- Here Will Be Add --}}
                                                                <li class="add_playlist"
                                                                    data-id="{{ $episode_point->id }}">
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

        @if( $popular_serials->count() > 0 )
            <section id="iq-favorites" class="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title ">Top Viewed TV Shows</h4>
                                <a href="{{ route('serial.viewAll', ['type' => 'top_viewed']) }}" class="text-primary iq-view-all">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction " data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach( $popular_serials as $p_serial )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $p_serial->image }}" style="height: 185px; width: 100%" class="img-fluid" alt="" loading="lazy">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('serial.show', ['slug' => $p_serial->slug]) }}">
                                                        {{ $p_serial->name }}
                                                    </a>
                                                </h6>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('serial.show', ['slug' => $p_serial->slug]) }}" role="button" class="btn btn-hover"><i
                                                            class="fa fa-play mr-1" aria-hidden="true"></i>
                                                        Show Now
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
                                                                   target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                        class="ri-facebook-fill"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                   target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                        class="ri-twitter-fill"></i></a>
                                                                <a href="#"
                                                                   data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                   class="share-ico iq-copy-link" tabindex="0"><i
                                                                        class="ri-links-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if( in_array($p_serial->id, $like_exists) )
                                                        <li class="delete_like" data-id="{{ $p_serial->id }}">
                                                            <span style="color: #FFF; background-color: #E50914 ">
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_like" data-id="{{ $p_serial->id }}">
                                                            <span>
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @endif
                                                    @if( in_array($p_serial->id, $playlist_exists ) )
                                                        <li class="delete_playlist" data-id="{{ $p_serial->id }}">
                                                            <span href="#" style="background-color: #E50914; color: #fff">
                                                                <i class="fa fa-check"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_playlist" data-id="{{ $p_serial->id }}">
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

        @if( $liked_episodes->count() > 0 )
            <section id="iq-upcoming-movie" class="iq-rtl-direction">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Most Liked Episode</h4>
                                <a href="{{ route('episode.viewAll', ['type' => 'most_like']) }}" class="text-primary iq-view-all">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach( $liked_episodes as $l_episode )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $l_episode->image }}" loading="lazy" style="height: 185px; width: 100%" class="img-fluid" alt="">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('episode.show', ['slug' => $l_episode->slug]) }}">
                                                        {{ $l_episode->name }}
                                                    </a>
                                                </h6>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('episode.show', ['slug' => $l_episode->slug]) }}" role="button" class="btn btn-hover"><i
                                                            class="fa fa-play mr-1" aria-hidden="true"></i>
                                                        Show Now
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
                                                                   target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                        class="ri-facebook-fill"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                   target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                        class="ri-twitter-fill"></i></a>
                                                                <a href="#"
                                                                   data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                   class="share-ico iq-copy-link" tabindex="0"><i
                                                                        class="ri-links-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if( in_array($l_episode->id, $like_exists) )
                                                        <li class="delete_like" data-id="{{ $l_episode->id }}">
                                                            <span style="color: #FFF; background-color: #E50914 ">
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_like" data-id="{{ $l_episode->id }}">
                                                            <span>
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @endif
                                                    @if( in_array($l_episode->id, $playlist_exists ) )
                                                        <li class="delete_playlist" data-id="{{ $l_episode->id }}">
                                                            <span href="#" style="background-color: #E50914; color: #fff">
                                                                <i class="fa fa-check"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_playlist" data-id="{{ $l_episode->id }}">
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

        @if( $viewed_episodes->count() > 0 )
            <section id="iq-upcoming-movie" class="iq-rtl-direction">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Most Viewed Episode</h4>
                                <a href="{{ route('episode.viewAll', ['type' => 'most_viewed']) }}" class="text-primary iq-view-all">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach( $viewed_episodes as $l_episode )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $l_episode->image }}" loading="lazy" style="height: 185px; width: 100%" class="img-fluid" alt="">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('episode.show', ['slug' => $l_episode->slug]) }}">
                                                        {{ $l_episode->name }}
                                                    </a>
                                                </h6>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('episode.show', ['slug' => $l_episode->slug]) }}" role="button" class="btn btn-hover"><i
                                                            class="fa fa-play mr-1" aria-hidden="true"></i>
                                                        Show Now
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
                                                                   target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                        class="ri-facebook-fill"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                   target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                        class="ri-twitter-fill"></i></a>
                                                                <a href="#"
                                                                   data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                   class="share-ico iq-copy-link" tabindex="0"><i
                                                                        class="ri-links-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if( in_array($l_episode->id, $like_exists) )
                                                        <li class="delete_like" data-id="{{ $l_episode->id }}">
                                                                <span style="color: #FFF; background-color: #E50914 ">
                                                                    <i class="ri-heart-fill"></i>
                                                                </span>
                                                        </li>
                                                    @else
                                                        <li class="add_like" data-id="{{ $l_episode->id }}">
                                                                <span>
                                                                    <i class="ri-heart-fill"></i>
                                                                </span>
                                                        </li>
                                                    @endif
                                                    @if( in_array($l_episode->id, $playlist_exists ) )
                                                        <li class="delete_playlist" data-id="{{ $l_episode->id }}">
                                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                        </li>
                                                    @else
                                                        <li class="add_playlist" data-id="{{ $l_episode->id }}">
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
            @if( $recommended_episodes->count() > 0 )
                <section id="iq-suggestede" class="iq-rtl-direction">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="main-title">Shows We Recommend</h4>
                                    <a href="{{ route('serial.viewAll', ['type' => 'recommended_serial']) }}" class="text-primary iq-view-all">View All</a>
                                </div>
                            </div>
                        </div>
                        <!-- Swiper -->
                        <div class="favourite-slider">
                            <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                                <ul class="swiper-wrapper p-0 m-0">
                                    @foreach( $recommended_episodes as $re_episode )
                                        <li class="swiper-slide slide-item" style="height: 160px;">
                                            <div class="block-images position-relative ">
                                                <div class="img-box">
                                                    <img src="{{ asset('storage') . '/' . $re_episode->image }}" loading="lazy" class="img-fluid" alt="">
                                                </div>
                                                <div class="block-description">
                                                    <h6 class="iq-title">
                                                        <a href="{{ route('serial.show', ['slug' => $re_episode->slug]) }}">
                                                            {{ $re_episode->name }}
                                                        </a>
                                                    </h6>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        <span class="text-white">{{ $re_episode->hour }}hr : {{ $re_episode->minute }}mins</span>
                                                    </div>
                                                    <div class="hover-buttons">
                                                        <a href="{{ route('serial.show', ['slug' => $re_episode->season->serial->slug]) }}" role="button" class="btn btn-hover"><i
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
                                                                       target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                            class="ri-facebook-fill"></i></a>
                                                                    <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                       target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i
                                                                            class="ri-twitter-fill"></i></a>
                                                                    <a href="#"
                                                                       data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                       class="share-ico iq-copy-link" tabindex="0"><i
                                                                            class="ri-links-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @if( in_array($re_episode->id, $like_exists) )
                                                            <li class="delete_like" data-id="{{ $re_episode->id }}">
                                                                <span style="color: #FFF; background-color: #E50914 ">
                                                                    <i class="ri-heart-fill"></i>
                                                                </span>
                                                            </li>
                                                        @else
                                                            <li class="add_like" data-id="{{ $re_episode->id }}">
                                                                <span>
                                                                    <i class="ri-heart-fill"></i>
                                                                </span>
                                                            </li>
                                                        @endif
                                                        @if( in_array($re_episode->id, $playlist_exists ) )
                                                            <li class="delete_playlist" data-id="{{ $re_episode->id }}">
                                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                            </li>
                                                        @else
                                                            <li class="add_playlist" data-id="{{ $re_episode->id }}">
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
    </div>
    @section('js')
        <script>
            $(document).on('click', '.delete_playlist', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $(this).empty();
                $(this).addClass('add_playlist');
                $(this).removeClass('delete_playlist');
                $(this).append(`
                <span href="#">
                    <i class="ri-add-line"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('movie_playlist.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        $.ajax({
                            url: "{{ route('home') }}"
                        }).done(function (data) {
                            $('.content').html(data);
                        })
                    },
                    error: function (data) {

                    },
                });
            });

            $(document).on('click', '.add_playlist', function (e) {
                e.preventDefault()

                var id = $(this).data('id')
                $(this).empty();
                $(this).addClass('delete_playlist');
                $(this).removeClass('add_playlist');
                $(this).append(`
                <span href="#" style="background-color: #E50914; color: #fff">
                    <i class="fa fa-check"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('movie_playlist.store') }}",
                    type: "GET",
                    data: {
                        movie_id: id,
                    },
                    success: function (data) {
                        {{--$.ajax({--}}
                        {{--    url: "{{ route('home') }}"--}}
                        {{--}).done(function(data) {--}}
                        {{--    $('.content').html(data);--}}
                        {{--})--}}
                    },
                    error: function (data) {

                    },
                });
            });

            $(document).on('click', '.delete_like', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $(this).empty();
                $(this).addClass('add_like');
                $(this).removeClass('delete_like');
                $(this).append(`
                <span>
                    <i class="ri-heart-fill"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('movie_like.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {

                    }
                })
            });

            $(document).on('click', '.add_like', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $(this).empty();
                $(this).addClass('delete_like');
                $(this).removeClass('add_like');
                $(this).append(`
                <span style="color: #FFF; background-color: #E50914 ">
                    <i class="ri-heart-fill"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('movie_like.store') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {

                    }
                })
            });
        </script>
    @endsection
</x-front-layout>
