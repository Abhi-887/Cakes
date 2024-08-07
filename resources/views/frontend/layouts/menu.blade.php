<section class="sticky-top">
    @php
    $MainMenu = Menu::getByName('main_menu');
    @endphp

    <nav class="navbar bg-light">
        <div class="p-3 mx-auto wrapper d-flex justify-content-between align-items-center w-100">
            <div class="header-logo me-3">
                <a class="" href="{{ url('/') }}">
                    <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                </a>
            </div>
            <ul class="d-none d-xxl-flex">
                {{-- Main Menu Items --}} @if ($MainMenu)
                @foreach ($MainMenu as $menu)
                <li class="mx-2 nav-item">
                    <a class="mx-2 nav-link fw-semibold" href="{{ $menu['link'] }}">{{ $menu['label'] }}
                        @if ($menu['child'])
                        <i class="far fa-angle-down"></i>
                        @endif
                    </a>
                    @if ($menu['child'])
                    <ul class="droap_menu position-absolute bg-light">
                        @foreach ($menu['child'] as $item)
                        <li class="pb-2 m-2 border-bottom">
                            <a class="fw-semibold" href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
                @endif
            </ul>
            <ul class="ms-auto d-flex menu_icon d-xxl-none d-block">
                <li>
                    <a href="#" class="menu_search me-3 me-sm-4 position-relative fw-semibold fs-5 transitions"><i
                            class="transition far fa-search"></i></a>
                    <div
                        class="top-0 fp__search_form position-fixed w-100 end-0 justify-content-center align-items-center transitions vh-100">
                        <form class="top-50 start-50 position-absolute" action="{{ route('product.index') }}"
                            method="GET">
                            <span
                                class="mb-5 text-center close_search position-absolute rounded-circle fs-3 bottom-100 end-0 transitions"><i
                                    class="far fa-times"></i></span>
                            <input class="border border-0 searchinput w-100 rounded-5" type="text"
                                placeholder="Search . . ." name="search" />
                            <button
                                class="px-4 py-2 position-absolute top-50 fw-semibold rounded-5 outline-0 transitions"
                                type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon me-4 position-relative fw-semibold fs-5"><i
                            class="transition fas fa-shopping-basket"></i>
                        <span
                            class="text-center cart_count bg-gray position-absolute text-light fw-semibold bottom-50 end-25 rounded-circle">{{
                            count(Cart::content()) }}</span></a>
                </li>
                @php @$unseenMessages = \App\Models\Chat::where(['sender_id' => 1, 'receiver_id' => auth()->user()->id,
                'seen' => 0])->count(); @endphp
                {{-- <li>
                    <a class="message_icon me-4 position-relative fw-semibold fs-5 transitions"
                        href="{{ route('dashboard') }}">
                        <i class="fas fa-comment-alt-dots"></i>
                        <span
                            class="text-center sunseen-message-count bg-gray position-absolute text-light fw-semibold bottom-50 end-25 ms-1 rounded-circle">{{
                            $unseenMessages > 0 ? 1 : 0 }}</span>
                    </a>
                </li> --}}
                <li>
                    <a class="fs-5 me-3 me-sm-4" href="{{ route('login') }}"><i class="transition fas fa-user"></i></a>
                </li>
            </ul>
            <a class="d-xxl-none d-block" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <i class="fas fa-bars fs-2 color-light-gray"></i>
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="pt-3 offcanvas-header">
                    <a class="w-50" href="{{ url('/') }}">
                        <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                    </a>
                    <button type="button" class="btn-close fs-4 background-dark-gray" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="mt-3">
                        @if ($MainMenu)
                        @foreach ($MainMenu as $index => $menu)
                        <li class="my-3 nav-item">
                            <div class="d-flex ms-2 lh-lg">
                                <a class="nav-link fw-semibold" href="{{ $menu['link'] }}">{{ $menu['label'] }}
                                </a>
                                @if ($menu['child'])
                                <span class="mobile-dropdown-menu ms-2" data-index="{{ $index }}">
                                    <i class="far fa-angle-down color-light-gray"></i></span>
                                @endif
                            </div>
                            @if ($menu['child'])
                            <ul class="mt-2 drop-dropdown" id="dropdown-{{ $index }}" style="display: none;">
                                @foreach ($menu['child'] as $item)
                                <li>
                                    <a class="p-2 dropdown-item fw-semibold" href="{{ $item['link'] }}">{{
                                        $item['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <ul class="flex-wrap menu_icon d-none d-xxl-flex align-items-center">
                <li>
                    <a href="#" class="menu_search me-4 position-relative fw-semibold fs-5 transitions"><i
                            class="far fa-search"></i></a>
                    <div
                        class="top-0 fp__search_form position-fixed w-100 end-0 justify-content-center align-items-center transitions vh-100">
                        <form class="top-50 start-50 position-absolute" action="{{ route('product.index') }}"
                            method="GET">
                            <span
                                class="mb-5 text-center close_search position-absolute rounded-circle fs-3 bottom-100 end-0 transitions"><i
                                    class="far fa-times"></i></span>
                            <input class="border border-0 searchinput w-100 rounded-5" type="text"
                                placeholder="Search . . ." name="search" />
                            <button
                                class="px-4 py-2 position-absolute top-50 fw-semibold rounded-5 outline-0 transitions"
                                type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon me-4 position-relative fw-semibold fs-5 transitions"><i
                            class="fas fa-shopping-basket"></i>
                        <span
                            class="text-center cart_count bg-gray position-absolute text-light fw-semibold bottom-50 end-25 rounded-circle">{{
                            count(Cart::content()) }}</span></a>
                </li>
                @php @$unseenMessages = \App\Models\Chat::where(['sender_id' => 1, 'receiver_id' => auth()->user()->id,
                'seen' => 0])->count(); @endphp
                {{-- <li>
                    <a class="mx-3 message_icon position-relative fw-semibold fs-5 transitions"
                        href="{{ route('dashboard') }}">
                        <i class="fas fa-comment-alt-dots"></i>
                        <span
                            class="text-center sunseen-message-count bg-gray position-absolute text-light fw-semibold bottom-50 end-25 ms-1 rounded-circle">{{
                            $unseenMessages > 0 ? 1 : 0 }}</span>
                    </a>
                </li> --}}

                <li>
                    <a class="ms-3 fs-5" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                </li>

                {{--
                <li>
                    <a class="common_btn d-inline ms-3 position-relative fw-semibold transitions" href="#"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">reservation</a>
                </li>
                --}}
            </ul>
        </div>
    </nav>
</section>

<div class="top-0 fp__menu_cart_area position-fixed end-0 transitions vh-100 vw-100">
    <div class="top-0 p-4 fp__menu_cart_boody position-absolute end-0 bg-light transitions">
        <div class="mb-3 fp__menu_cart_header position-relative">
            <h5 class="fw-bold">Total Item (<span class="cart_count">{{ count(Cart::content()) }}</span>)</h5>
            <span class="text-center close_cart position-absolute transitions"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart_contents">
            @foreach (Cart::content() as $cartProduct)
            @php
            $totalPrice = $cartProduct->price; // Base product price

            // Add the prices of the variants to the total price
            foreach ($cartProduct->options->product_variants as $cartProductVariant) {
            $totalPrice += $cartProductVariant['item_price'];
            }
            @endphp
            <li class="flex-wrap p-2 border d-flex justify-content-between position-relative rounded-3">
                <div class="menu_cart_img rounded-circle">
                    <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu"
                        class="img-fluid w-100">
                </div>
                <div class="menu_cart_text w-75">
                    <a class="overflow-hidden title transitions fw-semibold fs-5"
                        href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!!
                        $cartProduct->name !!}</a>
                    <p class="size">Qty: {{ $cartProduct->qty }}</p>

                    {{-- @foreach ($cartProduct->options->product_size as $size)
                    <p class="size">{{ $size['name'] }}
                        {{ $size['price'] ? '(' . currencyPosition($size['price']) . ')' : '' }}</p>
                    @endforeach

                    @foreach ($cartProduct->options->product_options as $cartProductOption)
                    <span class="extra d-block position-relative">{{ $cartProductOption['name'] }}
                        ({{ currencyPosition($cartProductOption['price']) }})
                    </span>
                    @endforeach --}}

                    {{-- @foreach ($cartProduct->options->product_variants as $cartProductVariant)
                    @php
                    $variantName = is_array($cartProductVariant['variant_name'] ?? '') ? '' :
                    htmlspecialchars($cartProductVariant['variant_name']);
                    $itemName = is_array($cartProductVariant['item_name'] ?? '') ? '' :
                    htmlspecialchars($cartProductVariant['item_name']);
                    $itemPrice = $cartProductVariant['item_price'] ?? 0;
                    @endphp --}}
                    {{-- <p class="variant">
                        {{ $variantName }}
                        @if ($itemName)
                        : {{ $itemName }}
                        @endif
                        @if ($itemPrice > 0)
                        ({{ currencyPosition($itemPrice) }})
                        @endif
                    </p>
                    @endforeach --}}

                    <p class="mt-2 price fw-semibold">{{ currencyPosition($totalPrice) }}</p>
                </div>
                <span class="text-center del_icon position-absolute top-50 rounded-circle"
                    onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i class="fal fa-times"></i></span>
            </li>
            @endforeach
        </ul>


        <p class="my-3 subtotal d-flex justify-content-between align-items-center fw-bold text-dark">SUB TOTAL <span
                class="cart_subtotal fw-bold">{{ currencyPosition(cartTotal()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}">View Cart</a>
        {{-- <a class="checkout" href="check_out.html">checkout</a> --}}
    </div>
</div>

@php
$reservationTimes = \App\Models\ReservationTime::where('status', 1)->get();
@endphp


@push('scripts')
<script>
    $(document).ready(function() {
            $('.fp__reservation_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('reservation.store') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.btn_submit').html(
                            `<span class="spinner-border text-light"> <span>`);
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.fp__reservation_form').trigger("reset");
                        $('#staticBackdrop').modal('hide');

                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                            $('.btn_submit').html(`Book Table`);
                        })
                    },
                    complete: function() {
                        $('.btn_submit').html(`Book Table`);
                    }
                })
            })
        })

        $(document).ready(function() {
            $(".mobile-dropdown-menu").click(function() {
                var index = $(this).data("index");
                $("#dropdown-" + index).slideToggle("slow");
            });
        });
</script>
@endpush
