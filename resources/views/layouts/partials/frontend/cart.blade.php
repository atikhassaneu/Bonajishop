<div class="header-cart">
        <ul class="cart-items">
                @foreach($carts as $item)
                    <li class="single-cart-item">
                        <div class="cart-img">
                            <a href=""><img src="{{ asset('uploads/product/thumbnail/'.$item->product->thumbnail) }}" alt=""></a>
                        </div>
                        <div class="cart-content">
                            <h5 class="product-name"><a href="">{{ $item->product->title }}</a></h5>
                            <span class="product-quantity">{{ $item->quantity }} ×</span>
                            <span class="product-price">{{ $item->price }}</span>
                        </div>
                        <div class="cart-item-remove remove-item-from-cart" id="{{ $item->id }}" data-price="{{ $item->discounted_price == 0 ? $item->price : $item->discounted_price}}">
                            <a title="Remove"  href="#"><i class="fa fa-trash"></i></a>
                        </div>
                    </li>
                @endforeach
        </ul>
        <div class="cart-total">
            <h5>Subtotal :<span class="float-right" id="subtotel-price">{{ $data['price']  }}</span></h5>
            <h5>VAT (0%) : <span class="float-right">0</span></h5>
            <h5>Total : <span class="float-right" id="total-price">{{ $data['price'] }}</span></h5>
        </div>
        <div class="cart-btn">
            <a href="{{ route('cart.view') }}">View Cart</a>
            <a href="">checkout</a>
        </div>
</div>
