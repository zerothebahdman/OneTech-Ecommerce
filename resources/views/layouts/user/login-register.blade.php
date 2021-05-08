<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>@yield('title')</title>

    <link rel="canonical" href="pages-sign-up.html" />
    <link rel="shortcut icon" href="{{ asset('backend/img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="{{ asset('backend/css/light.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">

    @include('layouts.navigation')

    @include('sweetalert::alert')
    @yield('backend')

    <script src="{{ asset('backend/js/app.js') }}"></script>

</body>

</html>
