@extends('frontend.layouts.master')

@section('content')
    <style>
        .star-rating .fa-star {
            color: #f2b600;
        }

        .fa-star-o {
            color: #d3d3d3;
        }

        .rating-text {
            display: inline-block;
            width: 100%;
            text-align: center;
        }
    </style>
    <!--=============================
                    BREADCRUMB START
                ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Customer Feedback</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">Customer Feedback</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                    BREADCRUMB END
                ==============================-->
    <!--=============================
                   Customer-Feedback PAGE START
                ==============================-->


    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Resy_logo.svg/1200px-Resy_logo.svg.png"
                    class="mb-3" alt="RESY" style="max-width: 100px;">
                <h5 class="card-title">How was Tin Shed Garden Cafe?</h5>
                <p>We appreciate feedback about your experience.</p>

                <div class="mb-4">
                    <h6>How likely are you to recommend Tin Shed Garden Cafe to others?</h6>
                    <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="rating" class="rating-value" value="1">
                    </div>
                    <div class="rating-text mt-2">
                        <span>Not Likely</span>
                        <span class="float-right">Very Likely</span>
                    </div>
                </div>

                <div class="mb-4">
                    <h6>What's driving your review? (optional)</h6>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off"> Food
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off"> Service
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off"> Vibe
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off"> Other
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <h6>Anything else? (optional)</h6>
                    <textarea class="form-control" rows="3" placeholder="Share your experience or offer suggestions to the staff..."></textarea>
                </div>

                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var $star_rating = $('.star-rating .fa');

            var SetRatingStar = function() {
                return $star_rating.each(function() {
                    if (parseInt($(this).siblings('input.rating-value').val()) >= parseInt($(this).data(
                            'rating'))) {
                        return $(this).removeClass('fa-star-o').addClass('fa-star');
                    } else {
                        return $(this).removeClass('fa-star').addClass('fa-star-o');
                    }
                });
            };

            $star_rating.on('click', function() {
                $(this).siblings('input.rating-value').val($(this).data('rating'));
                return SetRatingStar();
            });

            SetRatingStar();
        });
    </script>

    <!--=============================
                    Customer-Feedback  PAGE END
                ==============================-->
@endsection
