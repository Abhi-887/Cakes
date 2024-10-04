<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<style>
    .testimonial {
        /* background: #262626; */
        height: 300px;
    }

    /* .testimonial .stars {
        color: #ff9800;
    } */

    .testimonial .profile img {
        width: 50px;
        height: 50px;
    }

    .testimonial .profile .name {
        font-weight: bold;
        /* color: #333; */
    }

    .testimonial .profile .company {
        font-size: 12px;
        /* color: #999; */
    }

    .slick-dots li button::before {
        font-size: 14px !important;
    }

    /* .slick-dots li.slick-active button::before {
        color: #000000 !important;
    }

    .slick-dots li button:hover::before {
        color: #000000 !important;
    } */

    .testimonialslickslider .slick-next,
    .testimonialslickslider .slick-prev {
        display: none !important;
    }

    .testimonial-content {
        min-height: 120px;
        max-height: 120px;
        overflow-y: auto;
        /* scrollbar-color: #262626 #ff9800; */
    }

    .testimonial-content::-webkit-scrollbar {
        width: 5px;
    }
</style>

<div class="container pt-4 pb-5">
    <div class="row wow fadeInUp" data-wow-duration="1s">
        <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
            <div class="fp__section_heading">
                {{-- @if (!empty($sectionTitles['testimonial_top_title']))
                    <h4>{{ $sectionTitles['testimonial_top_title'] }}</h4>
                @endif --}}
                @if (!empty($sectionTitles['testimonial_main_title']))
                    <h2>{{ $sectionTitles['testimonial_main_title'] }}</h2>
                @endif
                {{-- <span>
                    <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                </span> --}}
                @if (!empty($sectionTitles['testimonial_sub_title']))
                    <p class="color-light-gray">{{ $sectionTitles['testimonial_sub_title'] }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="testimonial-slider testimonialslickslider">
        <div class="row my-2">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4 mb-4">
                    <div class="testimonial rounded-3 m-3 p-5">
                        <div class="stars">
                            @for ($i = 1; $i <= $testimonial->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        {{-- <div class="text my-4 text-secondary">
                            <small>{{ $testimonial->review }}</small>
                        </div> --}}
                        <div class="profile d-flex align-items-center">
                            <div class="">
                                {{-- <img class="rounded-circle me-3" src="{{ asset($testimonial->image) }}"
                                    alt="Profile Picture"> --}}
                                <h6 class="text-light fw-semibold my-3 ">{{ $testimonial->name }}</h6>
                                <p class="testimonial-content text-light fs-6 m-0 pe-3">{{ $testimonial->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Slick Carousel JS -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('.testimonial-slider .row').slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
