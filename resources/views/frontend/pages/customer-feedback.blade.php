@extends('frontend.layouts.master')

@section('content')

<style>
.form-control {
  -webkit-appearance: button;
  -moz-appearance: button;
}
.fa-star {
    font-size: 24px;
    color: #ddd;
}

.fa-star:hover,
.fa-star:hover ~ .fa-star,
input[type="radio"]:checked ~ .fa-star {
    color: orange;
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
        <h2>Feedback</h2>
        <p>Please fill out our feedback form to help us improve our services or simply let us know where we're doing well.</p>
        <form class="" action="{{route('customer-feedback.store')}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="name" class="mb-1">Your Name *</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mt-2">
                <label for="rating" class="mb-1">Star Rating *</label>
                <div id="rating" name="rating">
                    <input type="radio" id="star1" name="rating" value="1" class="d-none">
                    <label for="star1" class="fa fa-star"></label>
                    <input type="radio" id="star2" name="rating" value="2" class="d-none">
                    <label for="star2" class="fa fa-star"></label>
                    <input type="radio" id="star3" name="rating" value="3" class="d-none">
                    <label for="star3" class="fa fa-star"></label>
                    <input type="radio" id="star4" name="rating" value="4" class="d-none">
                    <label for="star4" class="fa fa-star"></label>
                    <input type="radio" id="star5" name="rating" value="5" class="d-none">
                    <label for="star5" class="fa fa-star"></label>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="email" class="mb-1">Your Email Address *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mt-2">
                <label  class="mb-1">Which service(s) did you use? *</label>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" value="Cakes Store" id="cakesStore" name="services[]">
                    <label class="form-check-label ms-2" for="cakesStore">Cakes Store</label>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" value="Sugarcraft School" id="sugarcraftSchool" name="services[]">
                    <label class="form-check-label ms-2" for="sugarcraftSchool">Sugarcraft School</label>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" value="Online Tutorials" id="onlineTutorials" name="services[]">
                    <label class="form-check-label ms-2" for="onlineTutorials">Online Tutorials</label>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" value="David Duncan Cake Supplies" id="davidDuncan" name="services[]">
                    <label class="form-check-label ms-2" for="davidDuncan">David Duncan Cake Supplies</label>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" value="24 Hour Deals" id="deals" name="services[]">
                    <label class="form-check-label ms-2" for="deals">24 Hour Deals</label>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="store" class="mb-1">Which store did you use? *</label>
                <select class="form-control" id="store" name="store" required>
                    <option value="Edinburgh">Edinburgh</option>
                    <option value="Glasgow">Glasgow</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="feedback" class="mb-1">Your Feedback *</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
            </div>
            <div class="form-group form-check mt-2">
                <input type="checkbox" class="form-check-input" id="privacyPolicy" name="privacyPolicy" required>
                <label class="form-check-label ms-2" for="privacyPolicy">I have read and accepted the <a href="#">privacy policy</a> *</label>
            </div>
            <div class="mt-5"><button type="submit" class="btn btn-primary">Submit</button></div>
        </form>
    </div>





    <!--=============================
        Customer-Feedback  PAGE END
    ==============================-->
@endsection
