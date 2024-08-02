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

    <!-- Load CSS from CDN where possible -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfFixUqAAAAACmWba-9CvlGo4ieeAU2wHhtI-eI"></script>

    <script>
        var pusherKey = "{{ config('settings.pusher_key') }}";
        var pusherCluster = "{{ config('settings.pusher_cluster') }}";
        var loggedInUserId = "{{ auth()->user()->id ?? '' }}";
    </script>

    @vite(['resources/js/app.js', 'resources/js/frontend.js'])
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
                    <div class="modal-body load_product_modal_body"></div>
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
        <section class="px-3 mx-auto wrapper w-100">
            <div class="py-2 row align-items-center">
                <div class="m-0 col-md-7">
                    <div class="row">
                        <div class="text-center col-md-auto col-12">
                            <h6><b>Edinburgh:</b> 0131 337 9990 </h6>
                        </div>
                        <div class="text-center col-md-auto col-12 ">
                            <h6><b>Glasgow:</b> 0141 378 0027</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="m-0 text-uppercase d-none d-md-flex d-lg-flex justify-content-end">
                        <li class="pe-3"><a class="text-decoration-none black text-dark" href="/login">My Account</a>
                        </li>
                        <li class="pe-3"><a class="text-decoration-none black text-dark" href="/">My
                                Wishlist</a></li>
                        <li class=""><a class="text-decoration-none black text-dark" href="/admin/dashboard">Log
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
    <div class="fp__scroll_btn">
        Go To Top
    </div>
    <!--=============================
        SCROLL BUTTON END
    ==============================-->

    <!--jquery library js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--bootstrap js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- main/custom js -->
    <script src="{{ mix('js/main.js') }}"></script>

    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {
                action: 'submit'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const quoteForm = document.getElementById('quote-form');

            quoteForm.addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                }
            });

            function validateForm() {
                if (grecaptcha.getResponse() === "") {
                    alert("Please fill out the reCAPTCHA.");
                    return false;
                }
                return true;
            }
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        toastr.options.progressBar = true;

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif

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
