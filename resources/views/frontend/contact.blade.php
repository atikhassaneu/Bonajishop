@extends('layouts.frontend')
@push('css')
    <style>
        .text-18{ font-size: 18px;}
        .text-20{ font-size: 20px;}
        .text-22{ font-size: 22px;}
        .text-24{ font-size: 24px;}
    </style>

@endpush

@section('content')
    <!--Breadcrumb Area Start-->
{{--    <div class="breadcrumb-area pb-80">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="breadcrumb-bg">--}}
{{--                        <ul class="breadcrumb-menu">--}}
{{--                            <li><a href="index.html">Home</a></li>--}}
{{--                            <li>Contact Us</li>--}}
{{--                        </ul>--}}
{{--                        <h2>Contact Us</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--Breadcrumb Area End-->
    <!--Contact Us Area Start-->
    <div class="contact-us-area pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="store-information">
                        <div class="store-title">
                            <h4>Store information</h4>
                            <div class="communication-info">
                                <!--Single Communication Start-->
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="communication-text">
                                        <span>3rd Floor, Satmasjid Super Market, Mohammadpur Bus Stand, Dhaka- 1207</span>
                                    </div>
                                </div>
                                <!--Single Communication End-->
                                <!--Single Communication Start-->
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="communication-text">
                                        <span>Call us: <br><a href="tel:8001234567">(+880) 1713 615831</a></span>
                                    </div>
                                </div>
                                <!--Single Communication End-->
                                <!--Single Communication Start-->
                                <div class="single-communication">
                                    <div class="communication-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="communication-text">
                                        <span>Email us: <br><a href="mailto:demo@hastech.com">contact@bonajishop.com</a></span>
                                    </div>
                                </div>
                                <!--Single Communication End-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="content-wrapper">
                        <div class="page-content">
                            <div class="contact-form">
                                <div class="contact-form-title">
                                    <h3>Contact us</h3>
                                </div>
                                <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="name" placeholder="Full Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-style mb-20">
                                                <input name="phone" placeholder="Phone Number" type="text">
                                            </div>
                                        </div>
{{--                                        <div class="col-lg-12">--}}
{{--                                            <div class="contact-form-style mb-20">--}}
{{--                                                <input name="subject" placeholder="Subject" type="text">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <textarea name="message" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style mt-1">
                                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
                                            </div>
                                            <button class="default-btn" type="submit"><span>SEND MESSAGE</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact Us Area End-->




@endsection

@push('js')
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.getElementById('contact-form').addEventListener("submit", function (event) {
            let verified = grecaptcha.getResponse();
            if(verified.length ===0){
                event.preventDefault();
            }
        });
    </script>
@endpush
