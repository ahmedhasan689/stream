<x-front-layout title="Categories">
    <main id="main" class="genres-main">
        @if( $categories->count() > 0 )
            <section class="iq-genres-section">
                <div class="container-fluid">
                    <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                        <h4 class="main-title">Movie Genres</h4>
                    </div>
                    <ul class=" row list-inline  mb-0 iq-rtl-direction iq_genres-contents">
                        @foreach( $categories as $category )
                            <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                <div class="block-images position-relative  watchlist-first">
                                    <div class="img-box">
                                        <img src="{{ asset('storage') . '/' . $category->image }}" class="img-fluid" loading="lazy" alt="">
                                    </div>
                                    <div class="block-description d-flex justify-content-center flex-column text-center">
                                        <h6 class="iq-title">
                                            <a href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                                {{ $category->name }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @if( $categories->count() > 8 )
                        <button class="btn btn-hover hide-me" type="button" data-toggle="collapse" data-target="#collapseExample1"
                                aria-expanded="false" aria-controls="collapseExample1">
                            <span class="genres-btn">LOAD MORE</span>
                        </button>
                    @endif
                </div>
            </section>
        @endif

        @if( $serial_categories->count() > 0 )
            <section class="iq-genres-section">
                <div class="container-fluid">
                    <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Tv-Show Genres</h4>
                    </div>
                    <ul class=" row list-inline  mb-0 iq-rtl-direction iq_genres-contents">
                        @foreach( $serial_categories as $s_category )
                            <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                <div class="block-images position-relative watchlist-first">
                                    <div class="img-box">
                                        <img src="{{ asset('storage') . '/' . $s_category->image }}" class="img-fluid" loading="lazy" alt="">
                                    </div>
                                    <div class="block-description d-flex justify-content-center flex-column text-center">
                                        <h6 class="iq-title">
                                            <a href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                                {{ $s_category->name }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @if( $serial_categories->count() > 8 )
                        <button class="btn btn-hover hide-me" type="button" data-toggle="collapse" data-target="#collapseExample2"
                                aria-expanded="false" aria-controls="collapseExample2">
                            <span class="genres-btn">LOAD MORE</span>
                        </button>
                    @endif
                    <div class="collapse" id="collapseExample2">
                        <ul class=" row list-inline  mb-0 iq-rtl-direction iq_genres-contents">
                            <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                <div class="block-images position-relative  watchlist-first">
                                    <div class="img-box">
                                        <img src="{{ asset('front_assets/images/genre/44.jpg') }}" class="img-fluid" loading="lazy" alt="">
                                    </div>
                                    <div class="block-description d-flex justify-content-center flex-column text-center">
                                        <h6 class="iq-title"><a href="#">Action</a></h6>
                                    </div>
                            </li>
                            <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                <div class="block-images position-relative">
                                    <div class="img-box">
                                        <img src="{{ asset('front_assets/images/genre/24.jpg') }}" class="img-fluid" loading="lazy" alt="">
                                    </div>
                                    <div class="block-description d-flex justify-content-center flex-column text-center">
                                        <h6 class="iq-title"><a href="#">Adventure</a></h6>
                                    </div>
                            </li>
                            <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                <div class="block-images position-relative">
                                    <div class="img-box">
                                        <img src="{{ asset('front_assets/images/genre/48.jpg') }}" class="img-fluid" loading="lazy" alt="">
                                    </div>
                                    <div class="block-description d-flex justify-content-center flex-column text-center">
                                        <h6 class="iq-title"><a href="#">Comedy</a></h6>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        @endif
    </main>
</x-front-layout>
