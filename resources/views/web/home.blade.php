<x-front-layout title="Home">
    @if( $slider_movies->count() > 0 )
        <section id="home-banner-slider"
                 class="iq-main-slider p-0 iq-rtl-direction swiper banner-home-swiper overflow-hidden"
                 data-swiper="home-banner-slider">
            <div class="slider m-0 p-0 swiper-wrapper home-slider">
                @foreach( $slider_movies as $slider_movie )
                    <div class="swiper-slide  slide swiper-bg s-bg-1" style="background-image: url({{ asset('storage') . '/' . $slider_movie->image }})">
                        <div class="container-fluid position-relative h-100">
                            <div class="slider-inner h-100">
                                <div class="row align-items-center  iq-ltr-direction h-100 ">
                                    <div class="col-lg-7 col-md-12">
                                        <a href="{{ route('movie.show', ['slug' => $slider_movie->slug]) }}">
                                            <div class="channel-logo" data-iq-gsap="onStart" data-iq-position-x="-150"
                                                 data-iq-position-y="0" data-iq-duration="1" data-iq-delay=".4">
                                                <img src="{{ asset('storage') . '/' . $slider_movie->image }}"
                                                     class="c-logo" alt="streamit" loading="lazy">
                                            </div>
                                        </a>
                                        <h1 class="slider-text big-title title text-uppercase" data-iq-gsap="onStart"
                                            data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1"
                                            data-iq-delay=".4">
                                            {{ $slider_movie->name }}
                                        </h1>
                                        <div class="d-flex flex-wrap align-items-center r-mb-23" data-iq-gsap="onStart"
                                             data-iq-position-x="-150" data-iq-position-y="0" data-iq-duration="1"
                                             data-iq-delay=".4">
                                            <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                                <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                    @for($i = 1; $i <= $slider_movie->evaluation; $i++)
                                                        <li>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </li>
                                                    @endfor
                                                </ul>
                                                <span class="text-white ml-2">{{ $slider_movie->evaluation }} (lmdb)</span>
                                            </div>
                                            <div class="d-flex align-items-center mt-2 mt-md-3">
                                                <span class="badge badge-secondary p-2">NC-17</span>
                                                <span class="ml-3">{{ $slider_movie->hour }}hrs : {{ $slider_movie->minute }}mins</span>
                                            </div>
                                            <p data-iq-gsap="onStart" data-iq-position-x="0" data-iq-position-y="150"
                                               data-iq-duration="1" data-iq-delay=".5">
                                                {{ $slider_movie->description }}
                                            </p>
                                        </div>
                                        <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                                            <div class="text-primary title starring">
                                                Starring:
                                                <span class="text-body">
                                                    @foreach( $slider_movie->actors as $actor )
                                                        <a href="cast-karen-gilchrist.html">
                                                            {{ $actor->name }}
                                                        </a>
                                                    @endforeach
                                                </span>
                                            </div>
                                            <div class="text-primary title genres">
                                                Genres:
                                                <span class="text-body">
                                                    @foreach( $slider_movie->categories as $category )
                                                        <a href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    @endforeach
                                                </span>
                                            </div>
                                            <div class="text-primary title tag">
                                                Tag:
                                                <span class="text-body">
                                                    @foreach( $slider_movie->tags as $tag )
                                                        <a href="#">
                                                            {{ $tag->name }}
                                                        </a>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center r-mb-23" data-iq-gsap="onStart"
                                             data-iq-position-x="0" data-iq-position-y="150" data-iq-duration="1"
                                             data-iq-delay=".6">
                                            <a href="{{ route('movie.show', ['slug' => $slider_movie->slug]) }}"
                                               class="btn btn-hover iq-button"><i
                                                    class="fa fa-play mr-2"
                                                    aria-hidden="true"></i>Play Now</a>
                                        </div>
                                    </div>
                                    <div class=" col-lg-5 col-md-12 trailor-video iq-slider d-none d-lg-block">
                                        <a href="{{ asset('storage') . '/' . $slider_movie->trailer }}"
                                           class="video-open playbtn" tabindex="0">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px"
                                                 height="80px"
                                                 viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
                                                 xml:space="preserve">
                                                 <polygon class="triangle" fill="none" stroke-width="7"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-miterlimit="10"
                                                          points="73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8"
                                                        r="103.3">
                                                </circle>
                                            </svg>
                                            <span class="w-trailor">Watch Trailer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-banner-button-prev swiper-nav" id="home-banner-slider-prev">
                <i class="ri-arrow-left-s-line arrow-icon"></i>
            </div>
            <div class="swiper-banner-button-next swiper-nav" id="home-banner-slider-next">
                <i class="ri-arrow-right-s-line arrow-icon"></i>
            </div>
            <div class="swiper-pagination"></div>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
                        fill="none" stroke="currentColor">
                    <circle r="20" cy="22" cx="22" id="test"></circle>
                </symbol>
            </svg>
        </section>
    @endif
    <!-- Slider End -->

    <!-- MainContent -->
    <div class="main-content">
        @auth
            @if( $movie_points->count() > 0 )
                <section id="iq-favorites">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="main-title">Keep Watching</h4>
                                    <a href="{{ route('movie.index') }}" class="text-primary iq-view-all">View All</a>
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

        @if( $latest_movies->count() > 0 )
            <section id="iq-favorites">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Latest Movies</h4>
                                <a href="{{ route('movie.index') }}" class="text-primary iq-view-all">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper p-0 m-0 ">
                                @foreach( $latest_movies as $latest_movie )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $latest_movie->image }}"
                                                     class="img-fluid" alt="" loading="lazy">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('movie.show', ['slug' => $latest_movie->slug]) }}">
                                                        {{ $latest_movie->name }}
                                                    </a>
                                                </h6>
                                                <div class="movie-time d-flex align-items-center my-2">
                                                    <span class="text-white">{{ $latest_movie->hour }}hr : {{ $latest_movie->minute }}mins</span>
                                                </div>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('movie.show', [ 'slug' => $latest_movie->slug ]) }}"
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
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('movies') . '/' . $latest_movie->slug }}"
                                                                       class="share-ico">
                                                                        <i class="ri-facebook-fill"></i>
                                                                    </a>
                                                                    <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('movies') . '/' . $latest_movie->slug }}"
                                                                       class="share-ico">
                                                                        <i class="ri-twitter-fill"></i>
                                                                    </a>
                                                                    <a href="https://pinterest.com/pin/create/button/?url={{ url('movies') . '/' . $latest_movie->slug }}"
                                                                       class="share-ico">
                                                                        <i class="ri-pinterest-fill"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @if( in_array($latest_movie->id, $like_exists) )
                                                            <li class="delete_like" data-id="{{ $latest_movie->id }}">
                                                                <span style="color: #FFF; background-color: #E50914 ">
                                                                    <i class="ri-heart-fill"></i>
                                                                </span>
                                                            </li>
                                                        @else
                                                            <li class="add_like" data-id="{{ $latest_movie->id }}">
                                                                <span>
                                                                    <i class="ri-heart-fill"></i>
                                                                </span>
                                                            </li>
                                                        @endif
                                                        @if( in_array($latest_movie->id, $playlist_exists) )
                                                            {{-- Here Will Be Delete --}}
                                                            <li class="delete_playlist" data-id="{{ $latest_movie->id }}">
                                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                            </li>
                                                        @else
                                                            {{-- Here Will Be Add --}}
                                                            <li class="add_playlist" data-id="{{ $latest_movie->id }}">
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

    @if( $upcoming_movies->count() > 0 )
        <section id="iq-upcoming-movie">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">Upcoming Movies</h4>
                            <a href="{{ route('movie.index') }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="favourite-slider">
                    <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                        <ul class="swiper-wrapper p-0 m-0">
                            @foreach( $upcoming_movies as $upcoming_movie )
                                <li class="swiper-slide slide-item">
                                    <div class="block-images position-relative ">
                                        <div class="img-box">
                                            <img src="{{ asset('storage') . '/' . $upcoming_movie->image }}"
                                                 class="img-fluid"
                                                 alt="" loading="lazy">
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="{{ route('movie.show', ['slug' => $upcoming_movie->slug]) }}">
                                                    {{ $upcoming_movie->name }}
                                                </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <span class="text-white">{{ $upcoming_movie->hour }}hr : {{ $upcoming_movie->minute }}mins</span>
                                            </div>
                                            <div class="hover-buttons">
                                                <a href="{{ route('movie.show', ['slug' => $upcoming_movie->slug]) }}"
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
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('episode') . '/' . $upcoming_movie->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-facebook-fill"></i>
                                                                </a>
                                                                <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('episode') . '/' . $upcoming_movie->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-twitter-fill"></i>
                                                                </a>
                                                                <a href="https://pinterest.com/pin/create/button/?url={{ url('episode') . '/' . $upcoming_movie->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-pinterest-fill"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if( in_array($upcoming_movie->id, $like_exists) )
                                                        <li class="delete_like" data-id="{{ $upcoming_movie->id }}">
                                                            <span style="color: #FFF; background-color: #E50914 ">
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_like" data-id="{{ $upcoming_movie->id }}">
                                                            <span>
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                        </li>
                                                    @endif
                                                    @if( in_array($upcoming_movie->id, $playlist_exists) )
                                                        {{-- Here Will Be Delete --}}
                                                        <li class="delete_playlist" data-id="{{ $upcoming_movie->id }}">
                                        <span href="#" style="background-color: #E50914; color: #fff">
                                            <i class="fa fa-check"></i>
                                        </span>
                                                        </li>
                                                    @else
                                                        {{-- Here Will Be Add --}}
                                                        <li class="add_playlist" data-id="{{ $upcoming_movie->id }}">
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

    @if( $top_serials->count() > 0 )
        <div class="verticle-slider mb-5">
            <div class="container-fluid">
                <section class="slider">
                    <div class="slider-flex position-relative">
                        <div class="swiper-button-prev verticle-btn"></div>
                        <h4 class="main-title ">Top 10 Serials</h4>
                        @foreach( $top_serials as $top_serial )
                            <div class="slider--col position-relative">
                                <div class="slider-prev btn-verticle">
                                    <i class="ri-arrow-up-s-line vertical-aerrow"></i>
                                </div>
                                <div class="slider-thumbs" data-swiper="slider-thumbs">
                                    <div class="swiper-container " data-swiper="slider-thumbs-inner">
                                        <div class="swiper-wrapper top-ten-slider-nav">

                                            <div class="swiper-slide swiper-bg">
                                                <div class="block-images position-relative ">
                                                    <div class="img-box slider--image">
                                                        <img src="{{ asset('storage') . '/' . $top_serial->image }}"
                                                             class="img-fluid" alt=""
                                                             loading="lazy">
                                                    </div>
                                                    <div class="block-description">
                                                        <h6 class="iq-title">
                                                            <a href="{{ route('serial.show', ['slug' => $top_serial->slug]) }}">
                                                                {{ $top_serial->name }}
                                                            </a>
                                                        </h6>
                                                        <div class="movie-time d-flex align-items-center my-2">
                                                            <span class="text-white">{{ $top_serial->hour }}hr : {{ $top_serial->min }}mins</span>
                                                        </div>
                                                        <div class="hover-buttons">
                                                            <a href="{{ route('serial.show', ['slug' => $top_serial->slug]) }}"
                                                               role="button"
                                                               class="btn btn-hover"><i
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
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('movies') . '/' . $top_serial->slug }}"
                                                                               class="share-ico">
                                                                                <i class="ri-facebook-fill"></i>
                                                                            </a>
                                                                            <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('movies') . '/' . $top_serial->slug }}"
                                                                               class="share-ico">
                                                                                <i class="ri-twitter-fill"></i>
                                                                            </a>
                                                                            <a href="https://pinterest.com/pin/create/button/?url={{ url('movies') . '/' . $top_serial->slug }}"
                                                                               class="share-ico">
                                                                                <i class="ri-pinterest-fill"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @if( in_array($top_serial->id, $like_exists) )
                                                                    <li class="delete_like"
                                                                        data-id="{{ $top_serial->id }}">
                                                            <span style="color: #FFF; background-color: #E50914 ">
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                                    </li>
                                                                @else
                                                                    <li class="add_like"
                                                                        data-id="{{ $top_serial->id }}">
                                                            <span>
                                                                <i class="ri-heart-fill"></i>
                                                            </span>
                                                                    </li>
                                                                @endif
                                                                @if( in_array($top_serial->id, $playlist_exists) )
                                                                    {{-- Here Will Be Delete --}}
                                                                    <li class="delete_playlist"
                                                                        data-id="{{ $top_serial->id }}">
                                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                                    <i class="fa fa-check"></i>
                                                                </span>
                                                                    </li>
                                                                @else
                                                                    {{-- Here Will Be Add --}}
                                                                    <li class="add_playlist"
                                                                        data-id="{{ $top_serial->id }}">
                                                            <span href="#">
                                                                <i class="ri-add-line"></i>
                                                            </span>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    @endauth
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="slider-next btn-verticle">
                                    <i class="ri-arrow-down-s-line vertical-aerrow"></i>
                                </div>
                            </div>
                            <div class="slider-images" data-swiper="slider-images">
                                <div class="swiper-container " data-swiper="slider-images-inner">
                                    <div class="swiper-wrapper ">
                                        <div class="swiper-slide">
                                            <div class="slider--image block-images"><img
                                                    src="{{ asset('storage') . '/' . $top_serial->image }}"
                                                    loading="lazy" alt=""/></div>
                                            <div class="description">
                                                <div class="block-description">
                                                    <h6 class="iq-title">
                                                        <a href="{{ route('serial.show', ['slug' => $top_serial->slug]) }}">
                                                            {{ $top_serial->name }}
                                                        </a>
                                                    </h6>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        <span class="text-white">{{ $top_serial->hour }}hr : {{  $top_serial->min }}mins</span>
                                                    </div>
                                                    <div class="hover-buttons">
                                                        <a href="{{ route('serial.show', ['slug' => $top_serial->slug]) }}" role="button" class="btn btn-hover"><i
                                                                class="fa fa-play mr-1" aria-hidden="true"></i>
                                                            Play Now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="swiper-button-prev verticle-btn"></div>
                        <div class="swiper-button-next verticle-btn"></div>
                    </div>

                </section>
            </div>
        </div>
    @endif

    @auth
        @if( $recommended_episodes->count() > 0 )
                    <section id="iq-suggestede" class="s-margin">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 overflow-hidden">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="main-title">Recommended Serials For You</h4>
                                        <a href="{{ route('serial.index') }}" class="text-primary iq-view-all">View All</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Swiper -->
                            <div class="favourite-slider">
                                <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                                    <ul class="swiper-wrapper p-0 m-0">
                                        @foreach( $recommended_episodes as $recommended_episode )
                                            <li class="swiper-slide slide-item">
                                                <div class="block-images position-relative">
                                                    <div class="img-box">
                                                        <img src="{{ asset('storage') . '/' . $recommended_episode->image }}" class="img-fluid"
                                                             loading="lazy" alt="">
                                                    </div>
                                                    <div class="block-description">
                                                        <h6 class="iq-title">
                                                            <a href="{{ route('episode.show', ['slug' => $recommended_episode->slug]) }}">
                                                                {{ $recommended_episode->name }}
                                                            </a>
                                                        </h6>
                                                        <div class="movie-time d-flex align-items-center my-2">
                                                            <span class="text-white">{{ $recommended_episode->hour }}hr : {{ $recommended_episode->minute }}mins</span>
                                                        </div>
                                                        <div class="hover-buttons">
                                                            <a href="{{ route('episode.show', ['slug' => $recommended_episode->slug]) }}" role="button" class="btn btn-hover">
                                                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
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
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('episode') . '/' . $recommended_episode->slug }}"
                                                                               class="share-ico">
                                                                                <i class="ri-facebook-fill"></i>
                                                                            </a>
                                                                            <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('episode') . '/' . $recommended_episode->slug }}"
                                                                               class="share-ico">
                                                                                <i class="ri-twitter-fill"></i>
                                                                            </a>
                                                                            <a href="https://pinterest.com/pin/create/button/?url={{ url('episode') . '/' . $recommended_episode->slug }}"
                                                                               class="share-ico">
                                                                                <i class="ri-pinterest-fill"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @if( in_array($recommended_episode->id, $like_exists) )
                                                                    <li class="delete_like" data-id="{{ $recommended_episode->id }}">
                                                <span style="color: #FFF; background-color: #E50914 ">
                                                    <i class="ri-heart-fill"></i>
                                                </span>
                                                                    </li>
                                                                @else
                                                                    <li class="add_like" data-id="{{ $recommended_episode->id }}">
                                                <span>
                                                    <i class="ri-heart-fill"></i>
                                                </span>
                                                                    </li>
                                                                @endif
                                                                @if( in_array($recommended_episode->id, $playlist_exists) )
                                                                    {{-- Here Will Be Delete --}}
                                                                    <li class="delete_playlist" data-id="{{ $recommended_episode->id }}">
                                            <span href="#" style="background-color: #E50914; color: #fff">
                                                <i class="fa fa-check"></i>
                                            </span>
                                                                    </li>
                                                                @else
                                                                    {{-- Here Will Be Add --}}
                                                                    <li class="add_playlist" data-id="{{ $recommended_episode->id }}">
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



    <!--swiper Thumbs gallery loop -->
    @auth
        @if( $recommended_movies->count() > 0  )
            <section id="iq-tvthrillers" class="s-margin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Recommended Movies For You</h4>
                                <a href="{{ route('movie.index') }}" class="text-primary iq-view-all">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper p-0 m-0">
                                @foreach( $recommended_movies as $recommended_movie )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $recommended_movie->image }}" loading="lazy"
                                                     class="img-fluid" alt="">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('movie.show', ['slug' => $recommended_movie->slug]) }}">
                                                        {{ $recommended_movie->name }}
                                                    </a>
                                                </h6>
                                                <div class="movie-time d-flex align-items-center my-2">
                                                    <span class="text-white">{{ $recommended_movie->hour }}hr : {{ $recommended_movie->minute }}mins</span>
                                                </div>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('movie.show', ['slug' => $recommended_movie->slug]) }}" role="button" class="btn btn-hover"><i
                                                            class="fa fa-play mr-1" aria-hidden="true"></i>
                                                        Play Now
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="block-social-info">
                                                <ul class="list-inline p-0 m-0 music-play-lists">
                                                    <li class="share">
                                            <span>
                                                <i class="ri-share-fill"></i>
                                            </span>
                                                        <div class="share-box">
                                                            <div class="d-flex align-items-center">
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('movie') . '/' . $recommended_movie->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-facebook-fill"></i>
                                                                </a>
                                                                <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('movie') . '/' . $recommended_movie->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-twitter-fill"></i>
                                                                </a>
                                                                <a href="https://pinterest.com/pin/create/button/?url={{ url('movie') . '/' . $recommended_movie->slug }}"
                                                                   class="share-ico">
                                                                    <i class="ri-pinterest-fill"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @if( in_array($recommended_movie->id, $like_exists) )
                                                        <li class="delete_like" data-id="{{ $recommended_movie->id }}">
                                            <span style="color: #FFF; background-color: #E50914 ">
                                                <i class="ri-heart-fill"></i>
                                            </span>
                                                        </li>
                                                    @else
                                                        <li class="add_like" data-id="{{ $recommended_movie->id }}">
                                            <span>
                                                <i class="ri-heart-fill"></i>
                                            </span>
                                                        </li>
                                                    @endif
                                                    @if( in_array($recommended_movie->id, $playlist_exists) )
                                                        {{-- Here Will Be Delete --}}
                                                        <li class="delete_playlist" data-id="{{ $recommended_movie->id }}">
                                        <span href="#" style="background-color: #E50914; color: #fff">
                                            <i class="fa fa-check"></i>
                                        </span>
                                                        </li>
                                                    @else
                                                        {{-- Here Will Be Add --}}
                                                        <li class="add_playlist" data-id="{{ $recommended_movie->id }}">
                                        <span href="#">
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
