<section class="sticky-top">
    @php
        $MainMenu = Menu::getByName('main_menu');
    @endphp

    <nav class="shadow-sm navbar bg-light sticky-top py-3 px-3 px-lg-5">
        <div class="row align-items-center w-100 m-0">
            <div class="col-5 col-xxl-2 header-logo p-0">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                </a>
            </div>
            <div class="col-7 col-xxl-6 p-0">
                <ul class="d-none d-xxl-flex">
                    @if ($MainMenu)
                        @foreach ($MainMenu as $menu)
                            <li class="me-4 nav-item">
                                <a class="nav-link fw-semibold" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                                @if ($menu['child'])
                                    <ul class="droap_menu position-absolute bg-light">
                                        @foreach ($menu['child'] as $item)
                                            <li class="pb-2 m-2 border-bottom">
                                                <a class="fw-normal" href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="d-xxl-none d-flex align-items-center float-end">
                    <ul class="d-flex menu_icon">
                        <li>
                            <a href="#" class="menu_search me-3 position-relative fw-semibold fs-5 transitions"><i class="transition far fa-search"></i></a>
                            <div class="top-0 fp__search_form position-fixed w-100 end-0 justify-content-center align-items-center transitions vh-100">
                                <form class="top-50 start-50 position-absolute" action="{{ route('product.index') }}" method="GET">
                                    <span class="mb-5 text-center close_search position-absolute rounded-circle fs-3 bottom-100 end-0 transitions"><i class="far fa-times"></i></span>
                                    <input class="border border-0 searchinput w-100 rounded-5" type="text" placeholder="Search . . ." name="search" />
                                    <button class="px-4 py-2 position-absolute top-50 fw-semibold rounded-5 outline-0 transitions" type="submit">Search</button>
                                </form>
                            </div>
                        </li>
                        <li>
                            <a class="cart_icon me-4 position-relative fw-semibold fs-5" href="/cart"><i class="transition fas fa-shopping-basket"></i>
                                <span class="text-center cart_count background-light-gray position-absolute text-light fw-semibold bottom-50 end-25 rounded-circle">{{ count(Cart::content()) }}</span></a>
                        </li>
                    </ul>
                    <a class="align-items-center ms-1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <i class="fas fa-bars fs-2 color-light-gray"></i>
                    </a>
                </div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="pt-3 offcanvas-header">
                        <a class="w-50" href="{{ url('/') }}">
                            <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                        </a>
                        <button type="button" class="btn-close fs-4 background-dark-gray" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="mt-3">
                            @if ($MainMenu)
                                @foreach ($MainMenu as $index => $menu)
                                    <li class="my-3 nav-item">
                                        <div class="d-flex ms-2 lh-lg">
                                            <a class="nav-link fw-semibold" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                                            @if ($menu['child'])
                                                <span class="mobile-dropdown-menu ms-2" data-index="{{ $index }}"><i class="far fa-angle-down color-light-gray"></i></span>
                                            @endif
                                        </div>
                                        @if ($menu['child'])
                                            <ul class="mt-2 drop-dropdown" id="dropdown-{{ $index }}" style="display: none;">
                                                @foreach ($menu['child'] as $item)
                                                    <li>
                                                        <a class="p-2 dropdown-item fw-semibold sub-menu" href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <hr>
                        <div class="d-flex">
                            <div class="nav-item">
                                <a class="nav-link ms-3 rounded-1 fs-5" href="{{ route('login') }}"><i class="far fa-user"></i></a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link d-inline ms-3 rounded-1 position-relative transitions fs-5" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="far fa-heart me-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 col-xxl-4 d-none d-xxl-flex p-0">
                <ul class="d-flex flex-wrap menu_icon align-items-center ms-auto">
                    <li>
                        <a href="#" class="menu_search me-4 position-relative fw-semibold fs-5 transitions"><i class="far fa-search"></i></a>
                        <div class="top-0 fp__search_form position-fixed w-100 end-0 justify-content-center align-items-center transitions vh-100">
                            <form class="top-50 start-50 position-absolute" action="{{ route('product.index') }}" method="GET">
                                <span class="mb-5 text-center close_search bg-light position-absolute rounded-circle fs-3 bottom-100 end-0 transitions"><i class="far fa-times"></i></span>
                                <input class="border border-0 searchinput w-100 rounded-5" type="text" placeholder="Search . . ." name="search" />
                                <button class="px-4 py-2 text-white background-light-gray position-absolute top-50 fw-semibold rounded-5 outline-0 transitions" type="submit">Search</button>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a class="cart_icon me-4 position-relative fw-semibold fs-5 transitions" href="javascript:;"><i class="fas fa-shopping-basket"></i>
                            <span class="text-center cart_count background-light-gray position-absolute text-light fw-semibold bottom-50 end-25 rounded-circle">{{ count(Cart::content()) }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border px-3 py-2 ms-3 rounded-1 bg-dark-gray" href="{{ route('login') }}"><i class="far fa-user me-3"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border px-3 py-2 ms-3 rounded-1 position-relative transitions bg-dark-gray" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="far fa-heart me-3"></i>Wishlist</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<div class="top-0 fp__menu_cart_area position-fixed end-0 transitions vh-100 vw-100">
    <div class="top-0 p-4 fp__menu_cart_boody position-absolute end-0 bg-light transitions">
        <div class="mb-3 fp__menu_cart_header position-relative">
            <h5 class="fw-bold">Total Item (<span class="cart_count">{{ count(Cart::content()) }}</span>)</h5>
            <span class="text-center text-white background-light-gray close_cart position-absolute transitions"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart_contents">
            @foreach (Cart::content() as $cartProduct)
                @php
                    $totalPrice = $cartProduct->price;
                    foreach ($cartProduct->options->product_variants as $cartProductVariant) {
                        $totalPrice += $cartProductVariant['item_price'];
                    }
                @endphp
                <li class="flex-wrap p-2 border d-flex justify-content-between position-relative rounded-3">
                    <div class="menu_cart_img rounded-circle">
                        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid rounded-circle">
                    </div>
                    <div class="menu_cart_text w-75">
                        <a class="overflow-hidden title transitions fw-semibold fs-5" href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}</a>
                        <p class="d-flex menu_cart_variant_list">
                            @foreach ($cartProduct->options->product_variants as $cartProductVariant)
                                <span class="badge rounded-pill border-0 text-light bg-dark-gray mx-1 fw-normal">{{ $cartProductVariant['variant_name'] }}:</span>
                                <span class="badge rounded-pill border-0 text-light bg-dark-gray fw-normal">{{ $cartProductVariant['name'] }}</span>
                            @endforeach
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-normal">{{ $cartProduct->qty }} × {{ priceFormat($totalPrice) }}</span>
                            <span class="menu_cart_product_price fw-semibold">{{ priceFormat($cartProduct->qty * $totalPrice) }}</span>
                        </div>
                    </div>
                    <a href="{{ route('cart.delete', $cartProduct->rowId) }}" class="p-2 fs-5 text-light background-light-gray rounded-circle cart-product-delete position-absolute top-0 start-100"><i class="far fa-trash-alt"></i></a>
                </li>
            @endforeach
        </ul>
        <div class="mb-2 row justify-content-center mt-4 position-relative">
            <h5 class="col-12 fw-bold">Total Amount: {{ Cart::subtotal() }}</h5>
            <a href="/cart" class="d-inline-block btn btn-dark btn-md px-4 py-2 mt-3">Checkout</a>
        </div>
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
