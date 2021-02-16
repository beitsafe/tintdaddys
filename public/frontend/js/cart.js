/* Cart */
function sum(obj) {
    var sum = 0;
    for (var el in obj) {
        if (obj.hasOwnProperty(el)) {
            sum += parseFloat(obj[el]);
        }
    }
    return sum;
}

function refreshCart(response) {
    if(response.items!=null){
        var count = Object.keys(response.items).length;
    }

    if (count == 0) {
        if ($('#cart-form').length > 0) {
            $('#empty-cart').removeClass('d-none');
            $('#cart-form').addClass('d-none');
        }
    }else{
        if ($('.cartcount').length > 0) {
            $('.cartcount').html(count);
            var totalfee = parseFloat(response.cart_total);
            $('.cart-total').html('$ ' + totalfee.toFixed(2));
        }

        $('#empty-cart').addClass('d-none');
        $('#cart-form').removeClass('d-none');
        cartSummaryRefresh(response);
    }
}

function addToCart(pid, qty) {
    $.post('/cart/action/add', {id: pid, qty: qty, postcode: $('#shipping_postalcode').val()}, function (response) {
        refreshCart(response);
    }, "json");
}

function removeFromCart(pid) {
    $.post('/cart/action/remove', {id: pid, postcode: $('#shipping_postalcode').val()}, function (response) {
        refreshCart(response);
    }, "json");
}

function fetchCart() {
    $.post('/cart/action', {postcode: $('#shipping_postalcode').val()}, function (response) {
        refreshCart(response);
    }, "json");
}

function updateShipping(postcode) {
    $.post('/cart/action/shipping',{postcode: postcode}, function (response) {
        refreshCart(response);
    }, "json");
}

function cartInit() {
    fetchCart();
}

function cartSummaryRefresh(response) {
    $('.cart-item').each(function () {
        var rowTotal = parseFloat(parseInt($(this).find('[name="quantity"]').val()) * parseFloat($(this).data('unitprice'))).toFixed(2);
        $(this).find('.row-total').html(`$${rowTotal}`);
    });

    const summaryTbl = $('.cart-totals'),
        subTotal = parseFloat(response.cart_total).toFixed(2),
        taxFee = 0;
        // taxFee = parseFloat(subTotal/10).toFixed(2);

    if(response.error){
        Swal.fire('',response.error,'error');
    }

    summaryTbl.find('#cart-tax').html(`$${taxFee}`);
    summaryTbl.find('#cart-subtotal').html('$' + parseFloat(parseFloat(subTotal)).toFixed(2));
    summaryTbl.find('#cart-total').html('$' + parseFloat(parseFloat(subTotal) + parseFloat(taxFee)).toFixed(2));
}

function flashNotify(message) {
    toastr.success(message);
}

var autocomplete;

$(document).ready(function () {
    $('body').on('click', '.popupWindow', function () {
        NWin = window.open($(this).attr('href'), '', 'height=800,width=800');
        if (window.focus) {
            NWin.focus();
        }
        return false;
    });

    cartInit();

    $('body').on('click', '.remove-cart', function (e) {
        e.preventDefault();
        let _row = $(this).closest('.cart-item');
        removeFromCart(_row.data('pid'));
        _row.remove();
        return false;
    });


    $('body').on('click', '[data-trigger="change-qty"]', function () {
        _that = $(this).closest('.cart-item');
        addToCart(_that.data('pid'), _that.find("[name='quantity']").val());
    });

    $('body').on('change', '#shipping_postalcode', function () {
        updateShipping($(this).val());
    });

    $('body').on('change', '.prod-qty', function () {
        _that = $(this);
        addToCart(_that.data('id'), _that.val());
    });

    $('body').on('click', '.add-to-cart', function () {
        _that = $(this);
        var qty = $('input[name="quantity"]').val();
        addToCart(_that.data('id'), (qty)?qty:1);
        _that.addClass('added-cart');
        flashNotify(`${_that.data('name')} added to the cart`);
    });

    $('body').on('click', '.btn-remove-cart', function () {
        _that = $(this);
        removeFromCart(_that.data('id'));
        $(this).removeClass('btn-remove-cart').addClass('btn-add-cart').html('Add To Cart');
    });

    $('body').on('click', '#same_as_bill', function () {
        if ($(this).is(':checked')) {
            $.each($('[name^=billing]').serializeArray(), function (k, f) {
                field = f.name.replace("billing", "shipping");
                $('[name="' + field + '"]').val(f.value);
            });
        } else {
            $('[name^=shipping]').val('');
        }
        $('#shipping_postalcode').trigger('change');
    });
});
