@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>Contact With Us</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="javascript:;">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    BREADCRUMB END
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->


    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    CONTACT PAGE START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->


    <style>
        .contact-card {
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
            transition: transform 0.6s;
            display: flex;
            flex-direction: column;
            /* background-color: #f7f8fd !important; */
        }

        .contact-card img {
            transition: transform 0.5s;
        }

        .contact-card:hover img,
        .contact-card2:hover img {
            transform: scale(1.1);
            border-radius: 20px;
            transition: transform 0.5s;
        }

        .location-icon {
            width: 50px;
            height: 50px;
            transition: 0.4s;
            /* background: #4b637f !important; */
        }

        /* .formbg {
                        background-color: #f7f8fd !important;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
                    } */

        .contact-social-icons i:hover {
            /* color: #788a9f !important; */
            transition: transform 0.6s;
        }

        .rotate90 {
            rotate: 90deg;
        }
    </style>

    <div class="container py-5">
        <h4 class="fw-bold color-light-gray">3D Cakes Edinburgh</h4>
        <div class="row mt-4">
            <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column">
                <div class="contact-card rounded-3 p-4 d-flex flex-column flex-grow-1">
                    <div class="contact-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Address</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-map-marker-alt text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">{!! @$contact->address !!}</p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3 align-self-stretch mt-auto">
                        <iframe src="{{ @$contact->map_link }}" style="border:0; width:100%; height:100%;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column">
                <div class="contact-card rounded-3 p-4 d-flex flex-column flex-grow-1">
                    <div class="contact-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Call Now</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-phone text-light rotate90"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">{!! @$contact->phone_one !!}</p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3 align-self-stretch mt-auto">
                        <img src="{{ asset('storage/' . @$contact->phone_image) }}" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column">
                <div class="contact-card rounded-3 p-4 d-flex flex-column flex-grow-1">
                    <div class="contact-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Email Us</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-paper-plane text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">{!! @$contact->mail_one !!}</p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3 align-self-stretch mt-auto">
                        <img src="{{ asset('storage/' . @$contact->email_image) }}" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="contact-card opening-bg py-5 px-3" style= "background-image: url({{ asset('uploads/patterned200.png') }});">
        <div class="container">
            <h2 class="text-center text-white fw-bold">Opening Times</h2>
            <div class="row pt-5">
                <div class="col-lg-4 d-flex justify-content-center text-center text-md-start my-2">
                    <div>
                        <h5 class="text-white mb-3 fw-bold"> {!! @$contact->title_one !!}</h5>
                        <p class="text-white">{!! @$contact->Description_one !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center text-center text-md-start my-2">
                    <div>
                        <h5 class="text-white mb-3 fw-bold">{!! @$contact->title_two !!}</h5>
                        <p class="text-white">{!! @$contact->Description_two !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center text-center text-md-start my-2">
                    <div>
                        <h5 class="text-white mb-3 fw-bold">{!! @$contact->title_three !!}</h5>
                        <p class="text-white">{!! @$contact->Description_three !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <h4 class="fw-bold color-light-gray">3D Cakes Milngavie</h4>
        <div class="row mt-4">
            <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column">
                <div class="contact-card rounded-3 p-4 d-flex flex-column flex-grow-1">
                    <div class="contact-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Address</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-map-marker-alt text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">38 Station Road G62 8AB 6AW</p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3 align-self-stretch">
                        <iframe src="{{ @$contact2->map_link }}" style="border:0; width:100%; height:100%;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column">
                <div class="contact-card rounded-3 p-4 d-flex flex-column flex-grow-1">
                    <div class="contact-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Call Now</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-phone text-light rotate90"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">{!! @$contact2->phone_one !!}</p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3 align-self-stretch">
                        <img src="{{ asset('storage/' . @$contact2->phone_image) }}" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0 d-flex flex-column">
                <div class="contact-card rounded-3 p-4 d-flex flex-column flex-grow-1">
                    <div class="contact-content flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Email Us</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-paper-plane text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">{!! @$contact2->mail_one !!}</p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3 align-self-stretch">
                        <img src="{{ asset('storage/' . @$contact2->email_image) }}" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-card opening-bg py-5 px-3"
        style= "background-image: url({{ asset('uploads/patterned200.png') }});">
        <div class="container">
            <h2 class="text-center fw-bold text-white">Opening Times</h2>
            <div class="row pt-5">
                <div class="col-lg-4 d-flex justify-content-center text-center text-md-start my-2">
                    <div>
                        <h5 class="text-white mb-3 fw-bold">{!! @$contact2->title_one !!}</h5>
                        <p class="text-white">{!! @$contact2->description_one !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center text-center text-md-start my-2">
                    <div>
                        <h5 class="text-white mb-3 fw-bold">{!! @$contact2->title_two !!}</h5>
                        <p class="text-white">{!! @$contact2->description_two !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center text-center text-md-start my-2">
                    <div>
                        <h5 class="text-white mb-3 fw-bold">{!! @$contact2->title_three !!}</h5>
                        <p class="text-white">{!! @$contact2->description_three !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 text-center text-md-start">
                <h4 class="color-dark-gray my-2">David Duncan Sugarcraft School Edinburgh</h4>
                <h4 class="color-dark-gray my-2">David Duncan Sugarcraft School Glasgow</h4>
                <a class="my-2 text-muted fw-semibold" href="">www.davidduncansugarcraftschool.co.uk</a>
                <h4 class="fw-bold my-2">Opening Times:</h4>
                <p class="fw-semibold my-2">Access available 30 minutes prior to class start time. For a list of
                    class
                    dates/times please see
                    website.</p>
                <p class="my-2"><code>Email: </code><a
                        href="hello@davidduncansugarcraftschool.co.uk">hello@davidduncansugarcraftschool.co.uk</a>
                </p>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-7 contact-card2 d-flex align-items-stretch my-3 my-md-0">
                        <div class="overflow-hidden position-relative rounded-3 w-100">
                            <img class="img-fluid w-100 h-100"
                                src="https://www.3d-cakes.co.uk/media/wysiwyg/contact/edinburgh-store.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-5 contact-card2 d-flex align-items-stretch my-3 my-md-0">
                        <div class="overflow-hidden rounded-3 w-100">
                            <img class="img-fluid w-100 h-100"
                                src="https://lh3.googleusercontent.com/p/AF1QipNAlr9-Yeu7MjzvFARmi6vy0Xuyxmz_A2mST_lt=s680-w680-h510"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container">
        {!! @$contact2->main_description !!}
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h2 class="fw-bold color-dark-gray">Get in touch with us today</h2>
                    <p class="text-secondary  my-4">We’d love to hear from you. Whether you have a question,
                        feedback, or need assistance, please fill out the form below and our team will get back to you as
                        soon as possible.</p>
                </div>

                <div class="mt-4">
                    <h4 class="fw-bold">Follow Us:</h4>
                    <div class="social-icons contact-social-icons mt-3">
                        <a class="me-2" href="#"><i class="fab fa-facebook-square fs-3 color-dark-gray"></i></a>
                        <a class="me-2" href="#"><i
                                class="fab fa-google-plus-square fs-3 color-dark-gray"></i></a>
                        <a class="me-2" href="#"><i class="fab fa-twitter-square fs-3 color-dark-gray"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0 wow fadeInUp" data-wow-duration="1s">
                <div class="formbg rounded-4">
                    <form class="formbg fp__contact_form">
                        @csrf
                        <h3 class="color-dark-gray">Contact</h3>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="fp__contact_form_input">
                                    <span><i class="fal fa-user-alt"></i></span>
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="fp__contact_form_input">
                                    <span><i class="fal fa-envelope"></i></span>
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="fp__contact_form_input">
                                    <span><i class="fal fa-book"></i></span>
                                    <input type="text" placeholder="Subject" name="subject">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="fp__contact_form_input textarea">
                                    <span><i class="fal fa-book"></i></span>
                                    <textarea rows="8" placeholder="Message" name="message"></textarea>
                                </div>
                                <button type="submit" class="submit_btn text-white background-light-gray">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.fp__contact_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('contact.send-message') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.submit_btn').attr('disabled', true)
                        $('.submit_btn').html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Sending...
                        `);
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.fp__contact_form').trigger('reset');
                        $('.submit_btn').attr('disabled', false)
                        $('.submit_btn').html(`Send Message`);
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });

                        $('.submit_btn').attr('disabled', false)
                        $('.submit_btn').html(`Send Message`);
                    }
                })
            })
        })
    </script>
@endpush
