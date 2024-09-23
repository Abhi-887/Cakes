@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                    BREADCRUMB START
                                                                ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>about US</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">about us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                    BREADCRUMB END
                                                                ==============================-->


    <!--=============================
                                                                    ABOUT PAGE START
                                                                ============================== -->
    <section class="fp__about_us py-5">
        <div class="container custom-container ">
            <div class="row">
                <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__section_heading mb_40">
                        {{-- <h4>{!! @$about->title !!}</h4> --}}
                        <h2>{!! @$about->main_title !!}</h2>

                    </div>
                    <div class="fp__about_us_text">
                        {!! @$about->description !!}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                    <section class="fp__about_video pb-5">
                        <div class="wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__about_video_bg rounded-0"
                                style="background: url({{ getYtThumbnail(@$about->video_link, 'high') }});">
                                <div class="fp__about_video_overlay">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="fp__about_video_text">
                                                <p>Watch Videos</p>
                                                <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                                    href="{{ @$about->video_link }}">
                                                    <i class=" fas fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="fp__about_">
                        <img src="{{ asset(@$about->image) }}" alt="about us" class="img-fluid w-100">
                    </div>
                </div>
                <style>
                    .fp__about_video_overlay {
                        background: url('{{ asset('frontend/images/teasere.avif') }}');
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                    }

                    /* .fp__about_video_text p {
                            color: #f86f03;
                        } */

                    .play_btn::before {
                        /* background: #f86f03; */
                        animation: play_animate 1.3s infinite;
                        -webkit-animation: play_animate 1.3s infinite;
                    }
                </style>
            </div>
        </div>
    </section>

    <!--=============================
                                            WHY CHOOSE START
                                        ==============================-->
    <!-- @include('frontend.home.components.why-choose') -->
    <!--=============================
                                            WHY CHOOSE END
                                        ==============================-->

    {{-- <section class="fp__about_video py-5">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="fp__about_video_bg" style="background: url({{ getYtThumbnail(@$about->video_link, 'high') }});">
                <div class="fp__about_video_overlay">
                    <div class="row">
                        <div class="col-12">
                            <div class="fp__about_video_text">
                                <p>Watch Videos</p>
                                <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                    href="{{ @$about->video_link }}">
                                    <i class=" fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!--=============================
                                                                TEAM START
                                                                ==============================-->
    <!--  @include('frontend.home.components.team')-->
    <!--=============================
                                                                TEAM END
                                                                ==============================-->

    <!--=============================
                                                                    COUNTER START
                                                                ==============================-->
    <!--  @include('frontend.home.components.counter')-->
    <!--=============================
                                                                        COUNTER END
                                                                ==============================-->
    <!--=============================
                                                                   TESTIMONIAL  START
                                                                ==============================-->
    <!--  @include('frontend.home.components.testimonial')-->
    <!--=============================
                                                                        TESTIMONIAL END
                                                                ==============================-->
    <!--=============================
                                                                    ABOUT PAGE END
                                                                ==============================-->
@endsection
