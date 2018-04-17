<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>IoT Example for H2O</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/front.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="http://code.jquery.com/jquery.js"></script>

    <script>
        setTimeout(function() {
            $('#contactMsg').fadeOut('slow');
        }, 1500);
    </script>
    <style>
        .carousel-inner img {
            width: 35%;
            height: 35%;
        }
    </style>
</head>

    <body>
            <nav class="site-header sticky-top py-1">
                <div class="container d-flex flex-column flex-md-row justify-content-between">
                    <a class="py-2 d-none d-md-inline-block" href="/">Home</a>
                    <a class="py-2 d-none d-md-inline-block" href="/info">Info</a>
                    <a class="py-2 d-none d-md-inline-block" href="/purchase">Purchase</a>
                    <a class="py-2 d-none d-md-inline-block" href="/contact">Contact</a>

                    @if (Auth()->check())
                        <a class="py-2 d-none d-md-inline-block" href="/home">{{ Auth::user()->name }}</a>
                    @else
                        <a class="py-2 d-none d-md-inline-block" href="/register">Register</a>
                        <a class="py-2 d-none d-md-inline-block" href="/login">Login</a>
                    @endif

                </div>
            </nav>


                    @yield('content')
    </body>

