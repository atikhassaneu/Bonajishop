<header>
    <!--Default Header Area Start-->
    <div class="default-header-area header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-12">
                    <!--Logo Area Start-->
                    <div class="logo-area">
                        <a href="{{ route('home') }}"><img width="120" src="{{ asset('frontend/img/logo/logo.png') }}" alt=""></a>
                    </div>
                    <!--Logo Area End-->
                </div>
                <div class="col-lg-6 col-md-4 d-none d-lg-block col-12">
                    <!--Header Menu Area Start-->
                    <div class="header-menu-area text-center">
                        <nav>
                            <ul class="main-menu">
                                <li><a href="{{ route('home') }}">Home</a> </li>
                                <li><a href="#">Category <i class="ion-ios7-arrow-down"></i></a>
                                    <!--Mega Menu Start-->
                                    @if(count($categories))
                                        <ul class="mega-menu">
                                            @foreach($categories as $category)

                                                @if(count($category->childCategories))
                                                        <li><a href="{{ route('product.show.category', $category->slug) }}" class="item-link">{{ $category->category }}</a>
                                                            <ul>
                                                                @foreach($category->childCategories as $child)
                                                                    <li><a href="{{ route('product.show.category', $child->slug) }}">{{ $child->category }}</a></li>
                                                                @endforeach
                                                            </ul>

                                                        </li>
                                                @else
                                                    <li><a href="{{ route('product.show.category', $category->slug) }}">{{ $category->category }}</a></li>
                                                @endif


{{--                                                <li><a href="#" class="item-link">Pages</a>--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="compare.html">Compare</a></li>--}}
{{--                                                        <li><a href="cart.html">Shopping Cart</a></li>--}}
{{--                                                        <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                                        <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                                        <li><a href="my-account.html">My Account</a></li>--}}
{{--                                                        <li><a href="login-register.html">Login Register</a></li>--}}
{{--                                                        <li><a href="faq.html">Frequently Questions</a></li>--}}
{{--                                                        <li><a href="404.html">Error 404</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <li><a href="#" class="item-link">Shop Layout</a>--}}
{{--                                                    <ul>--}}
{{--                                                        <li><a href="shop.html">Shop</a></li>--}}
{{--                                                        <li><a href="shop-three-column.html">Shop Three Column</a></li>--}}
{{--                                                        <li><a href="shop-four-column.html">Shop Four Column</a></li>--}}
{{--                                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>--}}
{{--                                                        <li><a href="shop-list-nosidebar.html">Shop List No Sidebar</a></li>--}}
{{--                                                        <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>--}}
{{--                                                        <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
                                            @endforeach
                                        </ul>
                                    @endif
                                    <!--Mega Menu End-->
                                </li>
                                <li><a href="">Blog</a> </li>
                                <li><a href="">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                            </ul>
                        </nav>
                    </div>
                    <!--Header Menu Area End-->
                </div>
                <div class="col-lg-3 col-md-5 col-12">
                    <!--Header Search And Mini Cart Area Start-->
                    <div class="header-search-cart-area">
                        <ul>
                            <li><a class="sidebar-trigger-search" href="#"><span class="icon_search"></span></a></li>
{{--                            <li class="currency-menu"><a href="#"><span class="icon_lock_alt"></span></a>--}}
{{--                                <!--language dropdown-->--}}
{{--                                <ul class="currency-dropdown">--}}
{{--                                    <!--Language Currency Start-->--}}
{{--                                    <li><a href="#">language</a>--}}
{{--                                        <ul>--}}
{{--                                            <li class="active"><a href="#"><img src="img/icon/en-gb.png" alt="">English</a></li>--}}
{{--                                            <li><a href="#"><img src="img/icon/de-de.png" alt="">Bangla</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <!--Language Currency End-->--}}
{{--                                </ul>--}}
{{--                                <!--Crunccy dropdown-->--}}
{{--                            </li>--}}
                            <li class="mini-cart"><a href="#"><span class="fa fa-cart-plus"></span> <span class="cart-quantity">{{ $data['count'] }}</span> <span class="mini-cart-total">{{ $data['price'] }}</span></a>
                                <!--Mini Cart Dropdown Start-->
                                    @yield('mini-cart')
                                <!--Mini Cart Dropdown End-->
                            </li>
                        </ul>
                    </div>
                    <!--Header Search And Mini Cart Area End-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!--Mobile Menu Area Start-->
                    <div class="mobile-menu d-lg-none"></div>
                    <!--Mobile Menu Area End-->
                </div>
            </div>
        </div>
    </div>
    <!--Default Header Area End-->
</header>
