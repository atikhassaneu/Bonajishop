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
    <!--Shopping Cart Area Start-->
    <div class="Shopping-cart-area pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(count($carts))
                        <form id="cart_form" action="#">

                        <div class="table-content table-responsive pt-70">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="indecor-product-remove" width="10%">Action</th>
                                    <th class="indecor-product-thumbnail" width="10%">images</th>
                                    <th class="cart-product-name" width="50%">Product</th>
                                    <th class="indecor-product-price" width="10%">Unit Price</th>
                                    <th class="indecor-product-quantity" width="10%">Quantity</th>
                                    <th class="indecor-product-subtotal" width="10%">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($carts as $cart)
                                    <tr>
                                        <td class="remove-item-from-cart" id="{{$cart->id}}">
                                            <input type="hidden" name="cart[]" value="{{ $cart->id }}">
                                            <input type="hidden" class="remove_{{ $cart->id }}" name="price" value="{{ $cart->discounted_price == 0 ? $cart->price : $cart->discounted_price}}">
                                            <a class="indecor-product-remove text-18" href="#"><i class="fa fa-times"></i></a>
                                            <input type="hidden" name="product_id[]" value="{{ $cart->product->id }}">
                                        </td>
{{--                                        <td>--}}
{{--                                            <a class="indecor-product-remove  font-weight-bold text-24" id="{{ $cart->id }}"  href="#"><i class="fa fa-check"></i></a> <span class="px-3 text-24"> | </span>--}}

{{--                                        </td>--}}
                                        <td class="indecor-product-thumbnail"><a href="#"><img width="64" src="{{ asset('uploads/product/thumbnail/'.$cart->product->thumbnail) }}" alt=""></a></td>
                                        <td class="indecor-product-name"><a href="#"> {{ $cart->product->title }}</a></td>
                                        <td class="indecor-product-price"><span class="amount" id="unit-price"> {{ $cart->product->discounted_price == 0 ? $cart->product->price : $cart->product->discounted_price}} </span></td>
                                        <td class="indecor-product-quantity">
                                            <input name="cart_quantity[]" class="cart-item-quantity" data-id="{{ $cart->id }}" value="{{ $cart->quantity }}" data-unit-price="{{ $cart->product->discounted_price == 0 ? $cart->product->price : $cart->product->discounted_price}}" type="number" min="1" max="1000">
                                        </td>
                                        <td class="product-subtotal"><span class="amount cart-item-total-price">{{ $cart->product->discounted_price == 0 ? ($cart->product->price * $cart->quantity) : ($cart->product->discounted_price * $cart->quantity)}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span id="subtotel-price">{{ $data['price'] }} </span></li>
                                        <li>Total <span id="total-price">{{ $data['price'] }}</span></li>
                                    </ul>
                                    <a id="update_cart" href="#">Update Cart</a>
                                    <a href="{{ route('order') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                        {{ "No cart item available!" }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->




@endsection

@push('js')
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endpush
