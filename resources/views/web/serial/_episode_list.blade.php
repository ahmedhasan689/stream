@foreach( $season->episodes as $episode )
    <div class="e-item col-lg-3 col-sm-12 col-md-6">
        <div class="block-image position-relative">
            <a href="{{ route('episode.show', ['slug' => $episode->slug]) }}">
                <img src="{{ asset('storage') . '/' . $episode->image }}" class="img-fluid img-zoom" alt="" loading="lazy">
            </a>
            <div class="episode-number">S0{{ $season->number }}E0{{ $episode->episode_number }}</div>
            <div class="episode-play-info">
                <div class="episode-play">
                    <a href="{{ route('episode.show', ['slug' => $episode->slug]) }}">
                        <i class="ri-play-fill"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="epi-desc p-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <span class="text-white rel-date">
                                                        {{ \Carbon\Carbon::parse($season->serial->release_year)->isoFormat('MMMM DD, YY') }}
                                                    </span>
                <span class="text-primary run-time">{{ $episode->minute }}min</span>
            </div>
            <a href="{{ route('episode.show', ['slug' => $episode->slug]) }}">
                <h5 class="epi-name text-white mb-0">
                    {{ $episode->name }}
                </h5>
            </a>
        </div>
    </div>
@endforeach
