<x-front-layout title="Watch List">
    <!-- MainContent -->
    <div class="iq-breadcrumb-one  iq-bg-over " style="background-image: url({{ asset('front_assets/images/backgroud.jpg') }});">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">Watch List</h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">
                                Watch List
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <main id="main" class="site-main watchlist-contens">
        @if( $movies->count() > 0 )
            <div class="container-fluid">
                <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                    <h4 class="main-title">Movie Genres</h4>
                </div>
                <ul class=" row list-inline  mb-0 iq-rtl-direction ">
                    @foreach( $movies as $movie )
                        <li class="slide-item col-lg-3 col-md-4 col-6 mb-4">
                            <div class="block-images position-relative  watchlist-first">
                                <div class="img-box">
                                    <img src="{{ asset('storage') . '/' . $movie->image }}" class="img-fluid" alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title text-left">
                                        <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}">
                                            {{ $movie->name }}
                                        </a>
                                    </h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">{{ $movie->hour }}hr : {{ $movie->minute }}mins</span>
                                    </div>
                                    <div class="hover-buttons text-left">
                                        <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}" role="button" class="btn btn-hover">
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
                                        @if( in_array($movie->id, $like_exists) )
                                            <li class="delete_like" data-id="{{ $movie->id }}">
                                                    <span style="color: #FFF; background-color: #E50914 ">
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                            </li>
                                        @else
                                            <li class="add_like" data-id="{{ $movie->id }}">
                                                    <span>
                                                        <i class="ri-heart-fill"></i>
                                                    </span>
                                            </li>
                                        @endif
                                        @if( in_array($movie->id, $playlist_exists ) )
                                            <li class="delete_playlist" data-id="{{ $movie->id }}">
                                                    <span href="#" style="background-color: #E50914; color: #fff">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                            </li>
                                        @else
                                            <li class="add_playlist" data-id="{{ $movie->id }}">
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
                @if( $movies->count() > 8 )
                    <button class="btn btn-hover hide-me" type="button" data-toggle="collapse" data-target="#collapseExample3"
                            aria-expanded="false" aria-controls="collapseExample3">
                        <span class="genres-btn">LOAD MORE</span>
                    </button>
                @endif
            </div>
        @endif
        @if( $episodes->count() > 0 )
            <div class="container-fluid">
                <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                    <h4 class="main-title">Episode Genres</h4>
                </div>
                <ul class=" row list-inline  mb-0 iq-rtl-direction ">
                    @foreach( $episodes as $episode )
                        <li class="slide-item col-lg-3 col-md-4 col-6 mb-4">
                            <div class="block-images position-relative  watchlist-first">
                                <div class="img-box">
                                    <img src="{{ asset('storage') . '/' . $episode->image }}" class="img-fluid" alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title text-left">
                                        <a href="{{ route('episode.show', ['slug', $episode->slug]) }}">{{ $episode->name }}</a></h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">{{ $episode->hour }}hr : {{ $episode->minute }}mins</span>
                                    </div>
                                    <div class="hover-buttons text-left">
                                        <a href="{{ route('episode.show', ['slug', $episode->slug]) }}" role="button" class="btn btn-hover">
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
                                        @if( in_array($episode->id, $episode_like_exists) )
                                            <li class="episode_delete_like" data-id="{{ $episode->id }}">
                                                <span style="color: #FFF; background-color: #E50914 ">
                                                    <i class="ri-heart-fill"></i>
                                                </span>
                                            </li>
                                        @else
                                            <li class="episode_add_like" data-id="{{ $episode->id }}">
                                                <span>
                                                    <i class="ri-heart-fill"></i>
                                                </span>
                                            </li>
                                       @endif

                                        @if( in_array($episode->id, $episode_playlist_exists ) )
                                            <li class="episode_delete_playlist" data-id="{{ $episode->id }}">
                                                <span href="#" style="background-color: #E50914; color: #fff">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </li>
                                        @else
                                            <li class="episode_add_playlist" data-id="{{ $episode->id }}">
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
                @if( $episodes->count() > 8 )
                    <button class="btn btn-hover hide-me" type="button" data-toggle="collapse" data-target="#collapseExample3"
                            aria-expanded="false" aria-controls="collapseExample3">
                        <span class="genres-btn">LOAD MORE</span>
                    </button>
                @endif
            </div>
        @endif
    </main>

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

        <script>
            $(document).on('click', '.episode_delete_playlist', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $(this).empty();
                $(this).addClass('episode_add_playlist');
                $(this).removeClass('episode_delete_playlist');
                $(this).append(`
                <span href="#">
                    <i class="ri-add-line"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('episode_playlist.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        //
                    },
                    error: function (data) {

                    },
                });
            });

            $(document).on('click', '.episode_add_playlist', function (e) {
                e.preventDefault()

                var id = $(this).data('id')

                console.log(id);

                $(this).empty();
                $(this).addClass('episode_delete_playlist');
                $(this).removeClass('episode_add_playlist');
                $(this).append(`
                    <span href="#" style="background-color: #E50914; color: #fff">
                        <i class="fa fa-check"></i>
                    </span>
                `)

                $.ajax({
                    url: "{{ route('episode_playlist.store') }}",
                    type: "GET",
                    data: {
                        episode_id: id,
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

            $(document).on('click', '.episode_delete_like', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $(this).empty();
                $(this).addClass('episode_add_like');
                $(this).removeClass('episode_delete_like');
                $(this).append(`
                <span>
                    <i class="ri-heart-fill"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('episode_like.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function (data) {

                    }
                })
            });

            $(document).on('click', '.episode_add_like', function (e) {
                e.preventDefault()

                var id = $(this).data('id');

                $(this).empty();
                $(this).addClass('episode_delete_like');
                $(this).removeClass('episode_add_like');
                $(this).append(`
                <span style="color: #FFF; background-color: #E50914 ">
                    <i class="ri-heart-fill"></i>
                </span>
            `)

                $.ajax({
                    url: "{{ route('episode_like.store') }}",
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
