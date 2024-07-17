@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                            BREADCRUMB START
                        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>Voucher Redemption</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">voucher-redemption</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                            BREADCRUMB END
                        ==============================-->


    <!--=============================
                            VOUCHER REDEMPTION PAGE START
                        ==============================-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <a href=""><img src="{{ asset('frontend/images/flavour-samples-banner-with-button.jpg') }}"
                                class="img-fluid" alt="flavour-samples-banner"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <a href=""><img
                                src="{{ asset('frontend/images/groom-bride-prepared-cut-wedding-cake.jpg') }}"
                                class="img-fluid" alt="groom-bride-prepared-cut-wedding-cake"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                            VOUCHER REDEMPTION PAGE END
                        ==============================-->
@endsection
