<x-front-layout title="{{ $category->name }}">
    <div class="iq-breadcrumb-one  iq-bg-over " style="background-image: url({{ asset('front_assets/images/about-us/01.jpg') }});">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">
                            {{ $category->name }}
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
                @foreach( $category->movies as $movie )
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
                            <div class="block-social-info">
                                <ul class="list-inline p-0 m-0 music-play-lists">
                                    <li class="share">
                                        <span><i class="ri-share-fill"></i></span>
                                        <div class="share-box">
                                            <div class="d-flex align-items-center">
                                                <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading" target="_blank" rel="noopener noreferrer" class="share-ico" tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                <a href="#" data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/" class="share-ico iq-copy-link" tabindex="0"><i class="ri-links-fill"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span><i class="ri-heart-fill"></i></span>
                                        <span class="count-box">+{{ $movie->viewer }}</span>
                                    </li>
                                    <li><span><i class="ri-add-line"></i></span></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
</x-front-layout>
