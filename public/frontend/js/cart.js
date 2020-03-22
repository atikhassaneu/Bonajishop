update_delivery_charge_and_calculate_total_price();

$(document).off("click", ".cart").on("click", ".cart", function (event) {
    event.preventDefault();
    if($(this).attr('id') !== undefined){
        let id = $(this).attr('id');
        $.ajax({
            url: "http://127.0.0.1:8000/ajax/cart/"+id,
            cache: false,
            success: function(cart){
                add_to_cart(cart);
            },
            error: function (response){
                console.log(response.responseJSON.status);
            }
        });
    }
});
$(document).off("click", ".btn-add-to-cart").on("click", ".btn-add-to-cart", function (event) {
    event.preventDefault();
    if($(this).attr('id') !== undefined){
        let id = $(this).attr('id');
        let qty = $('#product-quantity').val();
        $.ajax({
            url: "http://127.0.0.1:8000/ajax/cart/"+id+"/"+qty,
            cache: false,
            success: function(cart){
                add_to_cart(cart);
            },
            error: function (response){
                console.log(response.responseJSON.status);
            }
        });
    }
});
function add_to_cart(cart){
    if(cart.message !== undefined && cart.message === "Cart updated"){
        $('.pq-'+cart.data.cart_id).text(cart.data.quantity+" x");
        $(".mini-cart-total").text(cart.data.total_price)
        $("#subtotel-price").text(cart.data.total_price);
        $("#total-price").text(cart.data.total_price);
    }else {
        let item;
        item = '<li class="single-cart-item" id="">';
        item += '<div class="cart-img">';
        item += '<a href=""><img src="' + cart.data.thumbnail + '" alt=""></a>';
        item += '</div>';
        item += '<div class="cart-content">';
        item += '<h5 class="product-name"><a href="">' + cart.data.title + '</a></h5>';
        item += '<span class="product-quantity pq-' + cart.data.id + '">' + cart.data.quantity + '×</span>';
        item += '<span class="product-price pp-' + cart.data.id + '">' + cart.data.unit_price + '</span>';
        item += '</div>';
        item += '<div class="cart-item-remove remove-item-from-cart" id="' + cart.data.id + '">';
        item += '<a title="Remove" href="#">';
        item += '<i class="fa fa-trash"></i>';
        item += '</a>';
        item += '</div>';
        item += '</li>';
        $('.cart-items').append(item);
        $('.mini-cart-total').text(cart.data.total_price);
        $('.cart-quantity').text(cart.data.cart_item_num);
        $('#subtotel-price').text(cart.data.total_price);
        $('#total-price').text(cart.data.total_price);
    }
}
$(document).off("click", ".remove-item-from-cart").on("click", ".remove-item-from-cart", function (event) {
    event.preventDefault();
    if($(this).attr('id') !== undefined){
        let id = $(this).attr('id');
        let element = $(this).parent();
        $.ajax({
            url: "http://127.0.0.1:8000/ajax/remove-cart/"+id,
            cache: false,
            success: function(cart){
                element.remove();
                $('.mini-cart-total').text(cart.data.total_price);
                $('.cart-quantity').text(cart.data.cart_item_num);
                $('#subtotel-price').text(cart.data.total_price);
                $('#total-price').text(cart.data.total_price);
            },
            error: function (response){
            }
        });
    }
});

$('.cart-item-quantity').on('input', function () {
    let $quantity = $(this).val();
    let unit_price = $(this).attr('data-unit-price');
    let update_price = Number($quantity) * Number(unit_price);
    $(this).parent().next().children('.amount').text(update_price);
    $('.remove_'+$(this).attr('data-id')).val(update_price);
    update_total_cart_price();
});

function update_total_cart_price() {

    let elements = $('span.cart-item-total-price');
    let price = 0;
    Array.from(elements).forEach( function (element) {
         price = price + Number(element.innerHTML);
    });
    $(".mini-cart-total").text(price);
    $("#cart-subtotel-price").text(price);
    $("#cart-total-price").text(price);

}

$(".delivery-charge").change(function () {
   update_delivery_charge_and_calculate_total_price();
});

function update_delivery_charge_and_calculate_total_price(){
    let charge = $(".delivery-charge").find(":selected").attr('data-charge');
    $(".delivery-charge-amount").text(charge);
    let total = $(".total-amount").attr('data-total');
    $(".total-amount").text(Number(total)+Number(charge));
}
$("#update_cart").click(function (e) {
    e.preventDefault();
    $.ajax({
        type:'GET',
        url:'ajax/cart-update',
        data:$('#cart_form').serialize(),
        success:function(msg){
            alert("success")
        }
    });

});

$('.payment-method').change(function () {
    let payment_method = $(this).find(":selected").val();

    if(payment_method == "bkash"){
        $('.bkash-tr-id').show();
    }else {
        $('.bkash-tr-id').hide();
    }
});

