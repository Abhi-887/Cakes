@extends('frontend.layouts.master')

@section('content')

    <style>
        .w-0 {
            width: auto !important;
        }

        .productviewinput input:checked {
            background-color: #788a9f !important;
            border-color: #788a9f !important;
        }
    </style>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>menu Details</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">menu Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB END
                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
    <!--=============================
                                        MENU DETAILS START
                                        ==============================-->

                                        <div class="my-4">
                                            <div class="row">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                @foreach ($product->variants as $variant)
                                                    @if ($variant->status != 0)
                                                        <div class="col-xl-6 col-sm-6">
                                                            <h6 class="my-4">{{ $variant->name }} *</h6>
                                                            <div class="mt-2 fp__contact_form_input form-group">
                                                                <span><i class="far fa-caret-square-down"></i></span>

                                                                @if ($variant->attribute_type == 'dropdown')
                                                                    <select class="form-control" name="variants_items[]" required>
                                                                        <option value="" selected>-- Please Select --</option>
                                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                                            @if ($variantItem->status != 0)
                                                                                <option value="{{ $variantItem->id }}" {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                @elseif ($variant->attribute_type == 'radio')
                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                        @if ($variantItem->status != 0)
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="variant_{{ $variant->id }}" id="variant_{{ $variant->id }}_{{ $variantItem->id }}" value="{{ $variantItem->id }}" {{ $variantItem->is_default == 1 ? 'checked' : '' }} required>
                                                                                <label class="form-check-label" for="variant_{{ $variant->id }}_{{ $variantItem->id }}">
                                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                                </label>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($variant->attribute_type == 'checkbox')
                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                        @if ($variantItem->status != 0)
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" name="variant_{{ $variant->id }}[]" id="variant_{{ $variant->id }}_{{ $variantItem->id }}" value="{{ $variantItem->id }}" {{ $variantItem->is_default == 1 ? 'checked' : '' }}>
                                                                                <label class="form-check-label" for="variant_{{ $variant->id }}_{{ $variantItem->id }}">
                                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                                </label>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($variant->attribute_type == 'textarea')
                                                                    <textarea class="form-control" name="variant_{{ $variant->id }}" rows="4" required></textarea>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>


                                        <section class="pt-5 mt-5 fp__menu_details">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                                                        <div class="hidden exzoom" id="exzoom">
                                                            <div class="exzoom_img_box fp__menu_details_images">
                                                                <ul class='exzoom_img_ul'>
                                                                    <li><img class="zoom img-fluid w-100" src="{{ asset($product->thumb_image) }}" alt="product"></li>
                                                                    @foreach ($product->productImages as $image)
                                                                        <li><img class="zoom img-fluid w-100" src="{{ asset($image->image) }}" alt="product"></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="exzoom_nav"></div>
                                                            <p class="exzoom_btn">
                                                                <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i> </a>
                                                                <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i> </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                                                        <div class="fp__menu_details_text">
                                                            <h2>{!! $product->name !!}</h2>
                                                            @if ($product->reviews_avg_rating)
                                                                <p class="rating">
                                                                    @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                                                        <i class="fas fa-star"></i>
                                                                    @endfor
                                                                    <span>({{ $product->reviews_count }})</span>
                                                                </p>
                                                            @endif
                                                            <h3 class="price">
                                                                @if ($product->offer_price > 0)
                                                                    {{ currencyPosition($product->offer_price) }}
                                                                    <del>{{ currencyPosition($product->price) }}</del>
                                                                @else
                                                                    {{ currencyPosition($product->price) }}
                                                                @endif
                                                            </h3>
                                                            <p class="short_description">{!! $product->short_description !!}</p>
                                                            <hr class="my-4">
                                                            <form action="" id="v_add_to_cart_form">
                                                                @csrf
                                                                <input type="hidden" name="base_price" class="v_base_price"
                                                                    value="{{ $product->offer_price > 0 ? $product->offer_price : $product->price }}">
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                <!-- Display Attributes -->
                                                                @foreach ($product->variants as $variant)
                                                                    @if ($variant->status != 0)
                                                                        <div class="col-xl-6 col-sm-6">
                                                                            <h6 class="my-4">{{ $variant->name }} *</h6>
                                                                            <div class="mt-2 fp__contact_form_input form-group">
                                                                                @if ($variant->type == 'dropdown')
                                                                                    <span><i class="far fa-caret-square-down"></i></span>
                                                                                    <select class="form-control" name="variants_items[]" required>
                                                                                        <option value="" selected>-- Please Select --</option>
                                                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                                                            @if ($variantItem->status != 0)
                                                                                                <option value="{{ $variantItem->id }}"
                                                                                                    {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                                                </option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                @elseif ($variant->type == 'radio')
                                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                                        @if ($variantItem->status != 0)
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="radio" name="variants_items[{{ $variant->id }}]"
                                                                                                    id="variant_{{ $variantItem->id }}" value="{{ $variantItem->id }}"
                                                                                                    {{ $variantItem->is_default == 1 ? 'checked' : '' }}>
                                                                                                <label class="form-check-label" for="variant_{{ $variantItem->id }}">
                                                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                                                </label>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @elseif ($variant->type == 'checkbox')
                                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                                        @if ($variantItem->status != 0)
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" name="variants_items[{{ $variant->id }}][]"
                                                                                                    id="variant_{{ $variantItem->id }}" value="{{ $variantItem->id }}">
                                                                                                <label class="form-check-label" for="variant_{{ $variantItem->id }}">
                                                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                                                </label>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                                <div class="details_quentity">
                                                                    <h5 class="my-4">Select Quantity</h5>
                                                                    <div class="quentity_btn_area d-flex flex-wrap align-items-center">
                                                                        <div class="quentity_btn">
                                                                            <button class="btn btn-danger v_decrement"><i class="fal fa-minus"></i></button>
                                                                            <input type="text" name="quantity" placeholder="1" value="1" readonly id="v_quantity">
                                                                            <button class="btn btn-success v_increment"><i class="fal fa-plus"></i></button>
                                                                        </div>
                                                                        <h3 id="v_total_price">
                                                                            {{ $product->offer_price > 0 ? currencyPosition($product->offer_price) : currencyPosition($product->price) }}
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <ul class="flex-wrap details_button_area d-flex">
                                                                @if ($product->quantity === 0)
                                                                    <li><a class="common_btn bg-danger" href="javascript:;">Stock Out</a></li>
                                                                @else
                                                                    <li><a class="common_btn v_submit_button" href="#">Add To Cart</a></li>
                                                                @endif
                                                                <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Related Products -->
                                                <div class="row wow fadeInUp" data-wow-duration="1s">
                                                    @if (count($relatedProducts) > 0)
                                                        <div class="fp__related_menu mt_90 xs_mt_60">
                                                            <h2>Related Item</h2>
                                                            <div class="row related_product_slider">
                                                                @foreach ($relatedProducts as $relatedProduct)
                                                                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                                                                        <div class="fp__menu_item">
                                                                            <div class="fp__menu_item_img">
                                                                                <img src="{{ asset($relatedProduct->thumb_image) }}"
                                                                                    alt="{{ $relatedProduct->name }}" class="img-fluid w-100">
                                                                            </div>
                                                                            <a class="px-2 py-1 category bg-light fw-semibold"
                                                                                href="#">{{ @$relatedProduct->category->name }}</a>
                                                                            <div class="fp__menu_item_text">
                                                                                <p class="rating">
                                                                                    @if ($relatedProduct->reviews_avg_rating)
                                                                                        <p class="rating">
                                                                                            @for ($i = 1; $i <= $relatedProduct->reviews_avg_rating; $i++)
                                                                                                <i class="fas fa-star"></i>
                                                                                            @endfor
                                                                                            <span>({{ $relatedProduct->reviews_count }})</span>
                                                                                        </p>
                                                                                    @endif
                                                                                </p>
                                                                                <a class="my-3 title"
                                                                                    href="{{ route('product.show', $relatedProduct->slug) }}">{!! $relatedProduct->name !!}</a>
                                                                                <p class="top-0 px-3 py-1 text-center price fw-semibold position-absolute rounded-pill color-light-gray">
                                                                                    @if ($relatedProduct->offer_price > 0)
                                                                                        {{ currencyPosition($relatedProduct->offer_price) }}
                                                                                        <del>{{ currencyPosition($relatedProduct->price) }}</del>
                                                                                    @else
                                                                                        {{ currencyPosition($relatedProduct->price) }}
                                                                                    @endif
                                                                                </p>
                                                                                <ul class="flex-wrap d-flex justify-content-center">
                                                                                    <li><a href="javascript:;" onclick="loadProductModal('{{ $relatedProduct->id }}')"><i class="fas fa-shopping-basket"></i></a></li>
                                                                                    <li onclick="addToWishlist('{{ $relatedProduct->id }}')"><a class="background-light-gray" href="javascript:;"><i class="fal fa-heart"></i></a></li>
                                                                                    <li><a class="background-light-gray" href="{{ route('product.show', $relatedProduct->slug) }}"><i class="far fa-eye"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </section>





@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.v_product_size').prop('checked', false);
            $('.v_product_option').prop('checked', false);
            $('#v_quantity').val(1);

            $('.v_product_size').on('change', function() {
                v_updateTotalPrice()
            });

            $('.v_product_option').on('change', function() {
                v_updateTotalPrice()
            });

            // Event handlers for increment and decrement buttons
            $('.v_increment').on('click', function(e) {
                e.preventDefault()

                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                quantity.val(currentQuantity + 1);
                v_updateTotalPrice()
            })

            $('.v_decrement').on('click', function(e) {
                e.preventDefault()

                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                if (currentQuantity > 1) {
                    quantity.val(currentQuantity - 1);
                    v_updateTotalPrice()
                }
            })


            // Function to update the total price base on seelected options
            function v_updateTotalPrice() {
                let basePrice = parseFloat($('.v_base_price').val());
                let selectedSizePrice = 0;
                let selectedOptionsPrice = 0;
                let quantity = parseFloat($('#v_quantity').val());

                // Calculate the selected size price
                let selectedSize = $('.v_product_size:checked');
                if (selectedSize.length > 0) {
                    selectedSizePrice = parseFloat(selectedSize.data("price"));
                }

                // Calculate selected options price
                let selectedOptions = $('.v_product_option:checked');
                $(selectedOptions).each(function() {
                    selectedOptionsPrice += parseFloat($(this).data("price"));
                })

                // Calculate the total price
                let totalPrice = (basePrice + selectedSizePrice + selectedOptionsPrice) * quantity;
                $('#v_total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice);
            }

            $('.v_submit_button').on('click', function(e) {
                e.preventDefault();
                $("#v_add_to_cart_form").submit();
            })

            // Add to cart function
            $("#v_add_to_cart_form").on('submit', function(e) {
                e.preventDefault();

                // Validation
                let selectedSize = $(".v_product_size");
                if (selectedSize.length > 0) {
                    if ($(".v_product_size:checked").val() === undefined) {
                        toastr.error('Please select a size');
                        console.error('Please select a size');
                        return;
                    }
                }

                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('add-to-cart') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.v_submit_button').attr('disabled', true);
                        $('.v_submit_button').html(
                            '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                        )
                    },
                    success: function(response) {
                        updateSidebarCart();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        $('.v_submit_button').html('Add to Cart');
                        $('.v_submit_button').attr('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush
