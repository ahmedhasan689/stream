<x-front-layout title="{{ $pageTitle }}">
    <div class="iq-breadcrumb-one  iq-bg-over "
         style="background-image: url({{ asset('front_assets/images/backgroud.jpg') }});">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">
                            {{ $pageTitle }}
                        </h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Movie</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <main id="main" class="site-main">
        <div class="container-fluid">
            <ul class=" row list-inline  mb-0 iq-rtl-direction">
                @foreach( $data as $movie )
                    <li class="slide-item col-lg-3 mb-4">
                        <div class="block-images position-relative">
                            <div class="img-box">
                                <img src="{{ asset('storage') . '/' . $movie->image }}" class="img-fluid" alt=""
                                     loading="lazy">
                            </div>
                            <div class="block-description">
                                <h6 class="iq-title">
                                    <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}">
                                        {{ $movie->name }}
                                    </a>
                                </h6>
                                <div class="movie-time d-flex align-items-center my-2">
                                    @if( $pageTitle === 'Keep Watching' )
                                        @php
                                            $point = \App\Models\MoviePoint::where('movie_id', $movie->id)->where('user_id', auth()->user()->id)->first()->point;
                                        @endphp
                                        <span class="text-white">{{ round( $point, 0 ) * 100/100 }} seconds</span>
                                    @else
                                        <span class="text-white">
                                            {{ \Carbon\Carbon::parse($movie->release_year)->isoFormat('MMMM DD, YY') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="hover-buttons">
                                    <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}" role="button"
                                       class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
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
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('movies') . '/' . $movie->slug }}"
                                                   class="share-ico">
                                                    <i class="ri-facebook-fill"></i>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('movies') . '/' . $movie->slug }}"
                                                   class="share-ico">
                                                    <i class="ri-twitter-fill"></i>
                                                </a>
                                                <a href="https://pinterest.com/pin/create/button/?url={{ url('movies') . '/' . $movie->slug }}"
                                                   class="share-ico">
                                                    <i class="ri-pinterest-fill"></i>
                                                </a>
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
                                    @if( in_array($movie->id, $playlist_exists) )
                                        {{-- Here Will Be Delete --}}
                                        <li class="delete_playlist" data-id="{{ $movie->id }}">
                                            <span href="#" style="background-color: #E50914; color: #fff">
                                                <i class="fa fa-check"></i>
                                            </span>
                                        </li>
                                    @else
                                        {{-- Here Will Be Add --}}
                                        <li class="add_playlist" data-id="{{ $movie->id }}">
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
        </div>
    </main>

    @section('js')
        <script>
            $(document).on('click', '.delete_playlist', function (e) {
                e.preventDefault()

                if( !authUser ) {
                    return window.location = '/login';
                }

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

                if( !authUser ) {
                    return window.location = '/login';
                }

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

                if( !authUser ) {
                    return window.location = '/login';
                }

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

                if( !authUser ) {
                    return window.location = '/login';
                }

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
