@extends('frontend.layouts.master')

@section('content')
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
        <div class="row justify-content-center align-items-center">
            <div class="col-6 text-center">
                <a class="" href="{{ url('/') }}">
                    <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                </a>
                <h5 class="feedback-title">How was 3D Cakes?</h5>
                <p>We appreciate feedback about your experience.</p>

                <div class="mb-4">
                    <h6>How likely are you to recommend 3D Cakes to others?</h6>
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
                    <h6>Which Services Did You Use? *</h6>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off">Cakes Store
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off">Sugarcraft School
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off">Online Tutorials
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off">David Ducan Cakes Supplies
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="checkbox" autocomplete="off">24 Hour Deals
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


    <!--=============================
                                    Customer-Feedback  PAGE END
                                ==============================-->
@endsection
