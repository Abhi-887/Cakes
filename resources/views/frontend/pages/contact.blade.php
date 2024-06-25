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
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
            background-color: #f7f8fd !important;
        }

        .contact-card img {
            transition: transform 0.3s;
        }

        .contact-card:hover img {
            transform: scale(1.1);
            border-radius: 20px;
        }

        .contact-card2:hover img {
            transform: scale(1.1) !important;
            border-radius: 20px !important;
        }

        .location-icon {
            width: 50px;
            height: 50px;
            transition: 0.4s;
        }

        .viewallcontact {
            border: 1px solid #01b9eb !important;
        }

        .viewallcontact>i {
            transition: 0.4s;
        }

        .viewallcontact:hover {
            color: #01b9eb !important;
        }

        .service-content {
            flex: 1;
        }

        .img-container {
            margin-top: auto;
        }


        .formbg {
            background-color: #f7f8fd !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            margin: 20px auto;
            max-width: 800px;
        }

        .social-icons a {
            margin-right: 15px;
        }

        .btn-primary {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
        }

        .form-control,
        .btn-primary {
            border-radius: 5px;
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
                                <a href=""><i class="fa-solid fa-location-dot text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold"><small>20 Roseburn Terrace<br>Edinburgh Midlothian EH12
                                6AW</small></p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3">
                        <iframe src="{{ @$contact->map_link }}" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <a href=""><i class="fa-solid fa-phone text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">
                            <small>Phone service available Monday - Sunday 0131 337 9990.</small>
                        </p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3">
                        <img src="https://demo.awaikenthemes.com/weebix/wp-content/uploads/2024/04/contact-info-2.jpg"
                            class="img-fluid" alt="Web Development">
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
                                <a href=""><i class="fa-solid fa-envelope text-light"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-muted fw-semibold">
                            <small>enquiries@3d-cakes.co.uk</small>
                        </p>
                    </div>
                    <div class="img-container overflow-hidden rounded-3">
                        <img src=https://demo.awaikenthemes.com/weebix/wp-content/uploads/2024/04/contact-info-3.jpg"
                            class="img-fluid" alt="Web Development">
                    </div>
                </div>
            </div>

            <div class="contact-card py-5">
                <h2 class="color-dark-gray text-center fw-bold">Opening Times</h2>
                <div class="row py-5">
                    <div class="col-4">
                        <h4 class="color-light-gray mb-3">Cake orders & collections:</h4>
                        <p class="fw-semibold">Monday - Friday 9am - 5pm (please call 0131 337 9990 upon arrival if
                            collecting after
                            2pm)<br>Saturday: 9am - 4pm<br>Sunday: 10am - 3pm (by appointment only)</p>
                    </div>
                    <div class="col-4">
                        <h4 class="color-light-gray">Coffee & Cake:</h4>
                        <p class="fw-semibold">Monday - Friday 9am - 2pm<br>Saturday: 9am - 4pm<br>Sunday: Closed</p>
                    </div>
                    <div class="col-4">
                        <h4 class="color-light-gray mb-3">7-Day Cake Delivery:</h4>
                        <p class="fw-semibold">Cake design consultations are available 7 days a week<br>by
                            appointment only
                            (In store, via
                            telephone or Zoom).</p>
                    </div>

                </div>
                <div class="row align-items-center pt-5">
                    <div class="col-6">
                        <h3 class="my-2">David Duncan Sugarcraft School Edinburgh</h3>
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
                    <div class="col-6">
                        <div class="overflow-hidden contact-card2">
                            <img class="text-muted fw-semibold"
                                src="https://www.3d-cakes.co.uk/media/wysiwyg/contact/edinburgh-store.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-5 pt-5">
                <div class="col-6">
                    <h4 class="fw-bold lightblue">Contact Us</h4>
                    <div class="mb-4">
                        <h1 class="fw-bold darkblack">Get in touch with us today</h1>
                        <p class="text-secondary fw-semibold">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                            accusantium,
                            totam rem aperiam, eaque
                            ipsa
                            quae ab illo inventore et.</p>
                    </div>

                    <div class="mt-4">
                        <h5>Follow Us:</h5>
                        <div class="social-icons">
                            <a href="#"><img src="https://img.icons8.com/color/48/000000/facebook-new.png" /></a>
                            <a href="#"><img src="https://img.icons8.com/color/48/000000/instagram-new.png" /></a>
                            <a href="#"><img src="https://img.icons8.com/color/48/000000/linkedin.png" /></a>
                            <a href="#"><img src="https://img.icons8.com/color/48/000000/twitter.png" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="formbg p-5 rounded-4">
                        <form>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Subjects">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send A Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>





        <div class="row mt-5">
            <div class="col-xl-12 wow fadeInUp" data-wow-duration="1s">
                <form class="fp__contact_form">
                    @csrf
                    <h3>Contact</h3>
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
