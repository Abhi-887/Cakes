<input type="hidden" value="{{ cartTotal() }}" id="cart_total">
<input type="hidden" value="{{ count(Cart::content()) }}" id="cart_product_count">

@foreach (Cart::content() as $cartProduct)
    @php
        $totalPrice = $cartProduct->price; // Base product price

        // Add the prices of the variants to the total price
        foreach ($cartProduct->options->product_variants as $cartProductVariant) {
            $totalPrice += $cartProductVariant['item_price'];
        }
    @endphp
    <li>
        <div class="menu_cart_img">
            <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
        </div>

        <div class="menu_cart_text">
            <a class="title"
                href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}</a>
            <p class="size">Qty: {{ $cartProduct->qty }}</p>

            {{-- @if (!empty($cartProduct->options->product_size))
        <p class="size">{{ $cartProduct->options->product_size['name'] }} {{
            $cartProduct->options->product_size['price'] ? '(' .
            currencyPosition($cartProduct->options->product_size['price']) . ')' : '' }}</p>
        @endif --}}

            {{-- @foreach ($cartProduct->options->product_options as $cartProductOption)
        <span class="extra">{{ $cartProductOption['name'] }} ({{ currencyPosition($cartProductOption['price'])
            }})</span>
        @endforeach --}}

            @foreach ($cartProduct->options->product_variants as $cartProductVariant)
                <p class="variant">
                    {{ $cartProductVariant['variant_name'] }}: {{ $cartProductVariant['item_name'] }}
                    ({{ currencyPosition($cartProductVariant['item_price']) }})
                </p>
            @endforeach

            <p class="price">{{ currencyPosition($totalPrice) }}</p>
        </div>
        <span class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i
                class="fal fa-times"></i></span>
    </li>
@endforeach
