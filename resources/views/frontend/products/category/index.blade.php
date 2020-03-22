@extends('layouts.frontend')
@section('mini-cart')
    @include('layouts.partials.frontend.cart')
@endsection

@section('content')
    <!--Breadcrumb Area Start-->
    <div class="breadcrumb-area pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-bg">
                        <ul class="breadcrumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Shop</li>
                        </ul>
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area End-->
    <!--Shop Area Start-->
    <div class="shop-area pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--Price Filter Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Filter by price</h4>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <div class="price-slider-amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <!--Price Filter Widget End-->
                    <!--Product Category Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Categories</h4>
                        <div class="categori-checkbox">
                            <ul>
                               @foreach($categories as $category)
                                    <li><a href="{{ route('product.show.category', $category->slug) }}"><b>{{ $category->category }}</b></a></li>
                                    @if(count($category->childCategories))
                                            @foreach($category->childCategories as $child)
                                                <li style="padding-left: 10px"><a href="{{ route('product.show.category', $child->slug) }}"><span class="fa fa-angle-right"></span> {{ $child->category }} ({{ $child->products->count() }})</a></li>
                                            @endforeach
                                    @endif
                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-layout">
                        @if(count($products))
                            <!--Grid & List View Start-->
                            <div class="shop-topbar-wrapper d-md-flex justify-content-md-end align-items-right">
                                <!--Toolbar Short Area Start-->
                                <div class="toolbar-short-area d-md-flex align-items-center">
                                    <div class="toolbar-shorter ">
                                        <label>Sort By:</label>
                                        <select class="wide" style="display: none;">
                                            <option data-display="Select">Nothing</option>
                                            <option value="Name, A to Z">Name, A to Z</option>
                                            <option value="Name, Z to A">Name, Z to A</option>
                                            <option value="Price, low to high">Price, low to high</option>
                                            <option value="Price, high to low">Price, high to low</option>
                                        </select><div class="nice-select wide" tabindex="0"><span class="current">Select</span><ul class="list"><li data-value="Nothing" data-display="Select" class="option selected">Nothing</li><li data-value="Relevance" class="option">Relevance</li><li data-value="Name, A to Z" class="option">Name, A to Z</li><li data-value="Name, Z to A" class="option">Name, Z to A</li><li data-value="Price, low to high" class="option">Price, low to high</li><li data-value="Price, high to low" class="option">Price, high to low</li></ul></div>
                                    </div>
                                </div>
{{--                                <div class="">--}}
{{--                                    <p class="show-product">Showing 1–9 of 42 results</p>--}}
{{--                                </div>--}}
                                <!--Toolbar Short Area End-->
                            </div>
                            <!--Grid & List View End-->
                            <!--Shop Product Start-->
                            <div class="shop-product">
                                <div id="myTabContent-2" class="tab-content">
                                    <div id="grid" class="tab-pane fade show active">
                                        <div class="product-grid-view">
                                            <div class="row">
                                                @foreach($products as $product)
                                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6">
                                                    <!--Single Product Area Start-->
                                                    <div class="single-product-area mb-40">
                                                        <div class="product-img img-full">
                                                            <a href="single-product.html">
                                                                <img class="first-img" src="{{ asset("uploads/product/thumbnail/".$product->thumbnail) }}" alt="">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                            <div class="product-action">
                                                                <ul>
                                                                    <li id="{{ $product->id }}" class="cart"><a href=""  title="Add To Cart"><span class="fa fa-cart-plus"></span></a></li>
                                                                    <li><a href="{{ route('product.show', $product->slug) }}" title="View"><span class="fa fa-eye"></span></a></li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h4><a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a></h4>
                                                            <div class="product-price">
                                                                @if($product->discounted_price == 0)
                                                                    <span class="now-price">{{ $product->price }}</span>
                                                                @else
                                                                    <span class="now-price">{{ $product->discounted_price }}</span>
                                                                    <span class="now-price"><del> {{ $product->price }} </del></span>
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
                                    <!--Pagination Start-->
                                    <div class="product-pagination">
                                        <ul>
                                            {{ $products->links() }}
                                        </ul>
                                    </div>
                                    <!--Pagination End-->
                                </div>
                            </div>
                            <!--Shop Product End-->
                        @else
                           <div class="text-center"> {{ "No product available in this category" }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Shop Area End-->
@endsection



@push('js')
    <script src="{{asset('frontend/js/cart.js')}}"></script>
@endpush
