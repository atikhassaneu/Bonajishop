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

    <!--Checkout Area Strat-->
    <div class="checkout-area mt-5">
        <div class="container">
            <form action="{{ route('order.confirm') }}" method="post">
                <div class="row">
                        @csrf
                        <div class="col-lg-6 col-12">
                                <div class="checkbox-form">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Name <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Email</label>
                                                <input placeholder="" type="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Phone <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="phone">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input name="address" placeholder="Street address" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Post Code<span class="required">*</span></label>
                                                <input placeholder="" type="text" name="post_code">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>City<span class="required">*</span></label>
                                                <input placeholder="" type="text" name="city">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                                <label>Shipping Area <span style="color: red"><small>(Delivery charge)</small></span></label>
                                                <select name="shipping_area" class="wide delivery-charge">

                                                   @foreach($delivery_charge_items as $item)
                                                        <option data-charge="{{ $item->charge }}" value="{{ $item->slug }}">{{ $item->area }} - {{ $item->charge }} Taka</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                                <label>Payment Method</label>
                                                <select name="payment_method" class="wide payment-method">
                                                    <option value="cash on delivery">Cash on Delivery</option>
                                                    <option value="bkash">Bkash</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="checkout-form-list bkash-tr-id">
                                                <label>Bkash transaction ID  <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="bkash_tr_id">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $cart->product->title }}<strong class="product-quantity"> × {{$cart->quantity}}</strong></td>
                                                <td class="cart-product-total"><span class="amount">{{ $cart->product->discounted_price == 0 ? ($cart->product->price * $cart->quantity) : ($cart->product->discounted_price * $cart->quantity)}}</span></td>
                                            </tr>
                                        @endforeach
                                        <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">{{ $data['price'] }}</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Delivery Charge</th>
                                            <td><span class="amount delivery-charge-amount"></span></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span data-total="{{$data['price']}}" class="amount total-amount">{{ $data['price'] }}</span></strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div class="order-button-payment">
                                            <input value="Place order" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
    <!--Checkout Area End-->



@endsection

@push('js')
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endpush
