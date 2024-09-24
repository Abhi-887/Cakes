<button type="button" class="btn-close bg-transparent color-dark-gray border-common" data-bs-dismiss="modal"
    aria-label="Close"><i class="fal fa-times"></i></button>

<form action="" id="modal_add_to_cart_form">
    @csrf
    <input type="hidden" name="base_price" class="v_base_price"
        value="{{ $product->offer_price > 0 ? $product->offer_price : $product->price }}">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="total_price" id="v_hidden_total_price">

    <div class="fp__cart_popup_img">
        <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
        <a href="{{ route('product.show', $product->slug) }}" class="title">{!! $product->name !!}</a>

        <h4 class="price">
            @if ($product->offer_price > 0)
                <input type="hidden" name="base_price" value="{{ $product->offer_price }}">
                {{ currencyPosition($product->offer_price) }}
                <del>{{ currencyPosition($product->price) }}</del>
            @else
                <input type="hidden" name="base_price" value="{{ $product->price }}">
                {{ currencyPosition($product->price) }}
            @endif
        </h4>

        <div class="selectbox">
            <div class="row">
                @php
                    $variants = $product->variants->where('status', '!=', 0)->sortBy('shotorder');
                @endphp

                @foreach ($variants as $variant)
                    <div class="col-12">
                        <div>
                            <h6 class="my-4">
                                {{ $variant->name }}:
                                @if ($variant->isrequired)
                                    <span class="text-danger">*</span>
                                @endif
                            </h6>

                            @switch($variant->attribute_type)
                                @case('dropdown')
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-caret-square-down" aria-hidden="true"></i></span>
                                        <select class="form-control v_product_option" name="variants_items[]" data-price=""
                                            required="{{ $variant->isrequired ? 'true' : 'false' }}">
                                            <option value="" selected>-- Please Select --</option>
                                            @foreach ($variant->productVariantItems as $variantItem)
                                                @if ($variantItem->status != 0)
                                                    <option value="{{ $variantItem->id }}"
                                                        data-price="{{ $variantItem->price }}">
                                                        {{ $variantItem->name }}
                                                        @if ($variantItem->price != 0)
                                                            ({{ currencyPosition($variantItem->price) }})
                                                        @endif
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <span class="error-message text-danger" style="display:none;">Please select an
                                            option.</span>
                                    </div>
                                @break

                                @case('radio')
                                    @foreach ($variant->productVariantItems as $variantItem)
                                        @if ($variantItem->status != 0)
                                            <div class="mt-2 fp__contact_form_input form-group">
                                                <input class="w-0 me-2 v_product_option" type="radio"
                                                    name="variants_items[{{ $variant->id }}]" value="{{ $variantItem->id }}"
                                                    data-price="{{ $variantItem->price }}"
                                                    id="variantItem_{{ $variantItem->id }}"
                                                    required="{{ $variant->isrequired ? 'true' : 'false' }}">
                                                <label for="variantItem_{{ $variantItem->id }}">{{ $variantItem->name }}
                                                    @if ($variantItem->price != 0)
                                                        ({{ currencyPosition($variantItem->price) }})
                                                    @endif
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                    <span class="error-message text-danger" style="display:none;">Please select an
                                        option.</span>
                                @break

                                @case('checkbox')
                                    @foreach ($variant->productVariantItems as $variantItem)
                                        @if ($variantItem->status != 0)
                                            <div class="my-4">
                                                <input class="w-0 me-2 v_product_option" type="checkbox"
                                                    name="variants_items[{{ $variant->id }}][]"
                                                    value="{{ $variantItem->id }}" data-price="{{ $variantItem->price }}"
                                                    id="variantItem_{{ $variantItem->id }}"
                                                    required="{{ $variant->isrequired ? 'true' : 'false' }}">
                                                <label for="variantItem_{{ $variantItem->id }}">{{ $variantItem->name }}
                                                    @if ($variantItem->price != 0)
                                                        ({{ currencyPosition($variantItem->price) }})
                                                    @endif
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                    <span class="error-message text-danger" style="display:none;">Please select an
                                        option.</span>
                                @break

                                @case('field')
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-solid fa-keyboard" aria-hidden="true"></i></span>
                                        <input type="text" name="variants_items[{{ $variant->id }}]" class="form-control"
                                            placeholder="Enter {{ $variant->name }}"
                                            {{ $variant->isrequired ? 'required' : '' }}>
                                        <span class="error-message text-danger" style="display:none;">Please fill this
                                            field.</span>
                                    </div>
                                @break

                                @case('area')
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-solid fa-paragraph" aria-hidden="true"></i></span>
                                        <textarea name="variants_items[{{ $variant->id }}]" class="form-control" rows="3"
                                            placeholder="Enter {{ $variant->name }}" {{ $variant->isrequired ? 'required' : '' }}></textarea>
                                        <span class="error-message text-danger" style="display:none;">Please fill this
                                            field.</span>
                                    </div>
                                @break

                                @case('date')
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-regular fa-calendar" aria-hidden="true"></i></span>
                                        <input type="date" name="variants_items[{{ $variant->id }}]" class="form-control"
                                            {{ $variant->isrequired ? 'required' : '' }}>
                                        <span class="error-message text-danger" style="display:none;">Please select a
                                            date.</span>
                                    </div>
                                @break

                                @case('datetime')
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-regular fa-calendar-days" aria-hidden="true"></i></span>
                                        <input type="datetime-local" name="variants_items[{{ $variant->id }}]"
                                            class="form-control" {{ $variant->isrequired ? 'required' : '' }}>
                                        <span class="error-message text-danger" style="display:none;">Please select a date and
                                            time.</span>
                                    </div>
                                @break

                                @case('time')
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-solid fa-clock" aria-hidden="true"></i></span>
                                        <input type="time" name="variants_items[{{ $variant->id }}]"
                                            class="form-control" {{ $variant->isrequired ? 'required' : '' }}>
                                        <span class="error-message text-danger" style="display:none;">Please select a
                                            time.</span>
                                    </div>
                                @break

                                @default
                                    <div class="mt-2 fp__contact_form_input form-group">
                                        <span><i class="far fa-keyboard" aria-hidden="true"></i></span>
                                        <input type="text" name="variants_items[]" class="form-control"
                                            placeholder="Enter {{ $variant->name }}"
                                            {{ $variant->isrequired ? 'required' : '' }}>
                                        <span class="error-message text-danger" style="display:none;">Please fill this
                                            field.</span>
                                    </div>
                            @endswitch
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="details_quentity">
            <h5>Select Quantity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn v_decrement text-white"><i class="fal fa-minus"></i></button>
                    <input class="border-common" type="text" name="quantity" placeholder="1" value="1"
                        readonly id="v_quantity">
                    <button class="btn v_increment text-white"><i class="fal fa-plus"></i></button>
                </div>
                <h3 id="v_total_price">
                    {{ $product->offer_price > 0 ? currencyPosition($product->offer_price) : currencyPosition($product->price) }}
                </h3>
            </div>
        </div>

        <ul class="flex-wrap details_button_area d-flex">
            @if ($product->quantity === 0)
                <li><a class="common_btn bg-danger" href="javascript:;">Out of stock </a></li>
            @else
                <li><button type="submit" class="common_btn background-light-gray text-white modal_cart_button">add
                        to cart</button></li>
            @endif
            <li><a class="wishlist  background-light-gray text-white ms-3" href="#"><i
                        class="far fa-heart"></i></a>
            </li>
        </ul>
    </div>
