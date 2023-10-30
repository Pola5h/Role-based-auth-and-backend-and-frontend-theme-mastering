<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'DashBoard')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- theme meta -->
    <meta name="theme-name" content="revolve" />

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Sweet alart, Jquery, jorenvanhocht/laravel-share -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   

    <!-- CSS Style -->

    @include('frontend.body.style')

</head>

<body>
    <!-- header -->


    @yield('frontend')

    <!-- footer -->

    @include('frontend.body.footer')

    <!-- JS Scripts -->
    @include('frontend.body.scripts')

</body>

</html>