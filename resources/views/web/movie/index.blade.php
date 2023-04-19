<x-front-layout title="Movies">
    <!-- Slider Start -->
    @if( $latest_movies->count() > 0 )
        <section class="banner-container">
            <div class="movie-banner tvshows-slider">
                <div class="swiper-banner-container iq-rtl-direction" data-swiper="banner-detail-slider">
                    <div class="swiper-wrapper">
                        @foreach( $latest_movies as $l_movie )
                            <div class="swiper-slide movie-banner-1 swiper-bg" style="background-image: url('{{ asset('storage') . '/' . $l_movie->image }}')">
                                <div class="shows-content h-100">
                                    <div class="row align-items-center h-100">
                                        <div class="col-lg-7 col-md-12">
                                            <h1 class="slider-text big-title title text-uppercase"
                                                data-animation-in="fadeInLeft"
                                                data-delay-in="0.6">
                                                {{ $l_movie->name }}
                                            </h1>
                                            <div class="flex-wrap align-items-center fadeInLeft animated"
                                                 data-animation-in="fadeInLeft"
                                                 style="opacity: 1;">
                                                <div class="slider-ratting d-flex align-items-center ">
                                                    <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                        @for($i = 1; $i <= $l_movie->evaluation; $i++ )
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        @endfor

                                                    </ul>
                                                    <span class="text-white ml-3">{{ $l_movie->evaluation }}(lmdb)</span>
                                                </div>
                                                <div class="d-flex align-items-center movie-banner-time">
                                                    <span class="badge badge-secondary p-2">PG</span>
                                                    <span class="mx-2 mx-md-3"><i
                                                            class="ri-checkbox-blank-circle-fill"></i></span>
                                                    <span class="trending-time"> {{ $l_movie->hour }}hr : {{ $l_movie->minute }}mins</span>
                                                    <span class="mx-2 mx-md-3"><i
                                                            class="ri-checkbox-blank-circle-fill"></i></span>
                                                    <span class="trending-year">
                                                    {{ \Carbon\Carbon::parse($l_movie->release_year)->isoFormat('MMM YY') }}
                                                </span>
                                                </div>
                                                <p class="movie-banner-text" data-animation-in="fadeInUp" data-delay-in="1.2">
                                                    {{ $l_movie->describe }}
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp"
                                                 data-delay-in="1.2">
                                                <a href="{{ route('movie.show', ['slug' => $l_movie->slug]) }}" class="btn btn-hover iq-button">
                                                    <i class="fa fa-play mr-2" aria-hidden="true"></i>
                                                    Play Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-12 trailor-video iq-slider d-none d-lg-block">
                                            <a href="{{ $l_movie->trailer }}" class="video-open playbtn" tabindex="0">
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
                                                <span class="w-trailor text-uppercase">Watch Trailer</span>
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
    <!-- MainContent -->
    <div class="main-content data">
        @include('web.movie.content')
    </div>

    @section('js')
{{--        <script>--}}
{{--            $(document).on('click', '.delete_playlist', function(e) {--}}
{{--                e.preventDefault()--}}

{{--                var id = $(this).data('id')--}}

{{--                $.ajax({--}}
{{--                    url: "{{ route('movie_playlist.delete') }}",--}}
{{--                    type: "GET",--}}
{{--                    data: {--}}
{{--                        id: id,--}}
{{--                    },--}}
{{--                    success: function(data){--}}
{{--                        $.ajax({--}}
{{--                            url: "{{ route('movie.index') }}"--}}
{{--                        }).done(function(data) {--}}
{{--                            $('.data').html(data);--}}
{{--                        })--}}
{{--                    },--}}
{{--                    error: function(data){--}}

{{--                    },--}}
{{--                });--}}
{{--            });--}}

{{--            $(document).on('click', '.add_playlist', function(e) {--}}
{{--                e.preventDefault()--}}

{{--                var id = $(this).data('id')--}}

{{--                $.ajax({--}}
{{--                    url: "{{ route('movie_playlist.store') }}",--}}
{{--                    type: "GET",--}}
{{--                    data: {--}}
{{--                        movie_id: id,--}}
{{--                    },--}}
{{--                    success: function(data){--}}
{{--                        $.ajax({--}}
{{--                            url: "{{ route('movie.index') }}"--}}
{{--                        }).done(function(data) {--}}
{{--                            $('.data').html(data);--}}
{{--                        })--}}
{{--                    },--}}
{{--                    error: function(data){--}}

{{--                    },--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
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
