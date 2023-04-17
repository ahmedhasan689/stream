<!doctype html>
<html lang="en-US">
<head>
    @include('components.head')
</head>
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Header -->
<header id="main-header">
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                            <div class="navbar-toggler-icon" data-toggle="collapse">
                                <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                            </div>
                        </a>
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img class="img-fluid logo" src="{{ asset('front_assets/images/logo.png') }}"
                                                                        loading="lazy"
                                                                        alt="streamit"/> </a>
                        <div class="mobile-more-menu">
                            <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                               data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-line"></i>
                            </a>
                            <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                <div class="navbar-right position-relative">

                                    <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                        <li>
                                            <a href="#" class="search-toggle">
                                                <i class="ri-search-line"></i>
                                            </a>
                                            <div class="search-box iq-search-bar">
                                                <form action="#" class="searchbox">
                                                    <div class="form-group position-relative">
                                                        <input type="text" class="text search-input font-size-12"
                                                               placeholder="type here to search..." id="searchInput">
                                                        <i class="search-link ri-search-line"></i>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                        <li class="nav-item nav-icon">
                                            <a href="#" class="search-toggle position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                                     height="22" class="noti-svg">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/>
                                                </svg>
                                                <span class="bg-danger dots"></span>
                                            </a>
                                            <div class="iq-sub-dropdown">
                                                <div class="iq-card shadow-none m-0">
                                                    <div class="iq-card-body">
                                                        <a href="#" class="iq-sub-card">
                                                            <div class="media align-items-center">
                                                                <img src="{{ asset('front_assets/images/logo.png') }}"
                                                                     class="img-fluid mr-3" loading="lazy"
                                                                     alt="streamit"/>
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 ">Boop Bitty</h6>
                                                                    <small class="font-size-12"> just now</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="iq-sub-card">
                                                            <div class="media align-items-center">
                                                                <img src="{{ asset('front_assets/images/notify/thumb-2.jpg') }}"
                                                                     class="img-fluid mr-3" loading="lazy"
                                                                     alt="streamit"/>
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 ">The Last Breath</h6>
                                                                    <small class="font-size-12">15 minutes ago</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="iq-sub-card">
                                                            <div class="media align-items-center">
                                                                <img src="{{ asset('front_assets/images/notify/thumb-3.jpg') }}"
                                                                     class="img-fluid mr-3" loading="lazy"
                                                                     alt="streamit"/>
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 ">The Hero Camp</h6>
                                                                    <small class="font-size-12">1 hour ago</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="iq-user-dropdown search-toggle d-flex align-items-center">
{{--                                                <img src="{{ asset('front_assets/images/user/user.jpg') }}"--}}
{{--                                                     class="img-fluid avatar-40 rounded-circle" loading="lazy"--}}
{{--                                                     alt="user">--}}
                                                <span>
                                                    Login
                                                </span>
                                            </a>
                                            <div class="iq-sub-dropdown iq-user-dropdown">
                                                <div class="iq-card shadow-none m-0">
                                                    <div class="iq-card-body p-0 pl-3 pr-3">
                                                        <a href="{{ route('account.index') }}"
                                                           class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-file-user-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Manage Profile</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{{ route('setting.index') }}" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-settings-4-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Settings</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{{ route('page.pricing') }}"
                                                           class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-settings-4-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Pricing Plan</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="login.html" class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-logout-circle-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0">Logout</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="menu-main-menu-container">
                                <ul id="top-menu" class="navbar-nav ml-auto">
                                    <li class="menu-item @if( Route::currentRouteName() == 'home' ) active @endif">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="menu-item @if( Route::currentRouteName() == 'movie.index' || Route::currentRouteName() == 'movie.show' ) active @endif" >
                                        <a href="{{ route('movie.index') }}">Movies</a>
                                    </li>
                                    <li class="menu-item @if( Route::currentRouteName() == 'serial.index' || Route::currentRouteName() == 'serial.show' ) active @endif">
                                        <a href="{{ route('serial.index') }}">Serials</a>
                                    </li>
                                    <li class="menu-item @if( Route::currentRouteName() == 'blog.index' ) active @endif">
                                        <a href="{{ route('blog.index') }}">
                                            Blog
                                        </a>
                                    </li>
                                    <li class="menu-item @if( Route::currentRouteName() == 'category.index' ) active @endif">
                                        <a href="{{ route('category.index') }}">
                                            Category
                                        </a>
                                    </li>
                                    <li class="menu-item @if( Route::currentRouteName() == 'page.about-us' || Route::currentRouteName() == 'page.contact-us' || Route::currentRouteName() == 'page.faq' || Route::currentRouteName() == 'page.privacy-policy' || Route::currentRouteName() == 'page.pricing' || Route::currentRouteName() == 'page.tag') active @endif">
                                        <a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="{{ route('page.about-us') }}">
                                                    About Us
                                                </a>
                                            </li>
                                            <li class="menu-item ">
                                                <a href="{{ route('page.contact-us') }}">
                                                    Contact
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('page.faq') }}">
                                                    FAQ
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('page.privacy-policy') }}">
                                                    Privacy-Policy
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('page.pricing') }}">
                                                    Pricing
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('page.tag') }}">
                                                    Tags
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="navbar-right menu-right">
                            <ul class="d-flex align-items-center list-inline m-0">
                                <li class="nav-item nav-icon">
                                    <a href="#" class="search-toggle device-search">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="search-box iq-search-bar d-search">
                                        <form action="#" class="searchbox">
                                            <div class="form-group position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                       placeholder="type here to search..." name="name" id="searchInput">
                                                <i class="search-link ri-search-line"></i>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon">
                                    <a href="#" class="search-toggle" data-toggle="search-toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                             height="22"
                                             class="noti-svg">
                                            <path fill="none" d="M0 0h24v24H0z"/>
                                            <path
                                                d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/>
                                        </svg>
                                        <span class="bg-danger dots"></span>
                                    </a>
                                    <div class="iq-sub-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body">
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <img src="{{ asset('front_assets/images/notify/thumb-1.jpg') }}" class="img-fluid mr-3"
                                                             loading="lazy"
                                                             alt="streamit"/>
                                                        <div class="media-body">
                                                            <h6 class="mb-0 ">Boot Bitty</h6>
                                                            <small class="font-size-12"> just now</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <img src="{{ asset('front_assets/images/notify/thumb-2.jpg') }}" class="img-fluid mr-3"
                                                             loading="lazy"
                                                             alt="streamit"/>
                                                        <div class="media-body">
                                                            <h6 class="mb-0 ">The Last Breath</h6>
                                                            <small class="font-size-12">15 minutes ago</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                    <div class="media align-items-center">
                                                        <img src="{{ asset('front_assets/images/notify/thumb-3.jpg') }}" class="img-fluid mr-3"
                                                             loading="lazy"
                                                             alt="streamit"/>
                                                        <div class="media-body">
                                                            <h6 class="mb-0 ">The Hero Camp</h6>
                                                            <small class="font-size-12">1 hour ago</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon">
                                    @auth
                                        <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                           data-toggle="search-toggle">
                                            <img src="{{ asset('storage') . '/' . auth()->user()->image }}" class="img-fluid avatar-40 rounded-circle"
                                                 alt="user" loading="lazy">
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                    <a href="{{ route('account.index') }}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-file-user-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Manage Profile</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('setting.index') }}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Settings</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('page.pricing') }}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Pricing Plan</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button href="login.html" class="iq-sub-card setting-dropdown" style="background-color: transparent;">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="ri-logout-circle-line text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="my-0 ">Logout</h6>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <a href="#" class="active iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                           data-toggle="search-toggle">
                                            <span>
                                                Join Us
                                            </span>
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                    <a href="{{ route('login') }}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-login-box-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Sign In</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route('register') }}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-user-add-fill text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Sign Up</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Start MainContent -->
    {{ $slot }}
