<input type="hidden" value="{{ cartTotal() }}" id="cart_total">
<input type="hidden" value="{{ count(Cart::content()) }}" id="cart_product_count">

@foreach (Cart::content() as $cartProduct)
<li>
    <div class="menu_cart_img">
        @if (isset($cartProduct->options->product_info['image']))
        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
        @else
        <img src="{{ asset('path_to_default_image.jpg') }}" alt="Default Image" class="img-fluid w-100">
        @endif
    </div>
    <div class="menu_cart_text">
        <a class="title" href="{{ route('product.show', $cartProduct->options->product_info['slug'] ?? '') }}">
            {!! $cartProduct->name !!}
        </a>
        <p class="size">Qty: {{ $cartProduct->qty }}</p>

        @if (isset($cartProduct->options->product_size))
        <p class="size">{{ $cartProduct->options->product_size['name'] }}
            {{ $cartProduct->options->product_size['price'] ? '(' .
            currencyPosition($cartProduct->options->product_size['price']) . ')' : '' }}
        </p>
        @endif

        @if (isset($cartProduct->options->product_options) && is_array($cartProduct->options->product_options))
        @foreach ($cartProduct->options->product_options as $cartProductOption)
        <span class="extra">{{ $cartProductOption['name'] }} ({{ currencyPosition($cartProductOption['price'])
            }})</span>
        @endforeach
        @endif

        <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
    </div>
    <span class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i
            class="fal fa-times"></i></span>
</li>
@endforeach
