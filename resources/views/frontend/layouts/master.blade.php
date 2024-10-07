<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="description" content="{{ config('settings.seo_description') }}">
    <meta name="keywords" content="{{ config('settings.seo_keywords') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <link rel="icon" href="{{ asset('uploads/favicon.png') }}" type="image/x-icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css"> --}}



    <!-- Your code -->

    {{-- <style>
        :root {
            --colorPrimary: {
                    {
                    config('settings.site_color')
                }
            }

            ;
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

    {{-- @vite(['resources/js/app.js', 'resources/js/frontend.js']) --}}
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
        <section class="container-fluid px-3 px-lg-5 mx-auto w-100">
            <div class="py-2 row align-items-center">
                <div class="m-0 col-md-7">
                    <div class="row">
                        <div class="text-center col-md-auto col-12">
                            <p class="text-white mb-0 fs-14"><span>Edinburgh:</span> 0131 337 9990 </p>
                        </div>

                        <div class="text-center col-md-auto col-12 ">
                            <p class="text-white mb-0 fs-14"><span>Glasgow:</span> 0141 378 0027</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="m-0 d-none d-md-flex d-lg-flex justify-content-end">
                        <li class="pe-3"><a class="text-decoration-none text-white fs-14" href="/login">My
                                Account</a></li>
                        <li class="pe-3"><a class="text-decoration-none text-white fs-14" href="/">My
                                Wishlist</a></li>
                        <li class=""><a class="text-decoration-none text-white fs-14" href="/admin/dashboard">Log
                                In</a></li>
                    </ul>
                </div>
            </div>


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
    <div class="fp__scroll_btn text-white background-light-gray">
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/magiczoomplus/magiczoomplus.js" type="text/javascript"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery.elevatezoom@3.0.8/jquery.elevateZoom.min.js"></script> --}}

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>


    {{-- <script>

        document.addEventListener('DOMContentLoaded', (event) => {
            const quoteForm = document.getElementById('quote-form');

            quoteForm.addEventListener('submit', function(event) {
                // Validate the form
                if (!validateForm()) {
                    event.preventDefault(); // Prevent form submission
                }
            });

            function validateForm() {
                // Check if reCAPTCHA is filled
                if (grecaptcha.getResponse() === "") {
                    alert("Please fill out the reCAPTCHA.");
                    return false;
                }

                // Add more validation checks if necessary
                // For example, check if other fields are filled out correctly

                return true;
            }
        });
    </script> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
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