<!-- End MainContent -->

<footer id="contact" class="footer-one iq-bg-dark">
    <!-- Address -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row footer-standard">
                <div class="col-lg-6">
                    <div class="widget text-left">
                        <div class="menu-footer-link-1-container">
                            <ul id="menu-footer-link-1" class="menu p-0">
                                <li id="menu-item-7314"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7314">
                                    <a href="#">Terms Of Use</a>
                                </li>
                                <li id="menu-item-7316"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                    <a href="{{ route('page.privacy-policy') }}">Privacy-Policy</a>
                                </li>
                                <li id="menu-item-701"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-701">
                                    <a href="{{ route('page.faq') }}">FAQ</a>
                                </li>
                                @auth
                                    <li id="menu-item-7118"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                        <a href="{{ route('watch_list.index') }}">Watch List</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                    <div class="widget text-left">
                        <div class="textwidget">
                            <p>
                                <small>
                                    © 2021 STREAMIT. All Rights Reserved. All videos and shows on this platform are
                                    trademarks of, and all related images and content are the property of, Streamit Inc.
                                    Duplication and copy of this is strictly prohibited. All rights reserved.
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <h6 class="footer-link-title">
                        Follow Us :
                    </h6>
                    <ul class="info-share">
                        <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="widget text-left">
                        <div class="textwidget">
                            <h6 class="footer-link-title">Streamit App</h6>
                            <div class="d-flex align-items-center">
                                <a class="app-image" href="#">
                                    <img src="{{ asset('front_assets/images/footer/01.jpg') }}" loading="lazy" alt="play-store">
                                </a><br>
                                <a class="ml-3 app-image" href="#">
                                    <img src="{{ asset('front_assets/images/footer/02.jpg') }}" loading="lazy" alt="app-store">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Address END -->
</footer>
    <div class="rtl-box">
        <button type="button" id="flip" class="btn btn-light rtl-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd"
                      d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
        <div class="rtl-panel" id="panel">
            <ul class="modes">
                <li class="dir-btn" data-mode="rtl" data-active="false" data-value="ltr"><a href="#">LTR</a></li>
                <li class="dir-btn" data-mode="rtl" data-active="true" data-value="rtl"><a href="#">RTL</a></li>
            </ul>
        </div>
    </div>
    <!-- MainContent End-->
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>
    <!-- back-to-top End -->

    @include('components.scripts')
</body>
</html>
