{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-3">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

    <!doctype html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Sign In
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front_assets/images/favicon.ico') }}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}"/>
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/typography.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}"/>
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/responsive.css') }}"/>

    <style>
        label {
            margin-left: 10px !important;
        }

        input {
            border-radius: 20px !important;
        }
    </style>
</head>
<body>
<!-- loader Start -->
<!-- <div id="loading">
   <div id="loading-center">
   </div>
</div> -->
<!-- loader END -->
<!-- MainContent -->
<section class="sign-in-page">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-5 col-md-12 align-self-center">
                <div class="sign-user_card" style="border-radius: 15px;">
                    <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                            <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />

                            <h3 class="mb-3 text-center">Sign in</h3>
                            <form class="mt-4" action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password">
                                </div>

                                <div class="sign-info">
                                    <button type="submit" class="btn btn-hover">Sign in</button>
                                    <div class="custom-control custom-checkbox d-inline-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label ml-3" for="customCheck">Remember Me</label>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-2">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="reset-password.html" class="f-link">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MainContent End-->
<div class="rtl-box">
    <button type="button" class="btn btn-light rtl-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">
            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
        </svg>
    </button>
    <div class="rtl-panel">
        <ul class="modes">
            <li class="dir-btn"  data-mode="rtl" data-active="false" data-value="ltr"><a href="#">LTR</a></li>
            <li class="dir-btn" data-mode="rtl" data-active="true"   data-value="rtl"><a href="#">RTL</a></li>
        </ul>
    </div>
</div>
<!-- back-to-top End -->
<!-- jQuery, Popper JS -->
<script src="{{ asset('front_assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('front_assets/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
<!-- owl carousel Js -->
<script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
<!-- select2 Js -->
<script src="{{ asset('front_assets/js/select2.min.js') }}"></script>
<!-- Magnific Popup-->
<script src="{{ asset('front_assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Custom JS-->
<script src="{{ asset('front_assets/js/custom.js') }}"></script>
<!-- rtl -->
<script src="{{ asset('front_assets/js/rtl.js') }}"></script>
</body>
</html>
