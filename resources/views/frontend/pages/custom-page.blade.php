@extends('frontend.layouts.master')

@section('content')
    {{-- <style>
        .custom-container {
            max-width: 1200px !important;
        }
    </style> --}}
    <!--=============================
                                                    BREADCRUMB START
                                                ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>{{ $page->name }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">{{ $page->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                    BREADCRUMB END
                                                ==============================-->


    <!--================================
                                                    Trams And Condtions START
                                                =================================-->
    <section class="fp__terms_condition py-5">
        <div class="container custom-container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__career_det_text">
                        {!! $page->content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================================
                                                    Trams And Condtions END
                                                =================================-->
@endsection
