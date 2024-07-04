<style>
    .fp__search_form {
        display: none;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
    }

    .fp__search_form.active {
        display: flex;
    }

    .searchinput {
        padding: 10px;
        font-size: 16px;
    }

    .close_search {
        cursor: pointer;
        color: white;
    }
</style>

<section class="sticky-top">
    @php
        $MainMenu = Menu::getByName('main_menu');
    @endphp

    <nav class="navbar bg-light">
        <div class="wrapper d-flex justify-content-between align-items-center mx-auto w-100 p-3">
            <div class="header-logo me-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                </a>
            </div>
            <ul class="d-none d-xxl-flex">
                {{-- Main Menu Items --}}
                @if ($MainMenu)
                    @foreach ($MainMenu as $menu)
                        <li class="nav-item mx-2">
                            <a class="nav-link fw-semibold mx-2" href="{{ $menu['link'] }}">
                                {{ $menu['label'] }}
                                @if ($menu['child'])
                                    <i class="far fa-angle-down"></i>
                                @endif
                            </a>
                            @if ($menu['child'])
                                <ul class="droap_menu position-absolute bg-light">
                                    @foreach ($menu['child'] as $item)
                                        <li>
                                            <a class="border-bottom fw-semibold p-2" href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
            <ul class="menu_icon">
                <li>
                    <a href="#" class="menu_search">Search</a>
                    <div class="fp__search_form" aria-hidden="true">
                        <form action="{{ route('product.index') }}" method="GET">
                            <span class="close_search" role="button" aria-label="Close search form">X</span>
                            <input class="searchinput" type="text" placeholder="Search..." name="search" aria-label="Search">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon">Cart ({{ count(Cart::content()) }})</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
            </ul>

            <a class="d-xxl-none d-block" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fas fa-bars fs-2 color-light-gray"></i>
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header pt-3">
                    <a class="w-50" href="{{ url('/') }}">
                        <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                    </a>
                    <button type="button" class="btn-close fs-4 background-dark-gray" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="mt-3">
                        @if ($MainMenu)
                            @foreach ($MainMenu as $index => $menu)
                                <li class="nav-item my-3">
                                    <div class="d-flex ms-2 lh-lg">
                                        <a class="nav-link fw-semibold" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                                        @if ($menu['child'])
                                            <span class="mobile-dropdown-menu ms-2" data-index="{{ $index }}">
                                                <i class="far fa-angle-down color-light-gray"></i>
                                            </span>
                                        @endif
                                    </div>
                                    @if ($menu['child'])
                                        <ul class="drop-dropdown mt-2" id="dropdown-{{ $index }}" style="display: none;">
                                            @foreach ($menu['child'] as $item)
                                                <li>
                                                    <a class="dropdown-item fw-semibold p-2" href="{{ $item['link'] }}">{{ $item['label'] }}</a>
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
        </div>
    </nav>
</section>

<div class="fp__menu_cart_area position-fixed top-0 end-0 transitions vh-100 vw-100">
    <div class="fp__menu_cart_boody position-absolute top-0 end-0 bg-light p-4 transitions">
        <div class="fp__menu_cart_header position-relative mb-3">
            <h5 class="fw-bold">Total Item (<span class="cart_count">{{ count(Cart::content()) }}</span>)</h5>
            <span class="close_cart position-absolute text-center transitions" role="button" aria-label="Close cart"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart_contents">
            @foreach (Cart::content() as $cartProduct)
                <li class="d-flex flex-wrap justify-content-between position-relative border p-2 rounded-3">
                    <div class="menu_cart_img rounded-circle">
                        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text w-75">
                        <a class="title transitions overflow-hidden fw-semibold fs-5" href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}</a>
                        <p class="size">Qty: {{ $cartProduct->qty }}</p>
                        <p class="size">{{ @$cartProduct->options->product_size['name'] }}
                            {{ @$cartProduct->options->product_size['price'] ? '(' . currencyPosition(@$cartProduct->options->product_size['price']) . ')' : '' }}
                        </p>
                        @foreach ($cartProduct->options->product_options as $cartProductOption)
                            <span class="extra d-block position-relative">{{ $cartProductOption['name'] }} ({{ currencyPosition($cartProductOption['price']) }})</span>
                        @endforeach
                        <p class="price fw-semibold mt-2">{{ currencyPosition($cartProduct->price) }}</p>
                    </div>
                    <span class="del_icon position-absolute top-50 text-center rounded-circle" role="button" aria-label="Remove product" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i class="fal fa-times"></i></span>
                </li>
            @endforeach
        </ul>
        <p class="subtotal d-flex justify-content-between align-items-center fw-bold my-3 text-dark">SUB TOTAL <span class="cart_subtotal fw-bold">{{ currencyPosition(cartTotal()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}">View Cart</a>
    </div>
</div>

@php
    $reservationTimes = \App\Models\ReservationTime::where('status', 1)->get();
@endphp

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchIcon = document.querySelector('.menu_search');
        const searchForm = document.querySelector('.fp__search_form');
        const closeSearch = document.querySelector('.close_search');

        const toggleSearchForm = (event) => {
            event.preventDefault();
            searchForm.classList.toggle('active');
            searchForm.setAttribute('aria-hidden', !searchForm.classList.contains('active'));
        };

        searchIcon.addEventListener('click', toggleSearchForm);
        closeSearch.addEventListener('click', toggleSearchForm);

        $(".mobile-dropdown-menu").click(function() {
            var index = $(this).data("index");
            $("#dropdown-" + index).slideToggle("slow");
        });
    });
</script>
@endpush
