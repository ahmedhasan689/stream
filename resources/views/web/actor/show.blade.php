<x-front-layout title="{{ $actor->name }}">
    <main id="main" class="site-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-12">
                    <img src="{{ asset('storage') . '/' . $actor->image }}" class="img-fluid" alt="" loading="lazy">
                    <div class="align-items-center trending-list flex-wrap">
                        <h3 class="trending-text text-capitalize mt-5 mb-3">Personal Info</h3>
                    </div>
                    <div class="person-details">
                        <div class="">
                            <h4 class="single-person__sidebar-title">Known For</h4>
                            Acting
                        </div>
                        <div class="">
                            <h4 class="single-person__sidebar-title">Known Credits</h4>
                            {{ $actor->movies_count + $actor->serials_count }}
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <h3 class="trending-text big-title text-uppercase mt-0">
                        {{ $actor->name }}
                    </h3>
                    <div class="trending-dec w-100 movie-top-space trending-info g-border">

                        <p>
                            {{ $actor->describe }}
                        </p>
                    </div>
                    @if( $actor->movies()->count() > 0 )
                        <div class="iq-main-header">
                            <h4 class="main-title">Most Movies</h4>
                        </div>
                        <!-- Swiper -->
                        <div class="favourite-slider">
                            <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction " data-swiper="common-slider">
                                <ul class="swiper-wrapper m-0 p-0">
                                    @foreach( $actor->movies as $movie )
                                        <li class="swiper-slide slide-item">
                                            <div class="block-images position-relative ">
                                                <div class="img-box">
                                                    <img src="{{ asset('storage') . '/' . $movie->image }}" class="img-fluid" alt="">
                                                </div>
                                                <div class="block-description">
                                                    <h6 class="iq-title">
                                                        <a href="{{ route('movie.show', ['slug' => $movie->slug]) }}">
                                                            {{ $movie->name }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    @endif
                    <div class="cast-details">
                        <div class="iq-main-header d-flex align-items-center justify-content-between iq-ltr-direction">
                            <h4>Acting</h4>
                        </div>
                        <ul class="trending-pills treading-heading-tab d-flex nav nav-pills align-items-center text-center m-0 mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show m-0" data-toggle="pill" href="#all" role="tab" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#movie" role="tab" aria-selected="false">Movies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#tv_show" role="tab" aria-selected="false">Tv Shows</a>
                            </li>
                        </ul>
                        <div class="tab-content cast-person-list" id="cast-person-list">
                            <div id="all" class="tab-pane fade active show streamit_cast_list" role="tabpanel" data-current-page="1" data-attibute="all" data-options="infinite_scroll">
                                <table class="credit_group animated fadeInUp">
                                    <tbody class="cast-related-list">
                                    @foreach( $actor->movies as $slider_movie )
                                        <tr class="trending-pills">
                                            <td class="image">
                                                <img src="{{ asset('storage') . '/' . $slider_movie->image }}" class="img-fluid" alt="wp-rig" loading="lazy">
                                            </td>
                                            <td class="content">
                                                <a href="{{ route('movie.show', ['slug' => $slider_movie->slug]) }}" class="text-primary">
                                                    {{ $slider_movie->name }}
                                                </a>
                                              </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @foreach( $actor->serials as $slider_serial )
                                        <tr class="trending-pills">
                                            <td class="image">
                                                <img src="{{ asset('storage') . '/' . $slider_serial->image }}" class="img-fluid" alt="wp-rig" loading="lazy">
                                            </td>
                                            <td class="content">
                                                <a href="{{ route('serial.show', ['slug' => $slider_serial->slug]) }}" class="text-primary">
                                                    {{ $slider_serial->name }}
                                                </a>
                                                <span class="ml-2 group">
                                                        as
                                                    <span class="character">
                                                         Seasons ({{ $slider_serial->seasons()->count() }} Seasons)
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="movie" class="tab-pane fade streamit_cast_list" role="tabpanel" data-attibute="movie" data-current-page="1" data-options="infinite_scroll">
                                <table class="credit_group animated fadeInUp">
                                    <tbody class="cast-related-list">
                                    @foreach( $actor->movies as $slider_movie )
                                        <tr class="trending-pills">
                                            <td class="image">
                                                <img src="{{ asset('storage') . '/' . $slider_movie->image }}" class="img-fluid" alt="wp-rig" loading="lazy">
                                            </td>
                                            <td class="content">
                                                <a href="{{ route('movie.show', ['slug' => $slider_movie->slug]) }}" class="text-primary">
                                                    {{ $slider_movie->name }}
                                                </a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="tv_show" class="tab-pane fade streamit_cast_list" role="tabpanel" data-attibute="tv_show" data-current-page="1" data-options="infinite_scroll">
                                <table class="credit_group animated fadeInUp">
                                    <tbody class="cast-related-list">
                                    @foreach( $actor->serials as $slider_serial )
                                        <tr class="trending-pills">
                                            <td class="image">
                                                <img src="{{ asset('storage') . '/' . $slider_serial->image }}" class="img-fluid" alt="wp-rig" loading="lazy">
                                            </td>
                                            <td class="content">
                                                <a href="{{ route('serial.show', ['slug' => $slider_serial->slug]) }}" class="text-primary">
                                                    {{ $slider_serial->name }}
                                                </a>
                                                <span class="ml-2 group">
                                                        as
                                                    <span class="character">
                                                         Seasons ({{ $slider_serial->seasons()->count() }} Seasons)
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-front-layout>
