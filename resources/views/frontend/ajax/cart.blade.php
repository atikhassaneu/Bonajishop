<li class="single-cart-item">
    <div class="cart-img">
        <a href=""><img src="{{ asset('uploads/product/thumbnail/'.$cart->product->thumbnail) }}" alt=""></a>
    </div>
    <div class="cart-content">
        <h5 class="product-name"><a href="">{{ $cart->product->title }}</a></h5>
        <span class="product-quantity">{{ $cart->quantity }} ×</span>
        <span class="product-price">{{ $cart->discounted_price == 0 ? $cart->price : $cart->discounted_price}}</span>
    </div>
    <div class="cart-item-remove remove-item-from-cart" id="{{ $cart->id }}" data-price="{{ $cart->discounted_price == 0 ? $cart->price : $cart->discounted_price}}">
        <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
    </div>
</li>
