<!doctype html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Sign Up
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
        #exampleInputGender {
            background-color: #141414;
            border: 0.063em solid #404043;
            height: 3em;
            line-height: 3em;
        }
        #exampleInputGender:focus {
            box-shadow: none;
            border: 0.063em solid var(--iq-primary);
        }

        label {
            margin-left: 10px !important;
        }

        .radius {
            border-radius: 20px !important;
        }

    </style>
</head>
<body>
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- MainContent -->
<div class="sign-in-page">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-7 col-md-12 align-self-center">
                <div class="sign-user_card" style="border-radius: 15px">
                    <div class="sign-in-page-data">

                        <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />

                        <div class="sign-in-from w-100 m-auto">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control mb-0 radius" id="exampleInputEmail23" placeholder="Enter Full Name" autocomplete="off" >
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" value="{{ old('email') }}" class="form-control mb-0 radius" name="email" id="exampleInputEmail35" placeholder="Enter email" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Gender</label>
                                        <select class="form-control mb-0 radius" name="gender" id="exampleInputGender" aria-label="Default select example">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6  mb-3">
                                        <label>Date Of Birth</label>
                                        <input type="date" class="form-control mb-0 radius dateInput" value="{{ old('date_of_birth') }}" name="date_of_birth" id="exampleInputGender" placeholder="Enter email" autocomplete="off" >
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control mb-0 radius" name="password" id="exampleInputPassword2" placeholder="Password" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control mb-0 radius" name="password_confirmation" id="exampleInputPassword3" placeholder="Password" >
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-hover my-2">Sign Up</button>

                            </form>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                            Already have an account? <a href="{{ route('login') }}" class="text-primary ml-2">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rtl-box">
    <button type="button" class="btn btn-light rtl-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">
            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
        </svg>
    </button>
    <div class="rtl-panel">
        <ul class="modes">
            <li class="dir-btn" data-mode="rtl" data-active="false"   data-value="ltr"><a href="#">LTR</a></li>
            <li class="dir-btn" data-mode="rtl" data-active="true"   data-value="rtl"><a href="#">RTL</a></li>
        </ul>
    </div>
</div>
<!-- MainContent End-->
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
<script>
    $(document).ready(function(e) {
        let now = new Date();

        let date = now.toISOString().substring(0,10);

        $('.dateInput').attr('max', date);
    });
</script>
</body>
</html>
