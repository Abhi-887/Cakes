<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial Slider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        .testimonial {
            background: #262626;
            height: 300px;
        }

        .testimonial .stars {
            color: #ff9800;
        }

        .testimonial .profile img {
            width: 50px;
            height: 50px;
        }

        .testimonial .profile .name {
            font-weight: bold;
            color: #333;
        }

        .testimonial .profile .company {
            font-size: 12px;
            color: #999;
        }

        .swiper-pagination-bullet {
            font-size: 14px !important;
            background: #ff9800;
            opacity: 0.6;
        }

        .swiper-pagination-bullet-active {
            background: #000000 !important;
        }

        .testimonial-content {
            min-height: 120px;
            max-height: 120px;
            overflow-y: auto;
            scrollbar-color: #262626 #ff9800;
        }

        .testimonial-content::-webkit-scrollbar {
            width: 5px;
        }
    </style>
</head>
<body>
    <div class="container pt-4 pb-5">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading">
                    @if (!empty($sectionTitles['testimonial_main_title']))
                        <h2>{{ $sectionTitles['testimonial_main_title'] }}</h2>
                    @endif
                    @if (!empty($sectionTitles['testimonial_sub_title']))
                        <p>{{ $sectionTitles['testimonial_sub_title'] }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Swiper Container -->
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial rounded-3 m-3 p-5">
                            <div class="stars">
                                @for ($i = 1; $i <= $testimonial->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <div class="profile d-flex align-items-center">
                                <div class="">
                                    <h4 class="text-light fw-semibold my-3 fs-4">{{ $testimonial->name }}</h4>
                                    <p class="testimonial-content text-light fs-6 m-0 pe-3">{{ $testimonial->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination (dots) -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.testimonial-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1400: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                991: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });
    </script>
</body>
</html>
