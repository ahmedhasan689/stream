<x-front-layout title="Tags">
    <main id="main" class="genres-main">
        @if( $tags->count() > 0 )
            <section class="iq-genres-section">
                <div class="container-fluid">
                    <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                        <h4 class="main-title">All Tags</h4>
                    </div>
                    <ul class=" row mb-0 list-inline">
                        @foreach( $tags as $tag )
                            <li class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                <a href="#">
                                    <div class="iq-tag-box watchlist-first">
                                        <span class="iq-tag ">{{ $tag->name }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @if( $tags->count() > 12 )
                        <button class="btn btn-hover hide-me" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span class="genres-btn">LOAD MORE</span>
                        </button>
                    @endif
                </div>
            </section>
        @endif
    </main>
</x-front-layout>
