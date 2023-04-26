<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify your email address</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #f5f5f5;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
        }

        a {
            color: #e50914;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background-color: #e50914;
            border: 1px solid #e50914;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #d00b0f;
            border-color: #d00b0f;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('front_assets/images/logo.png') }}" alt="App logo">
    </div>

    <h1 class="text-center">Hello!</h1>

    <p>Thank you for registering with our application. Please verify your email address to access all features.</p>

    <p class="text-center">
        <a href="{{ $url }}" class="btn">Verify Email Address</a>
    </p>

    <p>If you are having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser:</p>
    <p>
        <a href="{{ $url }}">{{ $url }}</a>
    </p>

    <p>Thank you,<br>{{ 'Stream-It' }}</p>
</div>
</body>
</html>
