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
    let count = 0;
    if (response.items != null) {
        count = Object.keys(response.items).length;
    }

    if (count == 0) {
        if ($('#cart-form').length > 0) {
            $('#empty-cart').removeClass('d-none');
            $('#cart-form').addClass('d-none');
        }
    } else {
        if ($('.cartcount').length > 0) {
            $('.cartcount').html(count);
            var totalfee = parseFloat(response.cart_total) + parseFloat(response.shippingfee);
            $('.cart-total').html('$ ' + totalfee.toFixed(2));
        }

        $('#empty-cart').addClass('d-none');
        $('#cart-form').removeClass('d-none');
        cartSummaryRefresh(response);
    }
}

function addToCart(pid, qty, variant) {
    $.post('/cart/action/add', {id: pid, qty: qty, variant: variant, postcode: $('#shipping_postalcode').val()}, function (response) {
        refreshCart(response);
    }, "json");
}

function removeFromCart(pid, variant) {
    $.post('/cart/action/remove', {id: pid, variant: variant, postcode: $('#shipping_postalcode').val()}, function (response) {
        refreshCart(response);
    }, "json");
}

function fetchCart() {
    $.post('/cart/action', {postcode: $('#shipping_postalcode').val()}, function (response) {
        refreshCart(response);
    }, "json");
}

function updateShipping(params) {
    $('.cart-totals .spinner').addClass('spinning');
    $.post('/cart/action/shipping', params, function (response) {
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
        taxFee = 0,
        shippingFee = parseFloat(response.shippingfee).toFixed(2);

    if (response.error) {
        Swal.fire('', response.error, 'error');
    }

    let shippingOption = `$${shippingFee}`;
    if (response.shippingerror) {
        shippingOption = response.shippingerror;
    }

    summaryTbl.find('#cart-tax').html(`$${taxFee}`);
    summaryTbl.find('#cart-shippingfee').html(shippingOption);
    summaryTbl.find('#cart-subtotal').html('$' + parseFloat(parseFloat(subTotal)).toFixed(2));
    summaryTbl.find('#cart-total').html('$' + parseFloat(parseFloat(subTotal) + parseFloat(taxFee) + parseFloat(shippingFee)).toFixed(2));
    summaryTbl.find('.spinner').removeClass('spinning');
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
        removeFromCart(_row.data('pid'), _row.data('variant'));
        _row.remove();
        return false;
    });


    $('body').on('click', '[data-trigger="change-qty"]', function () {
        _that = $(this).closest('.cart-item');
        addToCart(_that.data('pid'), _that.find("[name='quantity']").val(), _that.data('variant'));
    });

    $('body').on('blur', '.billing-field[data-shipping-name]', function () {
        let params = {
            field: $(this).data('shipping-name'),
            value: $(this).val(),
        }
        if(params.field && params.value) {
            updateShipping(params);
        }
    });

    $('body').on('change', '.prod-qty', function () {
        _that = $(this);
        addToCart(_that.data('id'), _that.val());
    });

    $('body').on('click', '.add-to-cart', function () {
        _that = $(this);
        if ($('select[name="variant"]').val() == '') {
            toastr.error('Please select Size & Shade');
            return false;
        }

        var qty = $('input[name="quantity"]').val(),
            variant = $('select[name="variant"]').val();

        addToCart(_that.data('id'), (qty) ? qty : 1, variant);
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
