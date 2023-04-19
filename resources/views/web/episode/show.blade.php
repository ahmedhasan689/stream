<x-front-layout title="{{ $episode->name }}">

    <!-- Banner Start -->
    <div class="iq-main-slider site-video">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-0">
{{--                        <iframe id="player" src="{{ $episode->link }}" class="video-js vjs-big-play-centered w-100" style="width: 1332px; height: 550px" frameborder="0"></iframe>--}}

                        <video
                            id="my-video"
                            class="video-js vjs-big-play-centered w-100"
                            controls
                            preload="auto"
                        >
                            <source src="{{ $episode->video }}" type="video/mp4" />
                            <source src="{{ $episode->video }}" type="video/webm" />

                        </video>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- MainContent -->
    <div class="main-content movi">
        <div >
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
                                            {{ $episode->season->name }}
                                        </h3>
                                        <div class="slider-ratting d-flex align-items-center ml-md-3 ml-0">
                                            <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                @for($i = 1; $i <= $episode->evaluation; $i++)
                                                    <li>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </li>
                                                @endfor
                                            </ul>
                                            <span class="text-white ml-2">{{ $episode->evaluation }} (lmdb)</span>
                                        </div>
                                    </div>
                                    <ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-content">
                                        <li class="trending-list">
                                            <a class="text-primary title" href="#">Thriller</a>
                                        </li>
                                    </ul>
                                    <div
                                        class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                        <span class="badge badge-secondary font-size-16">G</span>
                                        <span class="ml-3 font-Weight-500 genres-info">{{ $episode->hour }}hr : {{ $episode->minute }}mins</span>
                                        <span class="trending-year trending-year-list font-Weight-500 genres-info">
                                            {{ \Carbon\Carbon::parse($episode->release_year)->isoFormat('MMM YY') }}
                                       </span>
                                        <span class="trending-year trending-year-list single-view-count font-Weight-500 genres-info">
                                            <i class="fa fa-eye"></i>
                                            {{ $episode->user_views_count }} views
                                        </span>
                                    </div>
                                    <ul class="list-inline p-0 m-0 share-icons music-play-lists mb-1 icons">
                                        @include('web.episode._icons')
                                    </ul>

                                    <ul class="p-0 list-inline d-flex flex-wrap align-items-center mb-3 mt-4 iq_tag-list">
                                        <li class="text-primary text-lable mr-3"><i class="fa fa-tags" aria-hidden="true"></i>Tags:</li>
                                        @foreach( $episode->tags as $tag )
                                            <li class="trending-list mr-3">
                                                <a class="title" href="{{ route('tag.show', ['slug' => $tag->slug]) }}">
                                                    {{ $tag->name }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="trailor-video col-md-3 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
                                    <a href="{{ asset('storage') . '/' . $episode->trailer }}"
                                       class="video-open playbtn block-images position-relative playbtn_thumbnail">
                                        <img width="1920" height="1080" src="{{ asset('storage') . '/' . $episode->image }}"
                                             class="attachment-medium-large size-medium-large wp-post-image" alt="" loading="lazy"
                                        />
                                        <span class="content btn btn-transparant iq-button">
                                          <i class="fa fa-play mr-2"></i>
                                          <span>Trailer Link</span>
                                       </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="streamit-content-details trending-info g-border">
                            <ul class="trending-pills-header d-flex nav nav-pills align-items-center text-center  mb-5 justify-content-center"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="pill" href="#dectripton-1" role="tab" aria-selected="true">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="dectripton-1" class="tab-pane fade active show"
                                     role="tabpanel">
                                    <div class="description-content">
                                        <p>
                                            {{ $episode->describe }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if( $other_episodes->count() > 0 )
            <section class="iq-genres-section show-movie">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Latest Episodes</h4>
                            </div>
                        </div>
                        @foreach( $other_episodes as $o_episode )
                            <div class="e-item col-lg-3 col-6">
                                <div class="block-image position-relative">
                                    <a href="{{ route('episode.show', ['slug' => $o_episode->slug]) }}">
                                        <img src="{{ asset('storage') . '/' . $o_episode->image }}" class="img-fluid img-zoom" alt="" loading="lazy">
                                    </a>
                                    <div class="episode-number">S0{{ $o_episode->season->number }}E0{{ $o_episode->episode_number }}</div>
                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="{{ route('episode.show', ['slug' => $o_episode->slug]) }}">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-white rel-date">{{ \Carbon\Carbon::parse($episode->release_year)->isoFormat('MMM DD, YYYY') }}</span>
                                        <span class="text-primary run-time">{{ $o_episode->minute }}min</span>
                                    </div>
                                    <a href="{{ route('serial.show', ['slug' => $o_episode->season->serial->slug]) }}">
                                        <h5 class="epi-name text-white mb-0">
                                            {{ $o_episode->season->name }}
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </section>
        @endif
    </div>

    @section('js')
        <script>
            $(document).on('click', '.delete_playlist', function(e) {
                var id = $(this).data('id')

                $.ajax({
                    url: "{{ route('episode_playlist.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data){
                        $.ajax({
                            url: "{{ route('episode.show', ['slug' => $episode->slug]) }}"
                        }).done(function(data) {
                            $('.icons').html(data);
                        })
                    },
                    error: function(data){

                    },
                });
            });

            $(document).on('click', '.add_playlist', function(e) {
                e.preventDefault()

                var id = $(this).data('id')

                $.ajax({
                    url: "{{ route('episode_playlist.store') }}",
                    type: "GET",
                    data: {
                        episode_id: id,
                    },
                    success: function(data){
                        $.ajax({
                            url: "{{ route('episode.show', ['slug' => $episode->slug]) }}"
                        }).done(function(data) {
                            $('.icons').html(data);
                        })
                    },
                    error: function(data){

                    },
                });
            });

            $(document).on('click', '.delete_like', function(e) {
               e.preventDefault()

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('episode_like.delete') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $.ajax({
                            url: "{{ route('episode.show', ['slug' => $episode->slug]) }}"
                        }).done(function(data) {
                            $('.icons').html(data);
                        })
                    }
                })
            });

            $(document).on('click', '.add_like', function(e) {
                e.preventDefault()

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('episode_like.store') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $.ajax({
                            url: "{{ route('episode.show', ['slug' => $episode->slug]) }}"
                        }).done(function(data) {
                            $('.icons').html(data);
                        })
                    }
                })
            });
        </script>
        <script>
            var video = document.getElementById("my-video");


            document.getElementById('my-video').addEventListener('loadedmetadata', function() {
                this.currentTime = {{ $episode_point->point }};
            }, false);

            video.addEventListener('pause', function() {
                // alert('The video is paused at ' + this.currentTime + ' seconds.');

                $.ajax({
                    method: 'POST',
                    url: '{{ route('episode.playedTime', ['id' => $episode->id]) }}',
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
        </script>
    @endsection
</x-front-layout>
