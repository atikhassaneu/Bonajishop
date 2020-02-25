
$(document).off("click", ".cart").on("click", ".cart", function (event) {
    event.preventDefault();
    //alert($(this).attr("id"));
    if($(this).attr('id') !== undefined){
        let id = $(this).attr('id');
        let price = $(this).attr('data-price');

        $.ajax({
            url: "ajax/cart/"+id,
            cache: false,
            success: function(data){
                $('.cart-items').append(data);
                addCartQty();
                addPrice(price);
            },
            error: function (response){
                var data = response.responseJSON;
                //alert(data['message']);
            }
        });
    }

});
$(document).off("click", ".remove-item-from-cart").on("click", ".remove-item-from-cart", function (event) {
    event.preventDefault();
    if($(this).attr('id') !== undefined){
        let id = $(this).attr('id');
        let element = $(this).parent();
        let price = $("#"+id).attr('data-price');

        $.ajax({
            url: "ajax/cart/remove/"+id,
            cache: false,
            success: function(response){
                element.remove();
                //alert(response['message'])
                removeCartQty();
                reducePrice(price);

            },
            error: function (response){
                var data = response.responseJSON;
                //alert(data['message']);
            }
        });
    }

});

function addCartQty() {
    let el_cart_qty = $('.cart-quantity');
    let count = el_cart_qty.text();
    count++;
    el_cart_qty.text(count);
}

function removeCartQty(){
    let el_cart_qty = $('.cart-quantity');
    let count = el_cart_qty.text();
    count--;
    el_cart_qty.text(count);
}

function addPrice(price) {
    let mini_cart_total = $(".mini-cart-total");
    let old_price = Number(mini_cart_total.text());
    update_price = old_price + Number(price);
    $("#subtotel-price").text(update_price);
    $("#total-price").text(update_price);
    mini_cart_total.text(update_price);
}

function reducePrice(price) {
    let mini_cart_total = $(".mini-cart-total");
    let old_price = Number(mini_cart_total.text());
    update_price = old_price - Number(price);
    $("#subtotel-price").text(update_price);
    $("#total-price").text(update_price);
    $("#cart-subtotel-price").text(update_price);
    $("#cart-total-price").text(update_price);
    mini_cart_total.text(update_price);
}


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

function update_delivery_charge_and_calculate_total_price(){
    let charge = $(".delivery-charge").find(":selected").attr('data-charge');
    $(".delivery-charge-amount").text(charge);
    let total = $(".total-amount").attr('data-total');
    $(".total-amount").text(Number(total)+Number(charge));
}
update_delivery_charge_and_calculate_total_price();
$(".delivery-charge").change(function () {
    update_delivery_charge_and_calculate_total_price();
});

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

