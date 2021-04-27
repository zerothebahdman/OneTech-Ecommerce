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

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt="">
                        </div>+38 068 005 3570
                    </div>
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt="">
                        </div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                    </div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">Italian</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Japanese</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">EUR Euro</a></li>
                                        <li><a href="#">GBP British Pound</a></li>
                                        <li><a href="#">JPY Japanese Yen</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt="">
                            </div>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('dashboard') }}"
                                        class="text-sm text-gray-700 underline">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log
                                        in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{ route('welcome') }}">OneTech</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="#" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input"
                                        placeholder="Search for products...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                {{-- @foreach ($categories as $category)
                                                    <li><a class="clc" href="#">{{ $category->category_name }}</a>
                                                    </li>

                                                @endforeach --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img
                                            src="{{ asset('frontend/images/search.png') }}" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt="">
                            </div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                <div class="wishlist_count">115</div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                    <div class="cart_count"><span>10</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="#">Cart</a></div>
                                    <div class="cart_price">$85</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    @yield('backend')

    <script src="{{ asset('backend/js/app.js') }}"></script>

</body>


<!-- Mirrored from appstack.bootlab.io/pages-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Mar 2021 10:02:22 GMT -->

</html>