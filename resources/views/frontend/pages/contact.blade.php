@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
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
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.6s;
            display: flex;
            flex-direction: column;
            background-color: #f7f8fd !important;
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
            background: #4b637f !important;
        }

        .formbg {
            background-color: #f7f8fd !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
        }

        .contact-social-icons i:hover {
            color: #788a9f !important;
            transition: transform 0.6s;
        }

        .rotate90 {
            rotate: 90deg;
        }
    </style>

    <div class="container py-5">
        <h1 class="fw-bold">Address Line 1</h1>
        <h4 class="fw-bold color-light-gray">3D Cakes Edinburgh</h4>

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="contact-card rounded-3 p-4">
                    <div class="contact-content">
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
                    <div class="img-container overflow-hidden rounded-3">
                        <iframe src="{{ @$contact->map_link }}" style="border:0; width:100%; height:100%;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card rounded-3 p-4">
                    <div class="contact-content">
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
                    <div class="img-container overflow-hidden rounded-3">
                        <img src=" {{ @$contact->phone_image }}"class="img-fluid" alt="email">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card rounded-3 p-4">
                    <div class="contact-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Email Us</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-paper-plane text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">
                            {!! @$contact->mail_one !!}
                        </p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3">
                        <img src=" {{ @$contact->email_image }}"class="img-fluid" alt="email">
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-card py-5">
            <h2 class="color-dark-gray text-center fw-bold">Opening Times</h2>
            <div class="row pt-5">
                <div class="col-md-4 d-flex justify-content-center text-center text-md-start">
                    <div>
                        <h4 class="color-light-gray mb-3"> {!! @$contact->title_one !!}</h4>
                        <p class="fw-semibold">{!! @$contact->Description_one !!}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-md-center text-center text-md-start">
                    <div>
                        <h4 class="color-light-gray mb-3">{!! @$contact->title_two !!}</h4>
                        <p class="fw-semibold">{!! @$contact->Description_two !!}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-md-center text-center text-md-start">
                    <div>
                        <h4 class="color-light-gray mb-3">{!! @$contact->title_three !!}</h4>
                        <p class="fw-semibold">{!! @$contact->Description_three !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h1 class="fw-bold">Address Line 2</h1>
        <h4 class="fw-bold color-light-gray">3D Cakes Milngavie</h4>

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="contact-card rounded-3 p-4">
                    <div class="contact-content">
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
                    <div class="img-container overflow-hidden rounded-3">
                        <iframe src="{{ @$contact2->map_link }}" style="border:0; width:100%; height:100%;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card rounded-3 p-4">
                    <div class="contact-content">
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
                    <div class="img-container overflow-hidden rounded-3">
                        <img src="https://demo.awaikenthemes.com/weebix/wp-content/uploads/2024/04/contact-info-2.jpg"
                            class="img-fluid" alt="contact">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card rounded-3 p-4">
                    <div class="contact-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold color-dark-gray">Email Us</h4>
                            <div
                                class="location-icon d-flex justify-content-center align-items-center btnbackground rounded-circle text-center fs-4">
                                <a href=""><i class="fas fa-paper-plane text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">
                            {!! @$contact2->mail_one !!}
                        </p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3">
                        <img src=https://demo.awaikenthemes.com/weebix/wp-content/uploads/2024/04/contact-info-3.jpg"
                            class="img-fluid" alt="email">
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-card py-5">
            <h2 class="color-dark-gray text-center fw-bold">Opening Times</h2>
            <div class="row pt-5">
                <div class="col-md-4 d-flex justify-content-center text-center text-md-start">
                    <div>
                        <h4 class="color-light-gray mb-3">{!! @$contact2->title_one !!}</h4>
                        <p class="fw-semibold">{!! @$contact2->Description_one !!}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center text-center text-md-start">
                    <div>
                        <h4 class="color-light-gray mb-3">{!! @$contact2->title_two !!}</h4>
                        <p class="fw-semibold">{!! @$contact2->Description_two !!}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center text-center text-md-start">
                    <div>
                        <h4 class="color-light-gray mb-3">{!! @$contact2->title_three !!}</h4>
                        <p class="fw-semibold">{!! @$contact2->Description_three !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {!! @$contact2->Description !!}
    </div>

    <div class="container">
        <div class="row align-items-center my-5">
            <div class="col-md-6">
                <div class="mb-4">
                    <h1 class="fw-bold color-dark-gray">Get in touch with us today</h1>
                    <p class="text-secondary fw-semibold my-4">We’d love to hear from you. Whether you have a question,
                        feedback, or need assistance, please fill out the form below and our team will get back to you as
                        soon as possible.</p>
                </div>

                <div class="mt-4">
                    <h4 class="fw-bold">Follow Us:</h4>
                    <div class="social-icons contact-social-icons mt-3">
                        <a class="me-2" href="#"><i class="fab fa-facebook fs-3 color-dark-gray"></i></a>
                        <a class="me-2" href="#"><i class="fab fa-google-plus-g fs-3 color-dark-gray"></i></a>
                        <a class="me-2" href="#"><i class="fab fa-twitter fs-3 color-dark-gray"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mt-md-0 wow fadeInUp" data-wow-duration="1s">
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
                                <button type="submit" class="submit_btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                CONTACT PAGE END
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
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
