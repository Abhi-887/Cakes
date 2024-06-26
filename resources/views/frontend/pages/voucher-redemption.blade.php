@extends('frontend.layouts.master')

@section('content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
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
    
    <!--=============================
        VOUCHER REDEMPTION PAGE END
    ==============================-->
@endsection

