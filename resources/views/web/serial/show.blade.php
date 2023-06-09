<x-front-layout title="{{ $serial->name }}">
    <!-- MainContent -->
    <div class="main-content">
        <div class="show-movie">
            <div class="container-fluid">
                <div class="banner-wrapper overlay-wrapper iq-main-slider" style="background-image: url({{ asset('storage') . '/' . $serial->image }})">
                    <div class="banner-caption">
                        <div class="movie-detail">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="trending-info p-0">
                                        <h1 class="trending-text big-title text-uppercase mt-0">
                                            {{ $serial->name }}
                                        </h1>
                                        <div class="slider-ratting d-flex align-items-center" data-animation-in="fadeInLeft">
                                            <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                @for($i = 1; $i <= $serial->evaluation; $i++)
                                                    <li>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </li>
                                                @endfor
                                            </ul>
                                            <span class="text-white ml-3">{{ $serial->evaluation }} (imdb)</span>
                                        </div>
                                        <ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-content">
                                            @foreach($serial->categories as $category)
                                                <li class="trending-list">
                                                    <a class="text-primary title" href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="d-flex flex-wrap align-items-center text-white text-detail sesson-date">
                                        <span class="">
                                           {{ $serial->seasons()->count() }} Seasons
                                        </span>
                                        <span class="trending-year">
                                            {{ \Carbon\Carbon::parse($serial->release_year)->isoFormat('MMMM YY') }}
                                        </span>
                                        </div>
                                        <div class="trending-dec">
                                            <p class="m-0">
                                                {{ $serial->describe }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                            <a href="{{ route('episode.show', ['slug' => $latest_episode->slug]) }}" class="d-flex align-items-center">
                                <div class="play-button">
                                    <i class="ri-play-fill"></i>
                                </div>
                                <h4 class="w-name text-white font-weight-700">Watch latest Episode</h4>
                            </a>
                        </div>
                    </div>
                    <div class="trailor-video  text-sm-right p-3  col-md-3 col-12">
                        <a href="{{ $serial->trailer }}" class="video-open playbtn block-images position-relative playbtn_thumbnail ">
                            <img width="1920" height="1080" src="{{ asset('storage') . '/' . $serial->image }}"
                                 class="attachment-medium-large size-medium-large wp-post-image" alt=""  loading="lazy">
                            <span class="content btn btn-transparant iq-button">
                           <i class=" mr-2"></i>
                           <span>Trailer Link</span>
                        </span>
                        </a>
                    </div>
                </div>
                <section class="show-movie-section">
                    <div class="iq-custom-select d-inline-block sea-epi">
                        <select name="season" class="form-control season-select">
                            @foreach( $serial->seasons as $single_season )
                                <option value="{{ $single_season->id }}">
                                    {{ $single_season->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="trending-custom-tab">
                        <div class="tab-title-info position-relative">
                            <ul class="trending-pills nav nav-pills text-center iq-ltr-direction" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show m-0" data-toggle="pill" href="#episodes" role="tab"
                                       aria-selected="true">Episodes</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div id="episodes" class=" tab-pane animated fadeInUp active show">
                                <div class="row episodes episodes-list list-inline p-0 mb-0 iq-rtl-direction">
                                    @include('web.serial._episode_list')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div id="iq-favorites" class="s-margin detail-cast-list iq-rtl-direction mt-0 starring">
                    <div class="row m-0">
                        <div class="col-sm-12 overflow-hidden p-0">
                            <div class="iq-main-header d-flex align-items-center justify-content-between iq-ltr-direction">
                                <h4 class="main-title">Starring</h4>
                            </div>
                            <div class="favorites-contens iq-smovie-slider">
                                <ul class="inner-slider list-inline row p-0  iq-ltr-direction">
                                    @foreach( $serial->actors as $actor )
                                        <li class=" slide-item iq-ltr-direction col-xl-3 col-lg-4 col-md-4 col-6">
                                            <div class="cast-images position-relative row mx-0">
                                                <div class="col-sm-4 col-12 img-box p-0">
                                                    <img src="{{ asset('storage') . '/' . $actor->image }}" class="person__poster--image img-fluid" alt="image" loading="lazy">
                                                </div>
                                                <div class="col-sm-8 col-12 block-description starring-desc ">
                                                    <h6 class="iq-title">
                                                        <a href="{{ route('actor.show', ['id' => $actor->id]) }}" tabindex="0">
                                                            {{ $actor->name }}
                                                        </a>
                                                    </h6>
                                                    <div class="video-time d-flex align-items-center my-2">
                                                        <span class="text-white">As James</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            $(document).on('change', '.season-select', function(e) {
                e.preventDefault();

                let id = $(this).val();

                $.ajax({
                    url: "{{ route('serial.getSeason') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data){
                        $('.episodes-list').empty();
                        $('.episodes-list').html(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })

            $(document).on('click', '.hide-me', function() {

            })

        </script>
    @endsection
</x-front-layout>
