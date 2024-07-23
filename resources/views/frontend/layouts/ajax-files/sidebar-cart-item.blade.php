<input type="hidden" value="{{ cartTotal() }}" id="cart_total">
<input type="hidden" value="{{ count(Cart::content()) }}" id="cart_product_count">

@foreach (Cart::content() as $cartProduct)
@php
$totalPrice = $cartProduct->price; // Base product price

// Add the prices of the variants to the total price
foreach ($cartProduct->options->product_variants as $cartProductVariant) {
$totalPrice += $cartProductVariant['item_price'] ?? 0;
}
@endphp
<li>
    <div class="menu_cart_img">
        <img src="{{ asset($cartProduct->options->product_info['image'] ?? 'default-image.png') }}" alt="menu"
            class="img-fluid w-100">
    </div>

    <div class="menu_cart_text">
        <a class="title"
            href="{{ route('product.show', $cartProduct->options->product_info['slug'] ?? 'default-slug') }}">
            {!! htmlspecialchars($cartProduct->name) !!}
        </a>
        <p class="size">Qty: {{ $cartProduct->qty }}</p>

        {{-- Uncomment and use if needed --}}
        {{-- @if (!empty($cartProduct->options->product_size))
        <p class="size">
            {{ htmlspecialchars($cartProduct->options->product_size['name']) }}
            {{ $cartProduct->options->product_size['price'] ? '(' .
            currencyPosition($cartProduct->options->product_size['price']) . ')' : '' }}
        </p>
        @endif --}}

        {{-- Uncomment and use if needed --}}
        {{-- @foreach ($cartProduct->options->product_options as $cartProductOption)
        <span class="extra">
            {{ htmlspecialchars($cartProductOption['name']) }} ({{ currencyPosition($cartProductOption['price']) }})
        </span>
        @endforeach --}}

        {{-- @foreach ($cartProduct->options->product_variants as $cartProductVariant)
        @php
        $variantName = htmlspecialchars($cartProductVariant['variant_name'] ?? '');
        $itemName = htmlspecialchars($cartProductVariant['item_name'] ?? '');
        $itemPrice = $cartProductVariant['item_price'] ?? 0;
        @endphp
        <p class="variant">
            {{ $variantName }}
            @if (!empty($itemName))
            : {{ $itemName }}
            @endif
            ({{ currencyPosition($itemPrice) }})
        </p>
        @endforeach --}}

        <p class="price">{{ currencyPosition($totalPrice) }}</p>
    </div>
    <span class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')">
        <i class="fal fa-times"></i>
    </span>
</li>
@endforeach
