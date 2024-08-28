@extends('frontend.layouts.master')

@section('content')
<!--=============================
                                                                                                    BREADCRUMB START
                                                                                                ==============================-->
<section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
    <div class="py-5 fp__breadcrumb_overlay">
        <div class="container py-2 py-md-5">
            <div class="fp__breadcrumb_text">
                <h1>cart view</h1>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="#">cart view</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
                                                                                                    BREADCRUMB END
                                                                                                ==============================-->

<!--============================
                                                                                                    CART VIEW START
                                                                                                ==============================-->

<section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__cart_list">
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <th class="fp__pro_img">Image</th>
                                    <th class="fp__pro_name">Details</th>
                                    <th class="fp__pro_status">Price</th>
                                    <th class="fp__pro_select">Quantity</th>
                                    <th class="fp__pro_tk">Total</th>
                                    <th class="fp__pro_icon">
                                        <a class="clear_all" href="{{ route('cart.destroy') }}">Clear All</a>
                                    </th>
                                </tr>

                                @foreach (Cart::content() as $product)
                                <tr>
                                    <td class="fp__pro_img">
                                        <img src="{{ $product->options->product_info['image'] }}" alt="product" class="h-auto img-fluid w-100">
                                    </td>

                                    <td class="fp__pro_name">
                                        <a class="fw-bold" href="{{ route('product.show', $product->options->product_info['slug']) }}">
                                            {{ $product->name }}
                                        </a>
                                        <small>
                                            @foreach ($product->options->product_variants as $variant)
                                            @php
                                            $variantName = is_array($variant['variant_name']) ? '' : htmlspecialchars($variant['variant_name']);
                                            $itemName = is_array($variant['item_name']) ? implode(', ', $variant['item_name']) : htmlspecialchars($variant['item_name']);
                                            $itemPrice = $variant['item_price'] ?? 0;
                                            @endphp
                                            @if (!empty($itemName))
                                            <p class="fw-normal">
                                                {{ $variantName }}: {{ $itemName }}
                                                @if ($itemPrice != 0)
                                                ({{ currencyPosition($itemPrice) }})
                                                @endif
                                            </p>
                                            @endif
                                            @endforeach
                                        </small>
                                    </td>

                                    <td class="fp__pro_status">
                                        <h6>{{ currencyPosition($product->price) }}</h6>
                                    </td>

                                    <td class="fp__pro_select">
                                        <div class="quentity_btn">
                                            <button class="btn btn-danger decrement"><i class="fal fa-minus"></i></button>
                                            <input type="text" class="quantity" data-id="{{ $product->rowId }}" placeholder="1" value="{{ $product->qty }}" readonly>
                                            <button class="btn btn-success increment"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </td>

                                    <td class="fp__pro_tk">
                                        <h6 class="product_cart_total">{{ currencyPosition($product->price * $product->qty) }}</h6>
                                    </td>

                                    <td class="fp__pro_icon">
                                        <a href="#" class="remove_cart_product fs-4" data-id="{{ $product->rowId }}"><i class="far fa-times"></i></a>
                                    </td>
                                </tr>

                                <!-- Coupon form for each product -->
                                <tr>
                                    <td colspan="6" class="text-center fp__pro_name" style="width: 100%; display: inline;">
                                        <form id="coupon_form_{{ $product->id }}" class="coupon_form">
                                            <input type="text" class="coupon_code" name="code" placeholder="Coupon Code">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit">Apply</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach

                                @if (Cart::content()->count() === 0)
                                <tr>
                                    <td colspan="6" class="text-center fp__pro_name" style="width: 100%;display: inline;">
                                        Cart is empty!
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__cart_list_footer_button">
                    <h6>Total Cart</h6>
                    <p>Subtotal: <span id="subtotal">{{ currencyPosition(cartTotal()) }}</span></p>
                    <p>Delivery: <span>{{ currencyPosition(0.0) }}</span></p>
                    <p>Discount: <span id="discount">
                        @if (session()->has('coupon.discount'))
                            {{ config('settings.site_currency_icon') }}{{ session('coupon.discount') }}
                        @else
                            {{ config('settings.site_currency_icon') }}0
                        @endif
                    </span></p>
                    <p class="total"><span>Total:</span> <span id="final_total">
                        @if (session()->has('coupon.discount'))
                            {{ config('settings.site_currency_icon') }}{{ cartTotal() - session('coupon.discount') }}
                        @else
                            {{ config('settings.site_currency_icon') }}{{ cartTotal() }}
                        @endif
                    </span></p>

                    <div class="coupon_card">
                        @if (session()->has('coupon'))
                        <div class="mt-2 card">
                            <div class="m-3">
                                <span><b class="v_coupon_code">Applied Coupon: {{ session('coupon.code') }}</b></span>
                                <span>
                                    <button id="destroy_coupon"><i class="far fa-times"></i></button>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <a class="common_btn" href="{{ route('checkout.index') }}">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--============================
                                                                                                    CART VIEW END
                                                                                                ==============================-->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var cartTotal = parseInt("{{ cartTotal() }}");

        $('.increment').on('click', function() {
            let inputField = $(this).siblings(".quantity");
            let currentValue = parseInt(inputField.val());
            let rowId = inputField.data("id");

            inputField.val(currentValue + 1);

            cartQtyUpdate(rowId, inputField.val(), function(response) {
                if (response.status === 'success') {
                    inputField.val(response.qty);

                    let productTotal = response.product_total;
                    inputField.closest("tr").find(".product_cart_total").text("{{ currencyPosition(':productTotal') }}".replace(":productTotal", productTotal));

                    cartTotal = response.cart_total;
                    $('#subtotal').text("{{ config('settings.site_currency_icon') }}" + cartTotal);
                    $("#final_total").text("{{ config('settings.site_currency_icon') }}" + response.grand_cart_total);

                } else if (response.status === 'error') {
                    inputField.val(response.qty);
                    toastr.error(response.message);
                }
            });
        });

        $('.decrement').on('click', function() {
            let inputField = $(this).siblings(".quantity");
            let currentValue = parseInt(inputField.val());
            let rowId = inputField.data("id");

            if (currentValue > 1) {
                inputField.val(currentValue - 1);

                cartQtyUpdate(rowId, inputField.val(), function(response) {
                    if (response.status === 'success') {
                        inputField.val(response.qty);

                        let productTotal = response.product_total;
                        inputField.closest("tr").find(".product_cart_total").text("{{ currencyPosition(':productTotal') }}".replace(":productTotal", productTotal));

                        cartTotal = response.cart_total;
                        $('#subtotal').text("{{ config('settings.site_currency_icon') }}" + cartTotal);
                        $("#final_total").text("{{ config('settings.site_currency_icon') }}" + response.grand_cart_total);

                    } else if (response.status === 'error') {
                        inputField.val(response.qty);
                        toastr.error(response.message);
                    }
                });
            }
        });

        function cartQtyUpdate(rowId, qty, callback) {
            $.ajax({
                method: 'post',
                url: '{{ route('cart.quantity-update') }}',
                data: {
                    'rowId': rowId,
                    'qty': qty
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    if (callback && typeof callback === 'function') {
                        callback(response);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                },
                complete: function() {
                    hideLoader();
                }
            });
        }

        $(document).on('click', '.remove_cart_product', function() {
            let rowId = $(this).data('id');

            $.ajax({
                method: 'delete',
                url: '{{ route('cart.remove') }}',
                data: {
                    rowId: rowId,
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    if (response.status === 'success') {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                },
                complete: function() {
                    hideLoader();
                }
            });
        });

        $('.coupon_form').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let code = form.find('.coupon_code').val();
            let productId = form.find('input[name="product_id"]').val();
            let subtotal = cartTotal;

            couponApply(code, subtotal, productId);
        });

        function couponApply(code, subtotal, productId) {
            $.ajax({
                method: 'POST',
                url: '{{ route('apply-coupon') }}',
                data: {
                    code: code,
                    subtotal: subtotal,
                    product_id: productId
                },
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    if (response.status === 'success') {
                        location.reload();
                    } else if (response.status === 'error') {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                },
                complete: function() {
                    hideLoader();
                }
            });
        }

        $('#destroy_coupon').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: '{{ route('coupon.destroy') }}',
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    if (response.status === 'success') {
                        location.reload();
                    } else if (response.status === 'error') {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                },
                complete: function() {
                    hideLoader();
                }
            });
        });
    });
</script>
@endpush
