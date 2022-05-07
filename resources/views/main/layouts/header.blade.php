@php
$auth_user = Auth::user();
@endphp
<!-- Header -->
<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt=""></div>
                        +38
                        068 005 3570
                    </div>
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></div><a
                            href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
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
                        @guest
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt="">
                                </div>
                                <div><a href="{{ route('user.login') }}">Sign in /Register</a></div>
                            </div>
                        @else
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt="">
                                </div>
                                <div><a href="{{ route('user.login') }}">Profile</a></div>
                                <div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                            <i class="icon ion-power"></i>Sign Out
                                        </a>
                                    </form>
                                </div>

                            </div>
                        @endguest

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
                        <div class="logo"><a href="{{ url('/') }}">OneTech</a></div>
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
                                            @php
                                                $categories = DB::table('categories')->get();
                                            @endphp
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                @foreach ($categories as $category)
                                                    <li><a class="clc"
                                                            href="#">{{ $category->category_name }}</a></li>
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

                <!-- Wishlist and Cart-->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    {{-- Wishlist --}}
                    @php
                    if(Auth::user()){
                        $wishlist_item = DB::table('wishlists')->where('user_id',$auth_user->id)->get();
                        $wishlist_item = count($wishlist_item);
                    }
                    @endphp
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt="">
                            </div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="{{ url('user/wishlist') }}">Wishlists</a></div>
                                <div class="wishlist_count"><strong>{{$wishlist_item??0}}</strong></div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                    <div class="cart_count"><span><strong>10</strong></span></div>
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="#">Cart</a></div>
                                    <div class="cart_price"><strong>$85</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Request::path() != 'user/login')
        <!-- Main Navigation -->
        <?php
            // echo Request::path();
        ?>
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
                                        @php
                                            $subcategories = DB::table('sub_categories')
                                                ->where('category_id', $category->id)
                                                ->get();
                                            $data = '';
                                        @endphp
                                        @foreach ($subcategories as $subcat)
                                            @php
                                                $data = $subcat->subcategory_name;
                                            @endphp
                                        @endforeach
                                        <li class="hassubs">
                                            <a href="#">{{ $category->category_name }}<i
                                                    class="<?php if ($data) {
                                                        echo 'fas fa-chevron-right';
                                                    } else {
                                                        echo 'fas fa-chevron';
                                                    }
                                                    $data = ''; ?>"></i></a>
                                            <ul>
                                                @foreach ($subcategories as $subcategory)
                                                    <li class="hassubs">
                                                        <a href="#">{{ $subcategory->subcategory_name }}<i
                                                                class="fas fa-chevron"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
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
    @endif
</header>
