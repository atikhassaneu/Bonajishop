<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Bonaji shop')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!--All Css Here-->

    <!-- Elegant Icon Font CSS-->
    <link rel="stylesheet" href="{{asset('frontend/css/elegant_font.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-- Ionicons CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Plugins CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- Modernizr Js -->
    <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @stack('css')

</head>
<body>
<div class="wrapper wrapper-box">
    <!--Header Area Start-->
        @include('layouts.partials.frontend.header')
    <!--Header Area Start-->
    <!-- main-search start -->
        @include('layouts.partials.frontend.search')
    <!-- main-search End -->
        @yield('content')




    <!--Footer Area Start-->
    <footer>
        <div class="footer-container">
            <!--Footer Top Area Start-->
            <div class="footer-top-area footer-bg pt-80 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <!--Single Footer Wiedget Start-->
                            <div class="single-footer-wiedget mb-30">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="social-link">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="desc-footer">
                                    <p>Mauris interdum magna eu neque convallis, vel laoreet lectus ultrices. Mauris at ullamcorper orci. Maecenas in nulla erat.</p>
                                </div>
                                <div class="address-footer">
                                    <p class="phone"><span>+123.456.789 - +123.456.678</span></p>
                                    <p class="mail"><span>support@devitems.com</span></p>
                                </div>
                            </div>
                            <!--Single Footer Wiedget End-->
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                            <!--Single Footer Wiedget Start-->
                            <div class="single-footer-wiedget mb-30">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Wiedget End-->
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                            <!--Single Footer Wiedget Start-->
                            <div class="single-footer-wiedget mb-30">
                                <div class="footer-title">
                                    <h3>Extras</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="#">Brands</a></li>
                                    <li><a href="#">Gift Certificates</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Wiedget End-->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <!--Single Footer Wiedget Start-->
                            <div class="single-footer-wiedget mb-30">
                                <div class="footer-title">
                                    <h3>Send Newsletter</h3>
                                    <p>Sign up for our newsletter &amp; promotions</p>
                                </div>
                                <!--Newsletter Area Start-->
                                <div class="newsletter-area">
                                    <div class="newsletter-form">
                                        <!-- Newsletter Form -->
                                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="popup-subscribe-form validate" target="_blank" novalidate>
                                            <div id="mc_embed_signup_scroll">
                                                <div id="mc-form" class="mc-form subscribe-form" >
                                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" />
                                                    <button id="mc-submit">Subscribe !</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--Newsletter Area End-->
                                <div class="payment">
                                    <h3>payments</h3>
                                    <img src="img/payment/payment.png" alt="payment">
                                </div>
                            </div>
                            <!--Single Footer Wiedget End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Top Area End-->
            <!--Footer Bottom Area Start-->
            <div class="footer-bottom-area pt-30 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <!--Footer Copyright Start-->
                            <div class="footer-copyright">
                                <p>Copyright &copy; <a href="#">Indecor.</a> All Rights Reserved</p>
                            </div>
                            <!--Footer Copyright End-->
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="custom-link-footer">
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Customer Services</a></li>
                                    <li><a href="#">Term & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Bottom Area End-->
        </div>
    </footer>
    <!--Footer Area End-->



<!--All Js Here-->

<!--Jquery 1.12.4-->
<script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!--Popper-->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<!--Bootstrap-->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!--Plugins-->
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<!--Main Js-->
<script src="{{ asset('frontend/js/main.js') }}"></script>

@stack('js')
</body>
</html>
