@extends('layouts.frontend.welcome')

@section('welcome')
    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->

            @include('layouts.navigation')

            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <!-- Categories Menu -->

                                <div class="cat_menu_container">
                                    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">categories</div>
                                    </div>

                                    <ul class="cat_menu">
                                        @foreach ($categories as $category)
                                            <li class="hassubs">
                                                <a href="#">
                                                    {{ $category->category_name }}
                                                    @if (!$category->sub_category->isEmpty())
                                                        <i class="fas fa-chevron-right"></i>
                                                    @endif
                                                </a>
                                                @if (!$category->sub_category->isEmpty())
                                                    <ul>
                                                        @foreach ($category->sub_category as $subCategoryItem)
                                                            <li><a href="#">{{ $subCategoryItem->sub_category_name }}<i
                                                                        class="fas fa-chevron-right"></i></a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Main Nav Menu -->

                                <div class="main_nav_menu ml-auto">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="#">Home<i class="fas fa-chevron-down"></i></a></li>
                                        <li class="hassubs">
                                            <a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li class="hassubs">
                                            <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                @forelse ($brands as $brand)
                                                    <li><a href="#">{{ $brand->brand_name }}<i
                                                                class="fas fa-chevron-down"></i></a></li>
                                                @empty
                                                    <li><a href="#">No brands<i class="fas fa-chevron-down"></i></a></li>
                                                @endforelse
                                            </ul>
                                        </li>
                                        <li class="hassubs">
                                            <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a>
                                                </li>
                                                <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="blog_single.html">Blog Post<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="regular.html">Regular Post<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner">
                                                <span></span><span></span><span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Menu -->

            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="page_menu_content">

                                <div class="page_menu_search">
                                    <form action="#">
                                        <input type="search" required="required" class="page_menu_search_input"
                                            placeholder="Search for products...">
                                    </form>
                                </div>
                                <ul class="page_menu_nav">
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="page_menu_item">
                                                <a href="{{ route('user.dashboard') }}">HI,
                                                    {{ Auth::user()->name }}<i class="fa fa-angle-down"></i></a>
                                            </li>
                                        @else
                                            <li class="page_menu_item">
                                                <a href="{{ route('login') }}">Login<i class="fa fa-angle-down"></i></a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="page_menu_item">
                                                    <a href="{{ route('register') }}">Register<i
                                                            class="fa fa-angle-down"></i></a>
                                                </li>
                                            @endif
                                        @endauth
                                    @endif
                                    <li class="page_menu_item">
                                        <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                            <li class="page_menu_item has-children">
                                                <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                <ul class="page_menu_selection">
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item"><a href="contact.html">contact<i
                                                class="fa fa-angle-down"></i></a></li>
                                </ul>

                                <div class="menu_contact">
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>
                                        +38 068 005 3570
                                    </div>
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a
                                            href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <!-- Banner -->

        <div class="banner">
            <div class="banner_background"
                style="background-image:url({{ asset('frontend/images/banner_background.jpg') }})"></div>
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="banner_product_image"><img class="rounded" style="width: 400px; height: 380px;"
                            src="{{ asset($main_slider->first_image) }}" alt="{{ $main_slider->product_name }} Image">
                    </div>
                    <div class="col-lg-5 offset-lg-4 fill_height">
                        <div class="banner_content">
                            <h1 class="banner_text">{{ $main_slider->product_name }}</h1>
                            <div class="banner_price">
                                @if ($main_slider->discount_price === null)
                                    &#8358; {{ $main_slider->product_selling_price }}
                                @else
                                    <span>&#8358; {{ $main_slider->product_selling_price }}</span>
                                    &#8358; {{ $main_slider->product_discount_price }}
                                @endif
                            </div>
                            <div class="banner_product_name">{{ $main_slider->brand['brand_name'] }} Brand</div>
                            <div class="button banner_button"><a href="#">Shop Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="characteristics">
            <div class="container">
                <div class="row">

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>

                    <!-- Char. Item -->
                    <div class="col-lg-3 col-md-6 char_col">

                        <div class="char_item d-flex flex-row align-items-center justify-content-start">
                            <div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt=""></div>
                            <div class="char_content">
                                <div class="char_title">Free Delivery</div>
                                <div class="char_subtitle">from $50</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deals of the week -->

        <div class="deals_featured">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                        <!-- Deals -->

                        <div class="deals">
                            <div class="deals_title">Deals of the Week</div>
                            <div class="deals_slider_container">

                                <!-- Deals Slider -->
                                <div class="owl-carousel owl-theme deals_slider">

                                    @foreach ($hot_deals as $hot_deal)
                                        <!-- Deals Item -->
                                        <div class="owl-item deals_item">
                                            <div class="deals_image"><img class="rounded"
                                                    src="{{ asset($hot_deal->first_image) }}"
                                                    alt="{{ $hot_deal->product_name }} OneTech Product Image">
                                            </div>
                                            <div class="deals_content">
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_category"><a
                                                            href="#">{{ $hot_deal->brand['brand_name'] }}</a>
                                                    </div>
                                                    @if ($hot_deal->discount_price !== null)
                                                        <div class="deals_item_price_a ml-auto">
                                                            &#8358; {{ $hot_deal->product_selling_price }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_name">
                                                        {{ Str::limit($hot_deal->product_name, 27) }}</div>
                                                    @if ($hot_deal->discount_price === null)
                                                        <div class="deals_item_price ml-auto">
                                                            &#8358;{{ $hot_deal->product_selling_price }}</div>
                                                    @else
                                                        <div class="deals_item_price ml-auto">
                                                            &#8358;{{ $hot_deal->product_discount_price }}</div>
                                                    @endif
                                                </div>
                                                <div class="available">
                                                    <div class="available_line d-flex flex-row justify-content-start">
                                                        <div class="available_title">Available:
                                                            <span>{{ $hot_deal->product_quantity }}</span>
                                                        </div>
                                                        <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                                    </div>
                                                    <div class="available_bar"><span style="width:17%"></span></div>
                                                </div>
                                                <div
                                                    class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                    <div class="deals_timer_title_container">
                                                        <div class="deals_timer_title">Hurry Up</div>
                                                        <div class="deals_timer_subtitle">Offer ends in:</div>
                                                    </div>
                                                    <div class="deals_timer_content ml-auto">
                                                        <div class="deals_timer_box clearfix" data-target-time="">
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                                <span>hours</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                                <span>mins</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                                <span>secs</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                            <div class="deals_slider_nav_container">
                                <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                                </div>
                                <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Featured -->
                        <div class="featured">
                            <div class="tabbed_container">
                                <div class="tabs">
                                    <ul class="clearfix">
                                        <li class="active">Featured</li>
                                        <li>Trending</li>
                                        <li>Best Rated</li>
                                    </ul>
                                    <div class="tabs_line"><span></span></div>
                                </div>

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="featured_slider slider">

                                        @foreach ($featured as $row)
                                            <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <a href="{{ route('product.details', $row->slug) }}">
                                                        <div
                                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{ asset($row->first_image) }}"
                                                                 style="width: 130px; height: 125px;" class="rounded" alt="">
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="product_price discount">
                                                                @if ($row->discount_price === null)
                                                                    &#8358;
                                                                    {{ $row->product_selling_price }}
                                                                @else
                                                                    &#8358;
                                                                    {{ $row->product_discount_price }}<span>&#8358;
                                                                    {{ $row->product_selling_price }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="product_name">
                                                                <div>
                                                                    <a href="{{ route('product.details', $row->slug) }}">
                                                                        {{ Str::limit($row->product_name, 22) }}
                                                                    </a>
                                                                </div>
                                                            </div>
{{--                                                            <div class="product_extras">--}}
{{--                                                                <button class="product_cart_button add_cart"--}}
{{--                                                                        data-id="{{ $row->id }}">--}}
{{--                                                                    Add to Cart--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
                                                            <div class="product_extras">
                                                                <button id="{{ $row->id }}" data-toggle="modal" data-target="#addToCartModal" onclick="product(this.id)" class="product_cart_button">
                                                                    Add to Cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <span class="add_wishlist" data-id="{{ $row->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </span>
                                                    <ul class="product_marks">
                                                        @if ($row->discount_price === null)
                                                            <li class="product_mark product_discount"
                                                                style="background: #0e8ce4 !important;"> New</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $row->selling_price - $row->discount_price;
                                                                    $discount = ($amount / $row->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="featured_slider_dots_cover"></div>
                                </div>

                                <!-- Product Panel -->

                                <div class="product_panel panel">
                                    <div class="featured_slider slider">

                                        @foreach ($trending as $row)
                                            <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset($row->first_image) }}"
                                                            style="width: 130px; height: 125px;" class="rounded" alt="">
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price discount">
                                                            @if ($row->discount_price === null)
                                                                &#8358;
                                                                {{ $row->product_selling_price }}
                                                            @else
                                                                &#8358;
                                                                {{ $row->product_discount_price }}<span>&#8358;
                                                                    {{ $row->product_selling_price }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="product_name">
                                                            <div>
                                                                <a href="product.html">
                                                                    {{ Str::limit($row->product_name, 22) }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            <button class="product_cart_button">Add to Cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="product_marks">
                                                        @if ($row->discount_price === null)
                                                            <li class="product_mark product_discount"
                                                                style="background: #0e8ce4 !important;"> New</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $row->selling_price - $row->discount_price;
                                                                    $discount = ($amount / $row->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="featured_slider_dots_cover"></div>
                                </div>

                                <!-- Product Panel -->

                                <div class="product_panel panel">
                                    <div class="featured_slider slider">

                                        @foreach ($best_rated as $row)
                                            <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset($row->first_image) }}"
                                                            style="width: 130px; height: 125px;" class="rounded" alt="">
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price discount">
                                                            @if ($row->discount_price === null)
                                                                &#8358;
                                                                {{ $row->product_selling_price }}
                                                            @else
                                                                &#8358;
                                                                {{ $row->product_discount_price }}<span>&#8358;
                                                                    {{ $row->product_selling_price }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="product_name">
                                                            <div>
                                                                <a href="product.html">
                                                                    {{ Str::limit($row->product_name, 22) }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            <button class="product_cart_button">Add to Cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="product_marks">
                                                        @if ($row->discount_price === null)
                                                            <li class="product_mark product_discount"
                                                                style="background: #0e8ce4 !important;"> New</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $row->selling_price - $row->discount_price;
                                                                    $discount = ($amount / $row->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="featured_slider_dots_cover"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Categories -->

        <div class="popular_categories">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="popular_categories_content">
                            <div class="popular_categories_title">Popular Categories</div>
                            <div class="popular_categories_slider_nav">
                                <div class="popular_categories_prev popular_categories_nav"><i
                                        class="fas fa-angle-left ml-auto"></i></div>
                                <div class="popular_categories_next popular_categories_nav"><i
                                        class="fas fa-angle-right ml-auto"></i></div>
                            </div>
                            <div class="popular_categories_link"><a href="#">full catalog</a></div>
                        </div>
                    </div>

                    <!-- Popular Categories Slider -->

                    <div class="col-lg-9">
                        <div class="popular_categories_slider_container">
                            <div class="owl-carousel owl-theme popular_categories_slider">

                                @foreach ($categories as $category)
                                    <!-- Popular Categories Item -->
                                    <div class="owl-item">
                                        <div
                                            class="popular_category d-flex flex-column align-items-center justify-content-center">
                                            {{-- <div class="popular_category_image"><img
                                                    src="{{ asset('frontend/images/popular_1.png') }}" alt="">
                                            </div> --}}
                                            <div class="popular_category_text">
                                                <h4>{{ $category->category_name }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->

        <div class="banner_2">
            <div class="banner_2_background"
                style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
            <div class="banner_2_container">
                <div class="banner_2_dots"></div>
                <!-- Banner 2 Slider -->

                <div class="owl-carousel owl-theme banner_2_slider">
                    @foreach ($mid_slider as $row)

                        <!-- Banner 2 Slider Item -->
                        <div class="owl-item">
                            <div class="banner_2_item">
                                <div class="container fill_height">
                                    <div class="row fill_height">
                                        <div class="col-lg-4 col-md-6 fill_height">
                                            <div class="banner_2_content">
                                                <div class="banner_2_category">
                                                    <h4>{{ $row->category->category_name }}</h4>
                                                </div>
                                                <div class="banner_2_title">{{ $row->product_name }}</div>
                                                <div class="banner_2_text">
                                                    <h4>{{ $row->brand->brand_name }}</h4>
                                                    <h3>&#8358; {{ $row->product_selling_price }}</h3>
                                                </div>
                                                <div class="rating_r rating_r_4 banner_2_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="button banner_2_button"><a href="#">Explore</a></div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8 col-md-6 fill_height">
                                            <div class="banner_2_image_container">
                                                <div class="banner_2_image"><img src="{{ asset($row->first_image) }}"
                                                        alt="{{ $row->product_name }} Image" class="rounded"
                                                        style="width: 550px; height: 450px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Hot New Arrivals -->

        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tabbed_container">
                            <div class="tabs clearfix tabs-right">
                                <div class="new_arrivals_title">Hot New Arrivals (by categories)</div>
                                <ul class="clearfix">
                                    <li class="active"></li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="z-index:1;">

                                    <!-- Product Panel -->
                                    <div class="product_panel panel active">
                                        <div class="arrivals_slider slider">

                                            @foreach ($hot_new as $row)
                                                <!-- Slider Item -->
                                                <div class="featured_slider_item">
                                                    <div class="border_active"></div>
                                                    <div
                                                        class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                        <div
                                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{ asset($row->first_image) }}"
                                                                style="width: 160px; height: 180px;" class="rounded" alt="">
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="product_price discount">
                                                                @if ($row->discount_price === null)
                                                                    &#8358;
                                                                    {{ $row->product_selling_price }}
                                                                @else
                                                                    &#8358;
                                                                    {{ $row->product_discount_price }}<span>&#8358;
                                                                        {{ $row->product_selling_price }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="product_name">
                                                                <div>
                                                                    <a href="product.html">
                                                                        {{ Str::limit($row->product_name, 22) }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product_extras">
                                                                <button class="product_cart_button">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                        <span class="add_wishlist" data-id="{{ $row->id }}">
                                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                        </span>
                                                        <ul class="product_marks">
                                                            @if ($row->discount_price === null)
                                                                <li class="product_mark product_discount"
                                                                    style="background: #0e8ce4 !important;"> New</li>
                                                            @else
                                                                <li class="product_mark product_discount">
                                                                    @php
                                                                        $amount = $row->selling_price - $row->discount_price;
                                                                        $discount = ($amount / $row->selling_price) * 100;
                                                                    @endphp
                                                                    {{ intval($discount) }}%
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                        <div class="arrivals_slider_dots_cover"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Best Sellers -->

        <div class="best_sellers">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tabbed_container">
                            <div class="tabs clearfix tabs-right">
                                <div class="new_arrivals_title">Hot Best Sellers</div>
                                <ul class="clearfix">
                                    <li class="active">Top 20</li>
                                    <li>Audio & Video</li>
                                    <li>Laptops & Computers</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <div class="bestsellers_panel panel active">

                                <!-- Best Sellers Slider -->

                                <div class="bestsellers_slider slider">

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_1.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_2.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Samsung
                                                        J730F...</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_3.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Nomi Black
                                                        White</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_4.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Samsung Charm
                                                        Gold</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_5.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Beoplay H7</a>
                                                </div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Huawei MediaPad
                                                        T3</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_1.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_2.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/images/best_3.png') }}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_4.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_5.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_6.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="bestsellers_panel panel">

                                <!-- Best Sellers Slider -->

                                <div class="bestsellers_slider slider">

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_1.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_2.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_3.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_4.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_5.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_6.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_1.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_2.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_3.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_4.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_5.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_6.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="bestsellers_panel panel">

                                <!-- Best Sellers Slider -->

                                <div class="bestsellers_slider slider">

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_1.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_2.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_3.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_4.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_5.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_6.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_1.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_2.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_3.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_4.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_5.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                    <!-- Best Sellers Item -->
                                    <div class="bestsellers_item">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img
                                                    src="{{ asset('frontend/') }}images/best_6.png" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                        4</a></div>
                                                <div class="rating_r rating_r_4 bestsellers_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="bestsellers_price discount">$225<span>$300</span></div>
                                            </div>
                                        </div>
                                        <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Adverts -->

        <div class="adverts">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 advert_col">

                        <!-- Advert Item -->

                        <div class="advert d-flex flex-row align-items-center justify-content-start">
                            <div class="advert_content">
                                <div class="advert_title"><a href="#">Trends 2018</a></div>
                                <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.
                                </div>
                            </div>
                            <div class="ml-auto">
                                <div class="advert_image"><img src="{{ asset('frontend/images/adv_1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 advert_col">

                        <!-- Advert Item -->

                        <div class="advert d-flex flex-row align-items-center justify-content-start">
                            <div class="advert_content">
                                <div class="advert_subtitle">Trends 2018</div>
                                <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                                <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                            </div>
                            <div class="ml-auto">
                                <div class="advert_image"><img src="{{ asset('frontend/images/adv_2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 advert_col">

                        <!-- Advert Item -->

                        <div class="advert d-flex flex-row align-items-center justify-content-start">
                            <div class="advert_content">
                                <div class="advert_title"><a href="#">Trends 2018</a></div>
                                <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                            </div>
                            <div class="ml-auto">
                                <div class="advert_image"><img src="{{ asset('frontend/images/adv_3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Trends -->

        <div class="trends">
            <div class="trends_background"
                style="background-image:url({{ asset('frontend/images/trends_background.jpg') }})"></div>
            <div class="trends_overlay"></div>
            <div class="container">
                <div class="row">

                    <!-- Trends Content -->
                    <div class="col-lg-3">
                        <div class="trends_container">
                            <h2 class="trends_title">Buy Two Get One FREE</h2>
                            <div class="trends_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                            </div>
                            <div class="trends_slider_nav">
                                <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                                <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Trends Slider -->
                    <div class="col-lg-9">
                        <div class="trends_slider_container">

                            <!-- Trends Slider -->

                            <div class="owl-carousel owl-theme trends_slider">

                                @foreach ($get_one_free as $row)
                                    <!-- Trends Slider Item -->
                                    <div class="owl-item">
                                        <div class="trends_item is_new">
                                            <div
                                                class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset($row->first_image) }}"
                                                    style="width: 180px; height: 200px;" class="rounded"
                                                    alt="{{ $row->product_name }} Product Image">
                                            </div>
                                            <div class="trends_content">
                                                <div class="trends_category"><a
                                                        href="#">{{ $row->category->category_name }}</a></div>
                                                <div class="trends_info clearfix">
                                                    <div class="trends_name"><a
                                                            href="product.html">{{ Str::limit($row->product_name, 24) }}</a>
                                                    </div>

                                                    <div class="product_price discount">
                                                        @if ($row->discount_price === null)
                                                            &#8358;
                                                            {{ $row->product_selling_price }}
                                                        @else
                                                            &#8358;
                                                            {{ $row->product_discount_price }}<span>&#8358;
                                                                {{ $row->product_selling_price }}</span>
                                                        @endif
                                                    </div>

                                                    <a href="" class="btn btn-primary btn-sm mt-2">
                                                        Add To Cart
                                                    </a>
                                                </div>
                                            </div>
                                            <ul class="trends_marks">
                                                @if ($row->discount_price === null)
                                                    <li class="trends_mark trends_new"
                                                        style="background: #0e8ce4 !important;"> New</li>
                                                @else
                                                    <li class="trends_mark trends_new"
                                                        style="background: #df3b3b !important;">
                                                        @php
                                                            $amount = $row->selling_price - $row->discount_price;
                                                            $discount = ($amount / $row->selling_price) * 100;
                                                        @endphp
                                                        {{ intval($discount) }}%
                                                    </li>
                                                @endif
                                            </ul>
                                            <ul class="product_marks">

                                            </ul>
                                            <span class="add_wishlist" data-id="{{ $row->id }}">
                                                <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Reviews -->

        <div class="reviews">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="reviews_title_container">
                            <h3 class="reviews_title">Latest Reviews</h3>
                            <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                        </div>

                        <div class="reviews_slider_container">

                            <!-- Reviews Slider -->
                            <div class="owl-carousel owl-theme reviews_slider">

                                <!-- Reviews Slider Item -->
                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="review_image"><img
                                                    src="{{ asset('frontend/images/review_1.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="review_content">
                                            <div class="review_name">Roberto Sanchez</div>
                                            <div class="review_rating_container">
                                                <div class="rating_r rating_r_4 review_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="review_time">2 day ago</div>
                                            </div>
                                            <div class="review_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                    fermentum laoreet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Slider Item -->
                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="review_image"><img
                                                    src="{{ asset('frontend/images/review_2.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="review_content">
                                            <div class="review_name">Brandon Flowers</div>
                                            <div class="review_rating_container">
                                                <div class="rating_r rating_r_4 review_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="review_time">2 day ago</div>
                                            </div>
                                            <div class="review_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                    fermentum laoreet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Slider Item -->
                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="review_image"><img
                                                    src="{{ asset('frontend/images/review_3.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="review_content">
                                            <div class="review_name">Emilia Clarke</div>
                                            <div class="review_rating_container">
                                                <div class="rating_r rating_r_4 review_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="review_time">2 day ago</div>
                                            </div>
                                            <div class="review_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                    fermentum laoreet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Slider Item -->
                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="review_image"><img
                                                    src="{{ asset('frontend/images/review_1.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="review_content">
                                            <div class="review_name">Roberto Sanchez</div>
                                            <div class="review_rating_container">
                                                <div class="rating_r rating_r_4 review_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="review_time">2 day ago</div>
                                            </div>
                                            <div class="review_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                    fermentum laoreet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Slider Item -->
                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="review_image"><img
                                                    src="{{ asset('frontend/images/review_2.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="review_content">
                                            <div class="review_name">Brandon Flowers</div>
                                            <div class="review_rating_container">
                                                <div class="rating_r rating_r_4 review_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="review_time">2 day ago</div>
                                            </div>
                                            <div class="review_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                    fermentum laoreet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Slider Item -->
                                <div class="owl-item">
                                    <div class="review d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="review_image"><img
                                                    src="{{ asset('frontend/images/review_3.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="review_content">
                                            <div class="review_name">Emilia Clarke</div>
                                            <div class="review_rating_container">
                                                <div class="rating_r rating_r_4 review_rating">
                                                    <i></i><i></i><i></i><i></i><i></i>
                                                </div>
                                                <div class="review_time">2 day ago</div>
                                            </div>
                                            <div class="review_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                    fermentum laoreet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="reviews_dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Viewed -->

        <div class="viewed">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Recently Viewed</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="viewed_slider_container">

                            <!-- Recently Viewed Slider -->

                            <div class="owl-carousel owl-theme viewed_slider">

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{ asset('frontend/images/view_1.jpg') }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225<span>$300</span></div>
                                            <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{ asset('frontend/images/view_2.jpg') }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$379</div>
                                            <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{ asset('frontend/images/view_3.jpg') }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225</div>
                                            <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{ asset('frontend/images/view_4.jpg') }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$379</div>
                                            <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{ asset('frontend/images/view_5.jpg') }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$225<span>$300</span></div>
                                            <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Recently Viewed Item -->
                                <div class="owl-item">
                                    <div
                                        class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{ asset('frontend/images/view_6.jpg') }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">$375</div>
                                            <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brands -->

        <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">

                            <!-- Brands Slider -->

                            <div class="owl-carousel owl-theme brands_slider">

                                @forelse ($brands as $brand)
                                    <div class="owl-item">
                                        <div class="brands_item d-flex flex-column justify-content-center">
                                            <img src="{{ $brand->brand_image }}" style="width: 70px;"
                                                alt="{{ $brand->brand_name }} Official Image">
                                        </div>
                                    </div>
                                @empty
                                    No brand :(
                                @endforelse

                            </div>

                            <!-- Brands Slider Navigation -->
                            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}" alt="">
                                </div>
                                <div class="newsletter_title">Sign up for Newsletter</div>
                                <div class="newsletter_text">
                                    <p>...and receive %20 coupon for first shopping.</p>
                                </div>
                            </div>
                            <div class="clearfix">
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Sorry But !!</strong> {{ $message }}.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                                <form action="{{ route('admin.newsletter.store') }}" method="POST"
                                    class="newsletter_form">
                                    @csrf
                                    <input type="email" name="email"
                                        class="newsletter_input @error('email')is-invalid @enderror" required
                                        placeholder="Enter your email address">
                                    <button class="newsletter_button">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>


    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="cartModalLabel">Product Quick View</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('user.insert.cart.item') }}">
                        @csrf
                        <input type="hidden" name="product" id="product"/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="" alt="" id="product_image"/>
                                    <div class="card-body">
                                        <h5 class="card-title text-center" id="product_name"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <ul class="list-group">
                                        <li class="list-group-item">Product Category: <span id="product_category"></span></li>
                                        <li class="list-group-item">Product SubCategory: <span id="product_subcategory"></span></li>
                                        <li class="list-group-item">Brand: <span id="product_brand"></span></li>
                                        <li class="list-group-item">Product Price:  <span id="product_price"></span></li>
                                        <li class="list-group-item">Product Code: <span id="product_code"></span></li>
                                        <li class="list-group-item">Product Status: <span class="badge badge-success">Available</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="qty" value="1"/>
                                </div>
                                <div class="form-group">
                                    <label for="color">Select Color</label>
                                    <select id="color" name="color" class="custom-select">

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        function product(id){
            $.ajax({
                url: "{{ url('/user/product/quick/view') }}/"+id,
                type: "GET",
                dataType: "json",
                success: function (data){
                    $('#product_name').text(data.product.product_name);
                    $('#product_image').attr('src', data.product.first_image);
                    $('#product_brand').text(data.product.brand.brand_name);
                    $('#product_category').text(data.product.category.category_name);
                    $('#product_price').text(data.product.selling_price);
                    $('#product_code').text(data.product.product_code);
                    $('#product_subcategory').text(data.product.sub_category.sub_category_name);
                    $('#product').val(data.product.id);

                    let d = $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                       $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                }

            })
        }

    </script>
@endsection