</form>
<script>
    $(document).ready(function() {
        // Update total price function based on selected variants
        function updateTotalPrice() {
            let basePrice = parseFloat($('input[name="base_price"]').val());
            let selectedSizePrice = 0;
            let selectedOptionsPrice = 0;
            let quantity = parseFloat($('#quantity').val());

            // Calculate the selected size price
            let selectedSize = $('input[name="product_size"]:checked');
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data("price"));
            }

            // Calculate selected options price
            let selectedOptions = $('input[name="product_option"]:checked');
            selectedOptions.each(function() {
                selectedOptionsPrice += parseFloat($(this).data("price"));
            });

            // Calculate the total price
            let totalPrice = (basePrice + selectedSizePrice + selectedOptionsPrice) * quantity;
            $('#total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice);
            $('#hidden_total_price').val(totalPrice);
        }

        // Event handlers for increment and decrement buttons
        $('.increment').on('click', function(e) {
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            quantity.val(currentQuantity + 1);
            updateTotalPrice();
        });

        $('.decrement').on('click', function(e) {
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            if (currentQuantity > 1) {
                quantity.val(currentQuantity - 1);
                updateTotalPrice();
            }
        });

        // Event handlers for variant selections
        $('input[name="product_option"]').on('change', function() {
            updateTotalPrice();
        });

        // Handle form submission
        $("#modal_add_to_cart_form").on('submit', function(e) {
            e.preventDefault();

            // Validation for required variants
            let isValid = true;
            $('select, input').each(function() {
                if ($(this).prop('required') && !$(this).val()) {
                    isValid = false;
                    $(this).siblings('.error-message').show();
                } else {
                    $(this).siblings('.error-message').hide();
                }
            });

            if (!isValid) {
                toastr.error('Please fill in all required fields.');
                return;
            }

            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: '{{ route('add-to-cart') }}',
                data: formData,
                beforeSend: function() {
                    $('.modal_cart_button').attr('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                    );
                },
                success: function(response) {
                    updateSidebarCart();
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    $('.modal_cart_button').html('Add to Cart').attr('disabled', false);
                }
            });
        });

        // Initial update of total price
        updateTotalPrice();
    });
</script>
