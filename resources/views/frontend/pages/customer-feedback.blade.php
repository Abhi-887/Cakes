@extends('frontend.layouts.master')

@section('content')
    <style>
        .form-check-input:checked {
            background-color: #788a9f !important;
            border-color: #4a5f76 !important;
        }

        .form-check-input {
            background-size: 25px !important;
            height: 2.5em !important;
        }

        .formbg {
            background-color: #f7f8fd !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
        }

        .fa-star::before {
            font-size: 25px !important;
        }

        .feedbackbutton {
            background: #4b637f;
            color: white;
        }

        .feedbackbutton:hover {
            background: #8eabbf;
            color: white;
        }

        .form-control {
            -webkit-appearance: button;
            -moz-appearance: button;
        }

        .fa-star {
            color: rgb(245, 156, 40);
            cursor: pointer;
        }

        .fa-star:hover,
        .fa-star:hover~.fa-star,
        input[type="radio"]:checked~.fa-star {
            color: rgb(255, 255, 255);
        }
    </style>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                       ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
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


    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="formbg p-4">
                    <div class="text-center">
                        <a class="" href="{{ url('/') }}">
                            <img src="{{ asset('uploads/web-logo1.png') }}" alt="3D-Cakes Logo" class="img-fluid" />
                        </a>
                    </div>
                    <div class="my-3">
                        <h5 class="feedback-title mb-2 text-center">How was 3D Cakes?</h5>
                        <p class="text-center">We appreciate feedback about your experience.</p>
                    </div>
                    <hr>
                    <form action="{{ route('customer-feedback.store') }}" method="POST">
                        @csrf
                        <div class="my-4">
                            <h6 class="text-center">How likely are you to recommend 3D Cakes to others?</h6>
                            <div class="form-group mt-2 text-center">
                                <h6 class="my-4">Star Rating *</h6>
                                <div id="rating" name="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="star{{ $i }}" name="rating"
                                            value="{{ $i }}" class="d-none">
                                        <label for="star{{ $i }}" class="fa fa-star"
                                            aria-label="{{ $i }} stars"></label>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <h6 class="my-4">Your Name *</h6>
                        <div class="fp__contact_form_input">
                            <span><i class="fal fa-user-alt"></i></span>
                            <input type="text" placeholder="Name" class="form-control" id="name" name="name"
                                required>
                        </div>

                        <h6 class="my-4">Your Email Address *</h6>
                        <div class="fp__contact_form_input">
                            <span><i class="fal fa-envelope"></i></span>
                            <input type="email" placeholder="Email" class="form-control" id="email" name="email"
                                required>
                        </div>

                        <h6 class="my-4">Which store did you use? *</h6>
                        <div class="fp__contact_form_input form-group mt-2">
                            <span><i class="far fa-caret-square-down"></i></span>
                            <select class="form-control" id="store" name="store" required>
                                <option value="Edinburgh">Select Store</option>
                                <option value="Edinburgh">Edinburgh</option>
                                <option value="Glasgow">Glasgow</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <h6 class="my-4">Which Services Did You Use? *</h6>
                            <div class="form-group mt-2">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input rounded-circle" type="checkbox" value="Cakes Store"
                                        id="cakesStore" name="services[]">
                                    <label class="form-check-label ms-2" for="cakesStore">Cakes Store</label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input rounded-circle" type="checkbox" value="Sugarcraft School"
                                        id="sugarcraftSchool" name="services[]">
                                    <label class="form-check-label ms-2" for="sugarcraftSchool">Sugarcraft School</label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input rounded-circle" type="checkbox" value="Online Tutorials"
                                        id="onlineTutorials" name="services[]">
                                    <label class="form-check-label ms-2" for="onlineTutorials">Online Tutorials</label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input rounded-circle" type="checkbox"
                                        value="David Duncan Cake Supplies" id="davidDuncan" name="services[]">
                                    <label class="form-check-label ms-2" for="davidDuncan">David Duncan Cake
                                        Supplies</label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input rounded-circle" type="checkbox" value="24 Hour Deals"
                                        id="deals" name="services[]">
                                    <label class="form-check-label ms-2" for="deals">24 Hour Deals</label>
                                </div>
                            </div>
                        </div>

                        <h6 class="my-4">Your Feedback</h6>
                        <div class="fp__contact_form_input textarea">
                            <span><i class="fal fa-book"></i></span>
                            <textarea rows="8" placeholder="Share your experience or offer suggestions to us..." name="feedback"></textarea>
                        </div>

                        <div class="form-group form-check mt-2 d-flex align-items-center">
                            <input type="checkbox" class="form-check-input" id="privacyPolicy" name="privacyPolicy"
                                required>
                            <label class="form-check-label ms-2" for="privacyPolicy">I have read and accepted the <a
                                    href="#">privacy policy</a> *</label>
                        </div>
                        <div class="text-center">
                            <button class="feedbackbutton fw-semibold rounded-5 px-5 py-2 transitions mt-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--=============================
            Customer-Feedback  PAGE END
        ==============================-->
@endsection
