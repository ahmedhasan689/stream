<li class="share">
    <span><i class="ri-share-fill"></i></span>
    <div class="share-box">
        <div class="d-flex align-items-center">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('movies') . '/' . $movie->slug }}" class="share-ico">
                <i class="ri-facebook-fill"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?text=Watch+This+Movie&url={{ url('movies') . '/' . $movie->slug }}" class="share-ico">
                <i class="ri-twitter-fill"></i>
            </a>
            <a href="https://pinterest.com/pin/create/button/?url={{ url('movies') . '/' . $movie->slug }}" class="share-ico">
                <i class="ri-pinterest-fill"></i>
            </a>
        </div>
    </div>

</li>
@if( $like_exists )
    <li class="delete_like" data-id="{{ $like_exists->id }}">
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
@if( $playlist_exists ) {{-- Here Will Be Delete --}}
<li class="delete_playlist" data-id="{{ $movie->id }}">
        <span href="#" style="background-color: #E50914; color: #fff">
            <i class="fa fa-check"></i>
        </span>
</li>
@else {{-- Here Will Be Add --}}
<li class="add_playlist" data-id="{{ $movie->id }}">
    <span href="#" >
        <i class="ri-add-line"></i>
    </span>
</li>
@endif
