<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>
    {{ $title }}
</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
<!-- swiper -->
<link rel="stylesheet" href="{{ asset('front_assets/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/swiper.css') }}">

@yield('css')
