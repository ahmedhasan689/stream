<x-front-layout title="Search">
    <div class="iq-breadcrumb-one  iq-bg-over " style="background-image: url({{ asset('front_assets/images/backgroud.jpg') }});">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">
                            {{ 'Search' }}
                        </h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <main id="main" class="site-main">
        <div class="container-fluid">
            @if( $results['movies']->count() > 0 )
                <div class="row my-3">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">
                                Movies
                            </h4>
                            <a href="{{ route('movie.index') }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <ul class=" row list-inline  mb-0 iq-rtl-direction">
                    @foreach( $results['movies'] as $movie )
                        <li class="slide-item col-lg-3 mb-4">
                            <div class="block-images position-relative">
                                <div class="img-box">
                                    <img src="{{ asset('storage') . '/' . $movie->image }}" class="img-fluid" alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title">
                                        <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}">
                                            {{ $movie->name }}
                                        </a>
                                    </h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">
                                            {{ \Carbon\Carbon::parse($movie->release_year)->isoFormat('MMMM DD, YY') }}
                                        </span>
                                    </div>
                                    <div class="hover-buttons">
                                        <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}" role="button" class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                            Play Now
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if( $results['episodes']->count() > 0 )
                <div class="row my-3">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">
                                Episodes
                            </h4>
                            <a href="{{ route('serial.index') }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <ul class=" row list-inline  mb-0 iq-rtl-direction">
                    @foreach( $results['episodes'] as $episode )
                        <li class="slide-item col-lg-3 mb-4">
                            <div class="block-images position-relative">
                                <div class="img-box">
                                    <img src="{{ asset('storage') . '/' . $episode->image }}" class="img-fluid" alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title">
                                        <a href="{{ route('episode.show', ['slug' => $episode->slug]) }}">
                                            {{ $episode->name }}
                                        </a>
                                    </h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">
                                            {{ \Carbon\Carbon::parse($episode->release_year)->isoFormat('MMMM DD, YY') }}
                                        </span>
                                    </div>
                                    <div class="hover-buttons">
                                        <a href="{{ route('episode.show', ['slug' => $episode->slug]) }}" role="button" class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                            Play Now
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if( $results['serials']->count() > 0 )
                <div class="row my-3">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">
                                Serials
                            </h4>
                            <a href="{{ route('serial.index') }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <ul class=" row list-inline  mb-0 iq-rtl-direction">
                    @foreach( $results['serials'] as $serial )
                        <li class="slide-item col-lg-3 mb-4">
                            <div class="block-images position-relative">
                                <div class="img-box">
                                    <img src="{{ asset('storage') . '/' . $serial->image }}" class="img-fluid" alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title">
                                        <a href="{{ route('serial.show', ['slug' => $serial->slug]) }}">
                                            {{ $serial->name }}
                                        </a>
                                    </h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">
                                            {{ \Carbon\Carbon::parse($serial->release_year)->isoFormat('MMMM DD, YY') }}
                                        </span>
                                    </div>
                                    <div class="hover-buttons">
                                        <a href="{{ route('serial.show', ['slug' => $serial->slug]) }}" role="button" class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                            Play Now
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if( $results['seasons']->count() > 0 )
                <div class="row my-3">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title">
                                Seasons
                            </h4>
                            <a href="{{ route('serial.index') }}" class="text-primary iq-view-all">View All</a>
                        </div>
                    </div>
                </div>
                <ul class=" row list-inline  mb-0 iq-rtl-direction">
                    @foreach( $results['seasons'] as $season )
                        <li class="slide-item col-lg-3 mb-4">
                            <div class="block-images position-relative">
                                <div class="img-box">
                                    <img src="{{ asset('storage') . '/' . $season->image }}" class="img-fluid" alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title">
                                        <a href="{{ route('serial.show', ['slug' => $season->serial->slug]) }}">
                                            {{ $season->name }}
                                        </a>
                                    </h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">
                                            {{ \Carbon\Carbon::parse($season->release_year)->isoFormat('MMMM DD, YY') }}
                                        </span>
                                    </div>
                                    <div class="hover-buttons">
                                        <a href="{{ route('serial.show', ['slug' => $season->serial->slug]) }}" role="button" class="btn btn-hover"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                            Play Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </main>
</x-front-layout>
