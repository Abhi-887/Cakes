@extends('frontend.layouts.master')

@section('content')
    <style>
        .form-control {
            -webkit-appearance: button;
            -moz-appearance: button;
        }

        #jobReference1,
        #jobReference2 {
            padding: 0px !important;
            width: 40px !important;
            height: 40px !important;
        }

        #jobReference1:focus,
        #jobReference2:focus {
            border-color: none !important;
        }

        /* .hiring {
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
                }

                #jobReference1:checked,
                #jobReference2:checked {
                    background-color: #788a9f !important;
                    border-color: #788a9f !important;
                }

                .hiring-btn {
                    background-color: #788a9f !important;
                } */
    </style>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                        BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>We're Hiring</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">We're Hiring</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                        BREADCRUMB END
                                                                                                                                                                                                                                                                                                                                                                    ==============================-->
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                       WE'RE HIRING! PAGE START
                                                                                                                                                                                                                                                                                                                                                                    ==============================-->

    {{-- <div class="container my-5">
        <div class="">
            <h5>To apply to join the team at 3D Cakes Edinburgh or 3D Cakes Milngavie, please complete the application form
                below and hit the 'Submit Application' button. Please ensure that you select the job reference(s) for all
                positions for which you wish to be considered (you may apply for more than one role).</h5>
        </div>

        <div class="my-4">
            <h3>Current vacancies are displayed below:</h3>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class=" mb-3">
                    <h4>Part Time Front-of-House Assistant (Edinburgh) Wednesday - Friday</h4>
                </div>
                <p><strong>Main Duties:</strong> Front-of-house customer service for coffees & cake slices, baking and cake
                    decorating (ideal candidate will have an enjoyment for baking and cake decorating). Have barista
                    training skills. Have knowledge of Food Handling and Food Hygiene requirements. Be able to maintain a
                    calm demeanour in busy periods, and provide a consistently high standard of customer service.</p>
                <p><strong>Working Hours & Wage:</strong> Wednesday - Friday 8.30am - 5pm, Job Type: Part-Time, £10.50 per
                    hour | Job Reference: EDIN10</p>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class=" mb-3">
                    <h4>Full Time Delivery Driver</h4>
                </div>
                <p><strong>Main Duties:</strong> Main duties will include delivery of cakes to customers in various
                    locations throughout Scotland. Van provided during working hours and business is covered for company
                    van. Previous experience in a delivery driver role. Decant and stack reliable (for gas/trolly and
                    methodical). Be flexible as working days will vary per week depending on delivery requirements each
                    week.</p>
                <p><strong>Other Information:</strong> Suitable candidates will have held a flat, clean UK driving license
                    for a minimum of three years. For insurance purposes, our policy requires drivers to be 25 or older.</p>
                <p><strong>Working Hours & Wage:</strong> 5 days per week (25-40 hours per week); Rota Basis, £12 per hour |
                    Job Reference: DRIV4</p>
            </div>
        </div>

        <form class="" action="{{ route('work-with-us.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label class="mt-2">Please select the Job Reference(s) for which you would like to apply:</label>
                @foreach ($errors->get('job_reference') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" id="jobReference1" name="job_reference[]"
                        value="EDIN10">
                    <label class="form-check-label ms-2" for="jobReference1">
                        EDIN10: Part Time Front-of-House Assistant (Wed - Fri)
                    </label>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" id="jobReference2" name="job_reference[]"
                        value="DRIV4">
                    <label class="form-check-label ms-2" for="jobReference2">
                        DRIV4: Full Time Delivery Driver
                    </label>
                </div>
            </div>


            <div class="form-group mt-3">
                <label for="name" class="mb-2">Name *</label>
                <input type="text" class="form-control" id="name" name="name">
                @foreach ($errors->get('name') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="email" class="mb-2">Email Address *</label>
                <input type="email" class="form-control" id="email" name="email">
                @foreach ($errors->get('email') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="telephone" class="mb-2">Telephone Number *</label>
                <input type="tel" class="form-control" id="telephone" name="telephone">
                @foreach ($errors->get('telephone') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="drivingLicense" class="mb-2">Do you hold a valid UK driving license? *</label>
                <select class="form-control" id="drivingLicense" name="driving_license">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                @foreach ($errors->get('driving_license') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="whyIdeal" class="mb-2">Please detail why you think you would be ideal for the role(s):
                    *</label>
                <textarea class="form-control" id="whyIdeal" name="why_ideal" rows="3"></textarea>
                @foreach ($errors->get('why_ideal') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="relevantExperience" class="mb-2">Please detail any relevant experience that you feel would be
                    beneficial for the role(s): *</label>
                <textarea class="form-control" id="relevantExperience" name="relevant_experience" rows="3"></textarea>
                @foreach ($errors->get('relevant_experience') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="currentPosition" class="mb-2">Length of time in current position *</label>
                <input type="text" class="form-control" id="currentPosition" name="current_position_duration">
                @foreach ($errors->get('current_position_duration') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="portfolio" class="mb-2">Examples of Your Work</label>
                <input type="file" class="form-control-file" id="portfolio" name="portfolio"
                    accept=".pdf">
                @foreach ($errors->get('portfolio') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <label for="cv" class="mb-2">Please attach your CV *</label>
                <input type="file" class="form-control-file" id="cv" name="cv"
                    accept=".pdf">
                @foreach ($errors->get('cv') as $message)
                    <div class="text-danger">{{ $message }}</div>
                @endforeach
            </div>

            <div class=" mt-4 text-center">
                <button type="submit" class="common_btn v_submit_button">Submit Application</button>
            </div>
        </form>
    </div> --}}

    <section>
        <div class="container my-5">
            <h5>To apply to join the team at 3D Cakes Edinburgh or 3D Cakes Milngavie, please complete the
                application
                form
                below and hit the 'Submit Application' button. Please ensure that you select the job reference(s) for
                all
                positions for which you wish to be considered (you may apply for more than one role).</h5>

            <div class="my-5">
                <h3>Current vacancies are displayed below:</h3>
            </div>

            <div class="hiring mb-5 p-5">
                <div class="row align-items-center">
                    <div class="col-md-6 my-3 my-md-0">
                        <div class="">
                            <div class="mb-3">
                                <h4>Part Time Front-of-House Assistant (Edinburgh) Wednesday - Friday</h4>
                            </div>
                            <p><strong>Main Duties:</strong> Front-of-house customer service for coffees & cake slices,
                                baking
                                and
                                cake
                                decorating (ideal candidate will have an enjoyment for baking and cake decorating). Have
                                barista
                                training skills. Have knowledge of Food Handling and Food Hygiene requirements. Be able to
                                maintain
                                a
                                calm demeanour in busy periods, and provide a consistently high standard of customer
                                service.
                            </p>
                            <p><strong>Working Hours & Wage:</strong> Wednesday - Friday 8.30am - 5pm, Job Type: Part-Time,
                                £10.50
                                per
                                hour | Job Reference: EDIN10</p>
                        </div>
                    </div>

                    <div class="col-6 mb-3 my-md-0">
                        <div class="service-img">
                            <img class="image-fluid" src="{{ asset('uploads/customer-service.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="hiring p-5">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 my-md-0">
                        <div class="service-img">
                            <img class="image-fluid" src="{{ asset('uploads/delivery-partner.jpeg') }}" alt="">
                        </div>
                    </div>

                    <div class="col-md-6 my-3 my-md-0">
                        <div class="">
                            <div class="mb-3">
                                <h4>Full Time Delivery Driver</h4>
                            </div>
                            <p><strong>Main Duties:</strong> Main duties will include delivery of cakes to customers in
                                various
                                locations throughout Scotland. Van provided during working hours and business is covered for
                                company
                                van. Previous experience in a delivery driver role. Decant and stack reliable (for
                                gas/trolly
                                and
                                methodical). Be flexible as working days will vary per week depending on delivery
                                requirements
                                each
                                week.</p>
                            <p><strong>Other Information:</strong> Suitable candidates will have held a flat, clean UK
                                driving
                                license
                                for a minimum of three years. For insurance purposes, our policy requires drivers to be 25
                                or
                                older.
                            </p>
                            <p><strong>Working Hours & Wage:</strong> 5 days per week (25-40 hours per week); Rota Basis,
                                £12
                                per
                                hour |
                                Job Reference: DRIV4</p>
                        </div>
                    </div>
                </div>
            </div>

            <form class="" action="{{ route('work-with-us.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-5">
                    <h3 class="">Please select the Job Reference(s) for which you would like to
                        apply:</h3>
                    <div class="row mt-3">
                        <div class="col-md-6 my-3">
                            @foreach ($errors->get('job_reference') as $message)
                                <div class="text-danger">{{ $message }}</div>
                            @endforeach
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="jobReference1" name="job_reference[]"
                                    value="EDIN10">
                                <label class="form-check-label ms-2" for="jobReference1">
                                    EDIN10: Part Time Front-of-House Assistant (Wed - Fri)
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="jobReference2" name="job_reference[]"
                                    value="DRIV4">
                                <label class="form-check-label ms-2" for="jobReference2">
                                    DRIV4: Full Time Delivery Driver
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 my-3">
                            <label for="name">Name *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-signature"></i></span>
                                <input type="text" class="form-control" id="name" name="name">
                                @foreach ($errors->get('name') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="email">Email Address *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email">
                                @foreach ($errors->get('email') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="telephone">Telephone Number *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-phone-alt"></i></span>
                                <input type="tel" class="form-control" id="telephone" name="telephone">
                                @foreach ($errors->get('telephone') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="drivingLicense">Do you hold a valid UK driving license? *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-id-badge"></i></span>
                                <select class="form-control" id="drivingLicense" name="driving_license">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @foreach ($errors->get('driving_license') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="whyIdeal">Please detail why you think you would be ideal for the role(s):
                                *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-user-tie"></i></span>
                                <textarea class="form-control" id="whyIdeal" name="why_ideal" rows="3"></textarea>
                                @foreach ($errors->get('why_ideal') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="relevantExperience">Please detail any relevant experience that you feel would
                                be
                                beneficial
                                for
                                the role(s): *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-calendar-alt"></i></span>
                                <textarea class="form-control" id="relevantExperience" name="relevant_experience" rows="3"></textarea>
                                @foreach ($errors->get('relevant_experience') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="currentPosition">Length of time in current position *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-user-clock"></i></span>
                                <input type="text" class="form-control" id="currentPosition"
                                    name="current_position_duration">
                                @foreach ($errors->get('current_position_duration') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="portfolio">Examples of Your Work</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-file"></i></span>
                                <input type="file" class="form-control-file" id="portfolio" name="portfolio"
                                    accept=".pdf">
                                @foreach ($errors->get('portfolio') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6 my-3">
                            <label for="cv">Please attach your CV *</label>
                            <div class="fp__contact_form_input form-group mt-3">
                                <span><i class="fas fa-file"></i></span>
                                <input type="file" class="form-control-file" id="cv" name="cv"
                                    accept=".pdf">
                                @foreach ($errors->get('cv') as $message)
                                    <div class="text-danger">{{ $message }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit"
                            class="hiring-btn background-light-gray text-white fw-semibold rounded-1 p-3 v_submit_button">Submit
                            Application</button>
                    </div>
            </form>
        </div>
    </section>
    <!--=============================
                                                                                                                             Application PAGE END
                                                                                                                            ==============================-->
@endsection
