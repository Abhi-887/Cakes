<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="description" content="{{ config('settings.seo_description') }}">
    <meta name="keywords" content="{{ config('settings.seo_keywords') }}">

    @yield('og_metatag_section')

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('settings.seo_title') }}</title>
    <link rel="icon" type="image/png" href="{{ asset(config('settings.favicon')) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

    {{-- <style>
        :root {
            --colorPrimary: {{ config('settings.site_color') }};
        }

        .main_logo3dcake {
            width: 34% !important;
        }

        .header-top {
            background: #8badbd70;
        }

        .wrapper {
            max-width: 1500px;
        }
    </style> --}}

    <script>
        var pusherKey = "{{ config('settings.pusher_key') }}";
        var pusherCluster = "{{ config('settings.pusher_cluster') }}";
        var loggedInUserId = "{{ auth()->user()->id ?? '' }}";
    </script>

    @vite(['resources/js/app.js', 'resources/js/frontend.js'])
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>
    <div class="overlay-container d-none">
        <div class="overlay">
            <span class="loader"></span>
        </div>
    </div>
    <!--=============================
        Cart Popup Modal Start
    ==============================-->
    <div class="fp__cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body load_product_modal_body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=============================
        Cart Popup Modal End
    ==============================-->

    <!--=============================
        TOPBAR START
    ==============================-->
    <div class="header-top">
        <section class="wrapper px-3 mx-auto w-100">
            <div class="row align-items-center py-2">
                <div class="col-md-7 m-0">
                    <div class="row">
                        <div class="col-md-auto col-6">
                            <h6><b>Edinburgh:</b> 0131 337 9990</h6>
                        </div>
                        <div class="col-md-auto col-6 text-end">
                            <h6 class="text-end text-md-start"><b>Glasgow:</b> 0141 378 0027</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="text-uppercase d-none d-md-flex d-lg-flex justify-content-end m-0">
                        <li class="pe-3"><a class="text-decoration-none black text-dark" href="/login">My
                                Account</a></li>
                        <li class="pe-3"><a class="text-decoration-none black text-dark" href="/">My
                                Wishlist</a></li>
                        <li class=""><a class="text-decoration-none black text-dark" href="/admin/dashboard">Log
                                In</a></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="row d-md-none d-lg-none mt-5 px-5">
                <div class="col-6 p-0 text-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary rounded-0 bg-black dropdown-toggle w-100 menu-btn"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="menu-icon" src="image/menu(1).png" alt="">
                        </button>
                        <ul class="dropdown-menu slider w-75 p-0">
                            <li><a class="dropdown-item" href="#">MY ACCOUNT</a></li>
                            <li><a class="dropdown-item" href="#">MY WISHLIST</a></li>
                            <li><a class="dropdown-item" href="#">LOG IN</a></li>
                        </ul>
                    </div>
                </div>
                <p>hello</p>

                <div class="col-6 p-0">
                    <div class="dropdown">
                        <button class="btn btn-secondary rounded-0 bg-black dropdown-toggle w-100" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><img class="menu-icon1 p-1 "
                                src="image/cart.png" alt=""></button>

                        <ul class="dropdown-menu  p-0">
                            <li class="px-3 py-1"><a class="dropdown-item p-0" href="#">You have no
                                    items in your</a>
                            </li>
                            <li class="px-3 py-1"><a class="dropdown-item p-0" href="#">shopping
                                    cart.</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>

    <!--=============================
        TOPBAR END
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
    @include('frontend.layouts.menu')
    <!--=============================
        MENU END
    ==============================-->


    @yield('content')


    <!--=============================
        FOOTER START
    ==============================-->
    @include('frontend.layouts.footer')
    <!--=============================
        FOOTER END
    ==============================-->


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="fp__scroll_btn">
        Go To Top
    </div>
    <!--=============================
        SCROLL BUTTON END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!-- isotop js -->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!-- simplyCountdownjs -->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!-- counter up js -->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!-- nice select js -->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!-- venobox js -->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!-- sticky sidebar js -->
    <script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!-- ex zoom js -->
    <script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>

    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <!-- show dynamic validation message-->
    <script>
        toastr.options.progressBar = true;

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif

        // Set csrf at ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('.button-click').click();
        })
    </script>

    <!-- Load global js -->
    @include('frontend.layouts.global-scripts')

    @stack('scripts')
</body>

</html>
