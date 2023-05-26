<x-front-layout title="Categories">
    <main id="main" class="genres-main">
        @if( $categories->count() > 0 )
            <section class="iq-genres-section">
                <div class="container-fluid">
                    <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                        <h4 class="main-title">Movie Genres</h4>
                    </div>
                    <ul class=" row list-inline  mb-0 iq-rtl-direction iq_genres-contents">
                        @foreach( $categories->take(8) as $category )
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
                        <button class="btn btn-hover hide-me-movie hide-me" type="button" data-toggle="collapse" data-target="#movie" aria-expanded="false" aria-controls="collapseExample1">
                            <span class="genres-btn">LOAD MORE</span>
                        </button>
                        <div class="collapse" id="movie">
                            <ul class=" row list-inline  mb-0 iq-rtl-direction iq_genres-contents">
                                @foreach( $categories->skip(8) as $category )
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
                        </div>
                    @endif


                    <button class="btn btn-hover d-none loadLessMovie" type="button">
                        <span class="genres-btn">LOAD LESS</span>
                    </button>
                </div>
            </section>
        @endif

        @if( $serial_categories->count() > 0 )
                <section class="iq-genres-section">
                    <div class="container-fluid">
                        <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                            <h4 class="main-title">Serial Genres</h4>
                        </div>
                        <ul class="row list-inline mb-0 iq-rtl-direction iq_genres-contents">
                            @foreach($serial_categories->take(8) as $serial)
                                <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                    <div class="block-images position-relative watchlist-first">
                                        <div class="img-box">
                                            <img src="{{ asset('storage') . '/' . $serial->serial->image }}" class="img-fluid" loading="lazy" alt="">
                                        </div>
                                        <div class="block-description d-flex justify-content-center flex-column text-center">
                                            <h6 class="iq-title">
                                                <a href="{{ route('serial.show', ['slug' => $serial->serial->slug]) }}">
                                                    {{ $serial->serial->name }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @if( $serial_categories->count() > 8 )
                            <button class="btn btn-hover hide-me" type="button" data-toggle="collapse" data-target="#movie" aria-expanded="false" aria-controls="collapseExample1">
                                <span class="genres-btn">LOAD MORE</span>
                            </button>
                            <div class="collapse" id="serial">
                                <ul class=" row list-inline  mb-0 iq-rtl-direction iq_genres-contents">
                                    @foreach( $serial_categories->skip(8) as $serial )
                                        <li class="slide-item col-lg-3 col-md-4 col-sm-6">
                                            <div class="block-images position-relative  watchlist-first">
                                                <div class="img-box">
                                                    <img src="{{ asset('storage') . '/' . $serial->image }}" class="img-fluid" loading="lazy" alt="">
                                                </div>
                                                <div class="block-description d-flex justify-content-center flex-column text-center">
                                                    <h6 class="iq-title">
                                                        <a href="{{ route('serial.show', ['slug' => $serial->serial->slug]) }}">
                                                            {{ $serial->serial->name }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <button class="btn btn-hover d-none loadLess" type="button">
                            <span class="genres-btn">LOAD LESS</span>
                        </button>
                    </div>
                </section>
        @endif
    </main>

    @section('js')
        <script>
            $(document).on('click', '.hide-me-movie', function() { // Less Remove None  - Movie Remove None  - More None
                $(this).addClass('d-none')
                $('.loadLessMovie').removeClass('d-none');
                $('#movie').removeClass('d-none');
                $('#movie').css('display', 'block');
            });

            $(document).on('click', '.loadLessMovie', function() { // Less None  - Movie None  - More Remove
                $('#movie').addClass('d-none')
                $('.hide-me-movie').removeClass('d-none');
                $('.hide-me-movie').css('display', 'block');
                $('.loadLessMovie').addClass('d-none');
            });


            $(document).on('click', '.hide-me', function() { // Less Remove None  - Movie Remove None  - More None
                $(this).addClass('d-none')
                $('.loadLessMovie').removeClass('d-none');
                $('#movie').removeClass('d-none');
                $('#movie').css('display', 'block');
            });

            $(document).on('click', '.loadLessMovie', function() { // Less None  - Movie None  - More Remove
                $('#movie').addClass('d-none')
                $('.hide-me').removeClass('d-none');
                $('.hide-me').css('display', 'block');
                $('.loadLessMovie').addClass('d-none');
            });
        </script>
    @endsection
</x-front-layout>
