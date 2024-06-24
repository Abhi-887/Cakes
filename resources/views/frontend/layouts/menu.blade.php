<section class="sticky-top">
    @php
        $MainMenu = Menu::getByName('main_menu');
    @endphp

    <nav class="navbar bg-light">
        <div class="wrapper d-flex justify-content-between align-items-center mx-auto w-100 p-3">
            <div class="header-logo">
                <a class="" href="{{ url('/') }}">
                    <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                </a>
            </div>
            <ul class="d-none d-xxl-flex">
                {{-- Main Menu Items --}} @if ($MainMenu)
                    @foreach ($MainMenu as $menu)
                        <li class="nav-item mx-2">
                            <a class="nav-link fw-semibold mx-2" href="{{ $menu['link'] }}">{{ $menu['label'] }}
                                @if ($menu['child'])
                                    <i class="far fa-angle-down"></i>
                                @endif
                            </a>
                            @if ($menu['child'])
                                <ul class="droap_menu position-absolute bg-light">
                                    @foreach ($menu['child'] as $item)
                                        <li>
                                            <a class="border-bottom fw-semibold p-2"
                                                href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>

            <a class="ms-auto d-xxl-none d-block" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <i class="fas fa-bars fs-2 color-light-gray"></i>
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header pt-3">
                    <a class="w-50" href="{{ url('/') }}">
                        <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                    </a>
                    <button type="button" class="btn-close fs-4 color-light-gray" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="mt-3">
                        @if ($MainMenu)
                            @foreach ($MainMenu as $index => $menu)
                                <li class="nav-item my-3">
                                    <div class="d-flex ms-2">
                                        <a class="nav-link fw-semibold" href="{{ $menu['link'] }}">{{ $menu['label'] }}
                                        </a>
                                        @if ($menu['child'])
                                            <span class="mobile-dropdown-menu ms-2" data-index="{{ $index }}">
                                                <i class="far fa-angle-down"></i></span>
                                        @endif
                                    </div>
                                    @if ($menu['child'])
                                        <ul class="drop-dropdown mt-2" id="dropdown-{{ $index }}"
                                            style="display: none;">
                                            @foreach ($menu['child'] as $item)
                                                <li>
                                                    <a class="dropdown-item fw-semibold p-2"
                                                        href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <ul class="d-flex menu_icon mt-4">
                        <li>
                            <a class="fs-5 ms-2" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                        </li>
                        <li>
                            <a class="cart_icon mx-4 position-relative fw-semibold fs-5 transitions"><i
                                    class="fas fa-shopping-basket"></i>
                                <span
                                    class="cart_count bg-gray position-absolute text-light fw-semibold text-center bottom-50 end-25 rounded-circle">{{ count(Cart::content()) }}</span></a>
                        </li>
                        @php @$unseenMessages = \App\Models\Chat::where(['sender_id' => 1, 'receiver_id' => auth()->user()->id, 'seen' => 0])->count(); @endphp
                        <li>
                            <a class="message_icon mx-4 position-relative fw-semibold fs-5 transitions"
                                href="{{ route('dashboard') }}">
                                <i class="fas fa-comment-alt-dots"></i>
                                <span
                                    class="sunseen-message-count bg-gray position-absolute text-light fw-semibold text-center bottom-50 end-25 ms-1 rounded-circle">{{ $unseenMessages > 0 ? 1 : 0 }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu_search mx-4 position-relative fw-semibold fs-5 transitions"><i
                                    class="far fa-search"></i></a>
                            <div
                                class="fp__search_form position-fixed w-100 top-0 end-0 justify-content-center align-items-center transitions vh-100">
                                <form class="top-50 start-50 position-absolute" action="{{ route('product.index') }}"
                                    method="GET">
                                    <span
                                        class="close_search position-absolute text-center rounded-circle fs-3 mb-5 bottom-100 end-0 transitions"><i
                                            class="far fa-times"></i></span>
                                    <input class="searchinput w-100 border border-0 rounded-5" type="text"
                                        placeholder="Search . . ." name="search" />
                                    <button
                                        class="position-absolute top-50 fw-semibold rounded-5 px-4 py-2 outline-0 transitions"
                                        type="submit">
                                        Search
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="menu_icon d-none d-xxl-flex align-items-center flex-wrap">
                <li>
                    <a href="#" class="menu_search mx-3 position-relative fw-semibold fs-5 transitions"><i
                            class="far fa-search"></i></a>
                    <div
                        class="fp__search_form position-fixed w-100 top-0 end-0 justify-content-center align-items-center transitions vh-100">
                        <form class="top-50 start-50 position-absolute" action="{{ route('product.index') }}"
                            method="GET">
                            <span
                                class="close_search position-absolute text-center rounded-circle fs-3 mb-5 bottom-100 end-0 transitions"><i
                                    class="far fa-times"></i></span>
                            <input class="searchinput w-100 border border-0 rounded-5" type="text"
                                placeholder="Search . . ." name="search" />
                            <button
                                class="position-absolute top-50 fw-semibold rounded-5 px-4 py-2 outline-0 transitions"
                                type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon mx-3 position-relative fw-semibold fs-5 transitions"><i
                            class="fas fa-shopping-basket"></i>
                        <span
                            class="cart_count bg-gray position-absolute text-light fw-semibold text-center bottom-50 end-25 rounded-circle">{{ count(Cart::content()) }}</span></a>
                </li>
                @php @$unseenMessages = \App\Models\Chat::where(['sender_id' => 1, 'receiver_id' => auth()->user()->id, 'seen' => 0])->count(); @endphp
                <li>
                    <a class="message_icon mx-3 position-relative fw-semibold fs-5 transitions"
                        href="{{ route('dashboard') }}">
                        <i class="fas fa-comment-alt-dots"></i>
                        <span
                            class="sunseen-message-count bg-gray position-absolute text-light fw-semibold text-center bottom-50 end-25 ms-1 rounded-circle">{{ $unseenMessages > 0 ? 1 : 0 }}</span>
                    </a>
                </li>

                <li>
                    <a class="ms-3 fs-5" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                </li>

                {{--
                <li>
                    <a
                    class="common_btn d-inline ms-3 position-relative fw-semibold transitions"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop"
                    >reservation</a
                    >
                </li>
                --}}
            </ul>
        </div>
    </nav>
</section>

<div class="fp__menu_cart_area position-fixed top-0 end-0 transitions vh-100 vw-100">
    <div class="fp__menu_cart_boody position-absolute top-0 end-0 bg-light p-4 transitions">
        <div class="fp__menu_cart_header position-relative mb-3">
            <h5 class="fw-bold">Total Item (<span class="cart_count">{{ count(Cart::content()) }}</span>)</h5>
            <span class="close_cart position-absolute text-center transitions"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart_contents">
            @foreach (Cart::content() as $cartProduct)
                <li class="d-flex flex-wrap justify-content-between position-relative border p-2 rounded-3">
                    <div class="menu_cart_img rounded-circle">
                        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu"
                            class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text w-75">
                        <a class="title transitions overflow-hidden fw-semibold fs-5"
                            href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}
                        </a>
                        <p class="size">Qty: {{ $cartProduct->qty }}</p>

                        <p class="size">{{ @$cartProduct->options->product_size['name'] }}
                            {{ @$cartProduct->options->product_size['price'] ? '(' . currencyPosition(@$cartProduct->options->product_size['price']) . ')' : '' }}
                        </p>

                        @foreach ($cartProduct->options->product_options as $cartProductOption)
                            <span class="extra d-block position-relative">{{ $cartProductOption['name'] }}
                                ({{ currencyPosition($cartProductOption['price']) }})
                            </span>
                        @endforeach

                        <p class="price fw-semibold mt-2">{{ currencyPosition($cartProduct->price) }}</p>
                    </div>
                    <span class="del_icon position-absolute top-50 text-center rounded-circle"
                        onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i
                            class="fal fa-times"></i></span>
                </li>
            @endforeach

        </ul>
        <p class="subtotal d-flex justify-content-between align-items-center fw-bold my-3 text-dark">SUB TOTAL <span
                class="cart_subtotal fw-bold">{{ currencyPosition(cartTotal()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}">View Cart</a>
        {{-- <a class="checkout" href="check_out.html">checkout</a> --}}
    </div>
</div>

@php
    $reservationTimes = \App\Models\ReservationTime::where('status', 1)->get();
@endphp
{{-- <div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border border-0 rounded-2">
                <div class="modal-header border border-0">
                    <h1 class="modal-title text-center w-100 fw-bold fs-5" id="staticBackdropLabel">Book a Table
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="fp__reservation_form" action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <input class="reservation_input" type="text" placeholder="Name" name="name">
                        <input class="reservation_input" type="text" placeholder="Phone" name="phone">
                        <input class="reservation_input" type="date" name="date">
                        <select class="reservation_input nice-select" name="time">
                            <option value="">select time</option>
                            @foreach ($reservationTimes as $time)
                                <option value="{{ $time->start_time }}-{{ $time->end_time }}">
                                    {{ $time->start_time }} to {{ $time->end_time }}</option>
                            @endforeach
                        </select>
                        <input class="reservation_input" type="text" placeholder="Persons" name="persons">
                        <button type="submit" class="btn_submit">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
