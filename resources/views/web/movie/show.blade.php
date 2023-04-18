<x-front-layout title="{{ $movie->name }}">

    @php
        $last_played_time = session('last_played_time_' . $movie->id);
        $last_played_time = session('last_played_time_' . $movie->id ) ?? 0;
    @endphp

        <!-- Banner Start -->
    <section class="iq-main-slider site-video">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-0">
                        <video id="my-video" class="video-js vjs-big-play-centered w-100" controls preload="auto">
                            <source src="https://drive.google.com/uc?export=download&id=1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn" type="video/mp4"/>
                            <source src="https://drive.google.com/uc?export=download&id=1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn" type="video/webm"/>
                        </video>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->
    <!-- MainContent -->
    <div class="main-content movi ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-info mt-4 pt-0 pb-4">
                        <div class="row">
                            <div class="col-md-9 col-12  mb-auto">
                                <div class="d-md-flex">
                                    <h3 class="trending-text big-title text-uppercase mt-0 fadeInLeft animated"
                                        data-animation-in="fadeInLeft" data-delay-in="0.6"
                                        style="opacity: 1; animation-delay: 0.6s">
                                        {{ $movie->name  }}
                                    </h3>
                                    <div class="slider-ratting d-flex align-items-center ml-md-3 ml-0">
                                        <ul
                                            class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                            @for( $i = 1; $i <= $movie->evaluation; $i++ )
                                                <li>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </li>
                                            @endfor
                                        </ul>
                                        <span class="text-white ml-2">{{ $movie->evaluation }} (lmdb)</span>
                                    </div>
                                </div>
                                <ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-content">
                                    <li class="trending-list">
                                        <a class="text-primary title"
                                           href="{{ asset('storage') . '/' . $movie->trailer }}">Thriller</a></li>
                                </ul>
                                <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                    <span class="badge badge-secondary font-size-16">G</span>
                                    <span class="ml-3 font-Weight-500 genres-info">{{ $movie->hour }}hr : {{ $movie->minute }}mins</span>
                                    <span class="trending-year trending-year-list font-Weight-500 genres-info">
                                        {{ \Carbon\Carbon::parse($movie->release_year)->isoFormat('MMM YY') }}
                                    </span>
                                    <span
                                        class="trending-year trending-year-list single-view-count font-Weight-500 genres-info"><i
                                            class="fa fa-eye"></i>
                                        {{ $movie->user_views_count }} views
                                    </span>
                                </div>
                                <ul class="list-inline p-0 m-0 share-icons music-play-lists mb-1 icons">
                                    @include('web.movie._icons')
                                </ul>
                                <ul class="p-0 list-inline d-flex flex-wrap align-items-center mb-3 mt-4 iq_tag-list">
                                    <li class="text-primary text-lable mr-3"><i class="fa fa-tags"
                                                                                aria-hidden="true"></i>
                                        Tags:
                                    </li>
                                    @foreach( $movie->tags as $tag )
                                        <li class="trending-list mr-3">
                                            <a class="title" href="#">
                                                {{ $tag->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="trailor-video col-md-3 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
                                <a href="{{ asset('storage') . '/' . $movie->trailer }}"
                                   class="video-open playbtn block-images position-relative playbtn_thumbnail">
                                    <img width="1920" height="1080" src="{{ asset('storage') . '/' . $movie->image }}"
                                         class="attachment-medium-large size-medium-large wp-post-image" alt=""
                                         loading="lazy"
                                         sizes="(min-width: 960px) 75vw, 100vw"/>
                                    <span class="content btn btn-transparant iq-button">
                              <i class="fa fa-play mr-2"></i>
                              <span>Trailer Link</span>
                           </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="streamit-content-details trending-info g-border iq-rtl-direction">
                        <ul class="trending-pills-header d-flex nav nav-pills align-items-center text-center  mb-5 justify-content-center"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="pill" href="#dectripton-1" role="tab"
                                   aria-selected="true">Description</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div id="dectripton-1" class="tab-pane fade active show" role="tabpanel">
                                <div class="description-content">
                                    <p>
                                        {{ $movie->describe }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if( $movie->actors()->count() > 0 )
            <div id="iq-favorites" class="s-margin detail-cast-list iq-rtl-direction starring">
                <div class="container-fluid">
                    <div class="row m-0">
                        <div class="col-sm-12 overflow-hidden p-0">
                            <div class="iq-main-header d-flex align-items-center justify-content-between iq-ltr-direction">
                                <h4 class="main-title">Starring</h4>
                            </div>
                        </div>
                    </div>
                    <ul class="inner-slider list-inline row p-0  iq-ltr-direction">
                        @foreach( $movie->actors as $actor )
                            <li class=" slide-item iq-ltr-direction col-xl-3 col-lg-4 col-md-4 col-6">
                                <div class="cast-images position-relative row mx-0">
                                    <div class="col-sm-4 col-12 img-box p-0">
                                        <img src="{{ asset('storage') . '/' . $actor->image}}"
                                             class="person__poster--image img-fluid" alt="image" loading="lazy">
                                    </div>
                                    <div class="col-sm-8 col-12 block-description starring-desc ">
                                        <h6 class="iq-title">
                                            <a href="{{ route('actor.show', ['id' => $actor->id]) }}" tabindex="0">
                                                {{ $actor->name }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if( $recommended_movies->count() > 0 )
            <section class="s-margin iq-rtl-direction">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title ">Recommended</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach( $recommended_movies as $re_movie )

                                @endforeach
                                <li class="swiper-slide slide-item">
                                    <div class="block-images position-relative ">
                                        <div class="img-box">
                                            <img src="{{ asset('storage') . '/' . $re_movie->image }}" class="img-fluid"
                                                 alt="" loading="lazy">
                                        </div>
                                        <div class="block-description">
                                            <h6 class="iq-title">
                                                <a href="{{ route('movie.show', ['slug' => $re_movie->slug]) }}">
                                                    {{ $re_movie->name }}
                                                </a>
                                            </h6>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <span class="text-white">{{ $re_movie->hour }}hr : {{ $re_movie->minute }}mins</span>
                                            </div>
                                            <div class="hover-buttons">
                                                <a href="{{ route('movie.show', ['slug' => $re_movie->slug]) }}"
                                                   role="button" class="btn btn-hover"><i
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
                                                               target="_blank" rel="noopener noreferrer"
                                                               class="share-ico" tabindex="0"><i
                                                                    class="ri-facebook-fill"></i></a>
                                                            <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                               target="_blank" rel="noopener noreferrer"
                                                               class="share-ico" tabindex="0"><i
                                                                    class="ri-twitter-fill"></i></a>
                                                            <a href="#"
                                                               data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                               class="share-ico iq-copy-link" tabindex="0"><i
                                                                    class="ri-links-fill"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span><i class="ri-heart-fill"></i></span>
                                                    <span class="count-box">{{ $re_movie->user_views_count }}+</span>
                                                </li>
                                                <li><span><i class="ri-add-line"></i></span></li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if( $related_movies->count() > 0 )
            <section class="iq-rtl-direction">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Related Movies</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach( $related_movies as $r_movie )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $r_movie->image }}"
                                                     class="img-fluid" alt="" loading="lazy">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('movie.show', ['slug' => $r_movie->slug ]) }}">
                                                        {{ $r_movie->name }}
                                                    </a>
                                                </h6>
                                                <div class="movie-time d-flex align-items-center my-2">
                                                    <span class="text-white">{{ $r_movie->hour }}hr : {{ $r_movie->minute }}mins</span>
                                                </div>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('movie.show', ['slug' => $r_movie->slug ]) }}"
                                                       role="button" class="btn btn-hover"><i
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
                                                                   target="_blank" rel="noopener noreferrer"
                                                                   class="share-ico" tabindex="0"><i
                                                                        class="ri-facebook-fill"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                   target="_blank" rel="noopener noreferrer"
                                                                   class="share-ico" tabindex="0"><i
                                                                        class="ri-twitter-fill"></i></a>
                                                                <a href="#"
                                                                   data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                   class="share-ico iq-copy-link" tabindex="0"><i
                                                                        class="ri-links-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span><i class="ri-heart-fill"></i></span>
                                                        <span class="count-box">{{ $r_movie->user_views_count }}+</span>
                                                    </li>
                                                    <li><span><i class="ri-add-line"></i></span></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if( $upcoming_movies->count() > 0 )
            <section id="iq-upcoming-movie" class="iq-rtl-direction s-margin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Upcoming Movies</h4>
                                <a href="view-all.html" class="text-primary iq-view-all">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach( $upcoming_movies as $u_movie )
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('storage') . '/' . $u_movie->image }}"
                                                     class="img-fluid" alt="" loading="lazy">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title">
                                                    <a href="{{ route('movie.show', ['slug' => $u_movie->slug]) }}">
                                                        {{ $u_movie->image }}
                                                    </a>
                                                </h6>
                                                <div class="movie-time d-flex align-items-center my-2">
                                                    <span class="text-white">{{ $u_movie->hour }}hr : {{ $u_movie->minute }}mins</span>
                                                </div>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('movie.show', ['slug' => $u_movie->slug]) }}"
                                                       role="button" class="btn btn-hover"><i
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
                                                                   target="_blank" rel="noopener noreferrer"
                                                                   class="share-ico" tabindex="0"><i
                                                                        class="ri-facebook-fill"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                   target="_blank" rel="noopener noreferrer"
                                                                   class="share-ico" tabindex="0"><i
                                                                        class="ri-twitter-fill"></i></a>
                                                                <a href="#"
                                                                   data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                   class="share-ico iq-copy-link" tabindex="0"><i
                                                                        class="ri-links-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <span><i class="ri-heart-fill"></i></span>
                                                        <span class="count-box">2+</span>
                                                    </li>
                                                    <li><span><i class="ri-add-line"></i></span></li>

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
    </div>


    @section('js')
        <script>
            $(document).on('click', '.delete_playlist', function (e) {
                var id = $(this).data('id')

                $.ajax({
                    url: "{{ route('movie_playlist.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        $.ajax({
                            url: "{{ route('movie.show', ['slug' => $movie->slug]) }}"
                        }).done(function (data) {
                            $('.icons').html(data);
                        })
                    },
                    error: function (data) {

                    },
                });
            });

            $(document).on('click', '.add_playlist', function (e) {
                e.preventDefault()

                var id = $(this).data('id')

                $.ajax({
                    url: "{{ route('movie_playlist.store') }}",
                    type: "GET",
                    data: {
                        movie_id: id,
                    },
                    success: function (data) {
                        $.ajax({
                            url: "{{ route('movie.show', ['slug' => $movie->slug]) }}"
                        }).done(function (data) {
                            $('.icons').html(data);
                        })
                    },
                    error: function (data) {

                    },
                });
            });

            $(document).on('click', '.delete_like', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('movie_like.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        $.ajax({
                            url: "{{ route('movie.show', ['slug' => $movie->slug]) }}"
                        }).done(function (data) {
                            $('.icons').html(data);
                        })
                    }
                })
            });

            $(document).on('click', '.add_like', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('movie_like.store') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        $.ajax({
                            url: "{{ route('movie.show', ['slug' => $movie->slug]) }}"
                        }).done(function (data) {
                            $('.icons').html(data);
                        })
                    }
                })
            });
        </script>

        <script>

            var video = document.getElementById("my-video");

            video.addEventListener('pause', function() {
                // alert('The video is paused at ' + this.currentTime + ' seconds.');

                $.ajax({
                    method: 'POST',
                    url: '{{ route('movie.playedTime', ['id' => $movie->id]) }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'last_played_time': this.currentTime
                    },
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus);
                    }
                });
            });

            {{--$(document).ready(function() {--}}
            {{--    var video = document.getElementById("my-video");--}}
            {{--    var lastPlayedTime = {{ $last_played_time }};--}}

            {{--    if (lastPlayedTime > 0) {--}}
            {{--        video.currentTime = lastPlayedTime;--}}
            {{--    }--}}

            {{--    console.log(video.currentTime);--}}
            {{--});--}}

            {{--document.addEventListener("DOMContentLoaded", function () {--}}
            {{--    var lastPlayedTime = {{ $last_played_time }};--}}
            {{--    var player = videojs('my-video', {}, function onPlayerReady() {--}}
            {{--        var currentTime = lastPlayedTime;--}}
            {{--        var savedTime = parseFloat('{{ session('last_played_time_' . $movie->id ) }}');--}}
            {{--        if (savedTime) {--}}
            {{--            currentTime = savedTime;--}}
            {{--        }--}}

            {{--        player.on('loadedmetadata', function() {--}}
            {{--            player.currentTime(currentTime);--}}
            {{--            player.play();--}}
            {{--            player.autoplay('muted');--}}
            {{--        });--}}

            {{--        player.on('pause', function () {--}}
            {{--            console.log('Done');--}}
            {{--            var currentTime = player.currentTime();--}}

            {{--            $.ajax({--}}
            {{--                method: 'POST',--}}
            {{--                url: '{{ route('movie.playedTime', ['id' => $movie->id]) }}',--}}
            {{--                data: {--}}
            {{--                    '_token': '{{ csrf_token() }}',--}}
            {{--                    'last_played_time': currentTime--}}
            {{--                },--}}
            {{--                success: function (data) {--}}
            {{--                    console.log(data);--}}
            {{--                },--}}
            {{--                error: function (jqXHR, textStatus, errorThrown) {--}}
            {{--                    console.error(textStatus);--}}
            {{--                }--}}
            {{--            });--}}
            {{--        });--}}

            {{--    });--}}

            {{--    --}}{{--// Add a delay before playing the video to ensure all components are loaded--}}
            {{--    --}}{{--setTimeout(function(){--}}
            {{--    --}}{{--    var lastPlayedTime = {{ $last_played_time ?? 0 }};--}}
            {{--    --}}{{--    player.currentTime(lastPlayedTime);--}}
            {{--    --}}{{--    player.play();--}}
            {{--    --}}{{--}, 1000);--}}
            {{--});--}}



        </script>

    @endsection
</x-front-layout>
