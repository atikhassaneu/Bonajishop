@extends('layouts.frontend')
@section('mini-cart')
    @include('layouts.partials.frontend.cart')
@endsection

@section('content')

    <!--Slider Area Start-->
    <div class="slider-area">
        <div class="hero-slider owl-carousel">
            @foreach($sliders as $slider)
                <!--Single Slider Start-->
                    <div class="single-slider" style="background-image: url({{ asset('uploads/slider/'.$slider->image_path) }})">
                        <div class="hero-slider-content">
                            <h1>{{ $slider->subtitle }}</h1>
                            <h2>{{ $slider->title }}</h2>
                            <div class="slider-btn">
                                <a href="#new-arrival">Shop Now</a>
                            </div>
                        </div>
                    </div>
              <!--Single Slider End-->
            @endforeach
        </div>
    </div>
    <!--Slider Area End-->


    <!--New Product Area Start-->
    <div class="new-product-area pt-20 pb-35" id="new-arrival">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title 2 Start-->
                    <div class="section-title2">
                        <h2>New Arrivals</h2>
                    </div>
                    <!--Section Title 2 End-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="product-slider owl-carousel">
                            @foreach($newArrivalProducts as $newArrivalProduct)
                            <div class="col-md-12">
                                <!--Single Product Area Start-->
                                <div class="single-product-area mb-40">
                                    <div class="product-img img-full">
                                        <a href="">
                                            <img class="first-img" src="{{ asset('uploads/product/thumbnail/'.$newArrivalProduct->thumbnail) }}" alt="">
                                        </a>
                                        <span class="sticker">New</span>
                                        <div class="product-action">
                                            <ul>
                                                <li class="cart" id="{{ $newArrivalProduct->id }}" data-price="{{ $newArrivalProduct->discounted_price == 0 ? $newArrivalProduct->price : $newArrivalProduct->discounted_price}}" ><a href="#" title="Add To Cart"><span class="fa fa-cart-plus"></span></a></li>
                                                <li><a href="{{ route('product.show', $newArrivalProduct->slug) }}" title="View"><span class="fa fa-eye"></span></a></li>
{{--                                                <li><a href="" title="Compare this Product"><span class="icon_datareport"></span></a></li>--}}
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="product-content">
                                        <h4><a href="{{ route('product.show', $newArrivalProduct->slug) }}">{{ $newArrivalProduct-> title }}</a></h4>
                                        <div class="product-price">

                                            @if($newArrivalProduct->discounted_price == 0)
                                                <span class="now-price">{{ $newArrivalProduct->price }}</span>
                                            @else
                                                <span class="now-price">{{ $newArrivalProduct->discounted_price }}</span>
                                                <span class="now-price"><del> {{ $newArrivalProduct->price }} </del></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--Single Product Area End-->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--New Product Area End-->



    <!--Blog Area Start-->
    <div class="blog-area pt-10 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title 2 Start-->
                    <div class="section-title2">
                        <h2>from our blogs</h2>
                    </div>
                    <!--Section Title 2 End-->
                </div>
            </div>
            <div class="row">
                <div class="blog-slider owl-carousel">
                    <div class="col-md-12">
                        <!--Single Blog Start-->
                        <div class="single-blog">
                            <div class="blog-img img-full">
                                <a href="single-blog.html"><img src="{{ asset('frontend/img/blog/small/blog1.jpg') }}" alt=""><span class="icon-view"></span></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="single-blog.html">Best of Hair & Makeup New York Spring/Summer 2016</a></h3>
                                <div class="blog-meta">
                                    <p class="author-name">post by: <span>HasTech</span> - 30 Oct 2017</p>
                                </div>
                                <a class="read-btn" href="single-blog.html">read more</a>
                            </div>
                        </div>
                        <!--Single Blog End-->
                    </div>
                    <div class="col-md-12">
                        <!--Single Blog Start-->
                        <div class="single-blog">
                            <div class="blog-img img-full">
                                <a href="single-blog.html"><img src="{{ asset('frontend/img/blog/small/blog2.jpg') }}" alt=""><span class="icon-view"></span></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="single-blog.html">Dior F/W 2015 First Fashion Show in 360• Experience</a></h3>
                                <div class="blog-meta">
                                    <p class="author-name">post by: <span>HasTech</span> - 30 Oct 2017</p>
                                </div>
                                <a class="read-btn" href="single-blog.html">read more</a>
                            </div>
                        </div>
                        <!--Single Blog End-->
                    </div>
                    <div class="col-md-12">
                        <!--Single Blog Start-->
                        <div class="single-blog">
                            <div class="blog-img img-full">
                                <a href="single-blog.html"><img src="img/blog/small/blog1.jpg" alt=""><span class="icon-view"></span></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="single-blog.html">Best of Hair & Makeup New York Spring/Summer 2016</a></h3>
                                <div class="blog-meta">
                                    <p class="author-name">post by: <span>HasTech</span> - 30 Oct 2017</p>
                                </div>
                                <a class="read-btn" href="single-blog.html">read more</a>
                            </div>
                        </div>
                        <!--Single Blog End-->
                    </div>
                    <div class="col-md-12">
                        <!--Single Blog Start-->
                        <div class="single-blog">
                            <div class="blog-img img-full">
                                <a href="single-blog.html"><img src="img/blog/small/blog2.jpg" alt=""><span class="icon-view"></span></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="single-blog.html">Mercedes Benz Fashion Week – Mirror To The Soul 360</a></h3>
                                <div class="blog-meta">
                                    <p class="author-name">post by: <span>HasTech</span> - 30 Oct 2017</p>
                                </div>
                                <a class="read-btn" href="single-blog.html">read more</a>
                            </div>
                        </div>
                        <!--Single Blog End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Blog Area End-->


@endsection



@push('js')
    <script src="{{asset('frontend/js/cart.js')}}"></script>
@endpush
