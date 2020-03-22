@extends('layouts.frontend')
@section('mini-cart')
    @include('layouts.partials.frontend.cart')
@endsection

@section('content')
    <!--Single Product Area Start-->
    <div class="single-product-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-lg-image-1">
                            <div class="lg-image">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{ asset('uploads/product/'.$product->image->image_1st) }}">
                                        <img src="{{ asset('uploads/product/'.$product->image->image_1st) }}" alt="">
                                    </a>
                                    <a href="{{ asset('uploads/product/'.$product->image->image_1st) }}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="lg-image">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{ asset('uploads/product/'.$product->image->image_2nd) }}">
                                        <img src="{{ asset('uploads/product/'.$product->image->image_2nd) }}" alt="">
                                    </a>
                                    <a href="{{ asset('uploads/product/'.$product->image->image_2nd) }}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="lg-image">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{ asset('uploads/product/'.$product->image->image_3rd) }}">
                                        <img src="{{ asset('uploads/product/'.$product->image->image_3rd) }}" alt="">
                                    </a>
                                    <a href="{{ asset('uploads/product/'.$product->image->image_3rd) }}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="{{ asset('uploads/product/'.$product->image->image_1st) }}" alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('uploads/product/'.$product->image->image_2nd) }}" alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('uploads/product/'.$product->image->image_3rd) }}" alt="product image thumb"></div>

                        </div>
                    </div>
                    <!--Product Details Left -->
                </div>
                <div class="col-md-12 col-lg-6">
                    <!--Product Details Content Start-->
                    <div class="product-details-content">

                        <h2>{{ $product->title }}</h2>
                        <div class="single-product-price">
                            <span class="price new-price">{{ $product->discounted_price == 0 ? $product->price : $product->discounted_price  }}</span>
                            <span class="regular-price">{{ $product->discounted_price != 0 ?  $product->price : ''  }}</span>
                        </div>
                        <div class="product-description">
                            <p>{{ $product->short_description }}</p>
                        </div>
                        <div class="single-product-quantity">
                            <form class="add-quantity" action="#">
                                <div class="product-quantity">

                                    <input id="product-quantity" value="1" type="number" min="1" max="1000">
                                </div>
                                <div class="add-to-link">
                                    @if($product->stock == 0)
                                        <button class="product-btn btn btn-danger">out of stock</button>
                                    @else
                                        <button class="product-btn btn-add-to-cart" id="{{ $product->id }}" data-price="{{ $product->discounted_price == 0 ? $product->price : $product->discounted_price}}" data-text="add to cart">add to cart</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="product-meta">
                                <span class="posted-in">
                                        Category:
		                                <a href="#">{{ $product->category->category  }}</a>
                                </span>
                        </div>
                        <div class="single-product-sharing">
                            <h3>Share this product</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Product Details Content End-->
                </div>
            </div>
        </div>
    </div>
    <!--Single Product Area End-->
    <!--Product Description Review Area Start-->
    <div class="product-description-review-area pb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-review-tab">
                        <!--Review And Description Tab Content Start-->
                        <div class="tab-content product-review-content-tab" id="myTabContent-4">
                            <div class="tab-pane fade active show" id="description">
                                <div class="single-product-description">
                                    <h2>Description</h2>
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Review And Description Tab Content End-->
                </div>
            </div>
        </div>
    </div>
    <!--Product Description Review Area Start-->
    <!--Related Products Area Start-->
    @if(count($related_products))
    <div class="related-products-area pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title 2 Start-->
                    <div class="section-title2">
                        <h2>Related Products</h2>
                    </div>
                    <!--Section Title 2 End-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="product-slider owl-carousel">
                            @foreach($related_products as $product)
                            <div class="col-md-12">
                                <!--Single Product Area Start-->
                                <div class="single-product-area mb-40">
                                    <div class="product-img img-full">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            <img class="first-img" src="{{ asset('uploads/product/thumbnail/'.$product->thumbnail) }}" alt="">
                                        </a>

                                        <span class="sticker">New</span>
                                        <div class="product-action">
                                            <ul>
                                                <li class="cart" id="{{ $product->id }}" data-price="{{ $product->discounted_price == 0 ? $product->price : $product->discounted_price}}" ><a href="" title="Add To Cart"><span class="fa fa-cart-plus"></span></a></li>
                                                <li><a href="{{ route('product.show', $product->slug) }}" title="View"><span class="fa fa-eye"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a></h4>
                                        <div class="product-price">
                                            <span class="now-price">
                                                <span class="price new-price">{{ $product->discounted_price == 0 ? $product->price : $product->discounted_price  }}</span>
                                                <span class="regular-price">{{ $product->discounted_price != 0 ?  $product->price : ''  }}</span>
                                            </span>
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
    @endif
    <!--New Product Area End-->





@endsection



@push('js')
    <script src="{{asset('frontend/js/cart.js')}}"></script>
@endpush
