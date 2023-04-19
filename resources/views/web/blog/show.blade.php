<x-front-layout title="{{ $blog->title }}">
    <div class="iq-breadcrumb-one  iq-bg-over iq-over-dark-50" style="background-image: url({{ asset('front_assets/images/about-us/01.jpg') }});">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">The Most Anticipated Movies</h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('category.show', ['slug' => $blog->category->slug]) }}">
                                    {{ $blog->category->name }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ $blog->title }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main container -->
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <article>
                        <div class="iq-blog-box">
                            <div class="iq-blog-image">
                                <img width="1920" height="1080" src="{{ asset('storage') . '/' . $blog->cover_image }}" loading="lazy" alt="" >
                            </div>
                            <div class="iq-blog-detail">
                                <div class="iq-blog-meta">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="iq-user">
                                                <i class="fa fa-user-o mr-1" aria-hidden="true"></i>
                                                {{ $blog->user->name }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fa fa-calendar mr-1" aria-hidden="true"></i>
                                            <span class="screen-reader-text">Posted on</span>
                                            <a href="#" rel="bookmark">
                                                <time  datetime="2019-02-02T12:46:15+00:00">
                                                    {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM DD, YY') }}
                                                </time>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-content">
                                    <p>
                                        <strong>
                                            {{ $blog->long_description }}
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="widget-area" >
                        <div id="search-2" class="widget widget_search">
                            <form method="get" class="search-form" action="#" autocomplete="off">
                                <label >
                                    <span class="input-group screen-reader-text">Search for:</span>
                                </label>
                                <input type="search" class="search-field search__input"  placeholder="Search" value="" name="s">
                                <button type="submit" class="search-submit">
                                    <i class="ri-search-line"></i>
                                    <span class="screen-reader-text">Search</span>
                                </button>
                            </form>
                        </div>
                        <div class="iq-widget-menu widget">
                            <h5 class="widget-title">Recent Post</h5>
                            <div class="list-inline iq-widget-menu">
                                <ul class="iq-post">
                                    @foreach( $recent_posts as $post)
                                        <li>
                                            <div class="post-img">
                                                <div class="post-img-holder">
                                                    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" style="background-image: url({{ asset('front_assets/images/blog/blog1.jpeg') }});"></a>
                                                </div>
                                                <div class="post-blog">
                                                    <div class="blog-box">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item  mr-3 border-0">
                                                                <a class="date-widget" href="#"><i class="fa fa-calendar mr-2" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM DD YY') }}</a>
                                                            </li>
                                                        </ul>
                                                        <a class="new-link" href="{{ route('blog.show', ['slug' => $post->slug]) }}">
                                                            <h6>
                                                                {{ $post->title }}
                                                            </h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="archives-2" class="widget widget_archive">
                            <h5 class="widget-title">Archives</h5>
                            <ul>
                                <li><a href="#">February 2019</a></li>
                                <li><a href="#">January 2019</a></li>
                            </ul>
                        </div>
                        <div id="categories-2" class="widget widget_categories">
                            <h5 class="widget-title">Categories</h5>
                            <ul>
                                @foreach( $categories as $category )
                                    <li>
                                        <a href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="tag_cloud-2" class="widget widget_tag_cloud"><h5 class="widget-title">Tags</h5><div class="tagcloud">
                                <ul class="wp-tag-cloud">
                                    @foreach( $tags as $tag )
                                        <li>
                                            <a href="{{ route('tag.show', ['slug' => $tag->slug]) }}" class="tag-cloud-link">
                                                {{ $tag->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="meta-1" class="widget widget_meta">
                            <h5 class="widget-title">Meta</h5>
                            <ul>
                                <li><a href="#">Log in</a></li>
                                <li><a href="#">Entries feed</a></li>
                                <li><a href="#">Comments feed</a></li>
                                <li><a href="#">WordPress.org</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main container end -->
</x-front-layout>
