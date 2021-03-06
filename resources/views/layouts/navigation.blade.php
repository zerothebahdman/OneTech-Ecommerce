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
                        @if (Route::has('login'))
                            @auth
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li class="hassubs">
                                        <a href="{{ route('user.dashboard') }}" class="text-sm text-gray-700 underline">
                                            <div class="user_icon">
                                                <img src="{{ asset('frontend/images/user.svg') }}" alt="">
                                            </div>
                                            HI, {{ Auth::user()->name }}<i class="fas fa-chevron-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="#">Wishlist</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">
                                    <div class="user_icon">
                                        <img src="{{ asset('frontend/images/user.svg') }}" alt="">
                                    </div>
                                    Login
                                </a>
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
                                            @php
                                                $categories = \DB::table('categories')->get();
                                            @endphp

                                            @foreach ($categories as $category)
                                                <li><a class="clc" href="#">{{ $category->category_name }}</a>
                                                </li>

                                            @endforeach
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
                    @auth
                        @php
                            $wishlist = App\Models\Users\Wishlist::where('user_id', auth()->user()->id)
                                ->get();
                        @endphp
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt="">
                            </div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                <div class="wishlist_count">{{ count($wishlist) }}</div>
                            </div>
                        </div>
                    @endauth

                    <!-- Cart -->
                    <a href="{{ route('user.display.cart') }}">
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                    <div class="cart_count"><span>{{ Gloudemans\Shoppingcart\Facades\Cart::count() }}</span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text">
                                        Cart
                                    </div>
                                    <div class="cart_price">&#8358; {{ Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
