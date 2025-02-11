@extends('frontend.layouts.master')

@section('content')
    <style>
        .form-control {
            -webkit-appearance: button;
            -moz-appearance: button;
        }
    </style>
    <!--=============================
                                                            BREADCRUMB START
                                                        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>Wedding Cake Deposit</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">Wedding Cake Deposit</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                            BREADCRUMB END
                                                        ==============================-->
    <!--=============================
                                                            Wedding-cake-deposit PAGE START
                                                        ==============================-->

    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('frontend/images/screen_shot_2020-05-22_at_13.24.27.png') }}" class="img-fluid"
                    alt="Couple eating cake">
            </div>
            <div class="col-md-7">
                <h2>Why Choose 3D Cakes?</h2>
                <ul>
                    <li>The team are Multi Award Winners, having won 12 national awards for Best Cake Designer in Scotland.
                    </li>
                    <li>We have been honoured to create cakes for royalty, including cakes presented to HM King Charles, and
                        HM Queen Elizabeth II and have also worked with many high fashion brands.</li>
                    <li>We offer a range of 34 delicious cake flavours to WOW your guests.</li>
                    <li>We design our own bespoke cake stands to enhance the beauty of your cake and tie in with the style
                        of venue.</li>
                </ul>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <h2>Secure your date now; decide on your design and flavours later:</h2>
                <ul>
                    <li>Secure your date with an initial £100 deposit payment.</li>
                    <li>In the 'Consultation Preference' field please select whether you would like us to:
                        <ol>
                            <li>Arrange an in-store consultation for you once our stores have reopened.</li>
                            <li>Contact you via telephone to discuss your design and order requirements.</li>
                            <li>Contact you to arrange a video consultation.</li>
                        </ol>
                    </li>
                    <li>Once our stores have reopened, come in store for a complimentary cake tasting appointment or collect
                        your samples and take home to enjoy with friends and family.</li>
                    <li>There is no extra cost for having a bespoke design created. If you wish you can also select a
                        wedding cake from our galleries. Any design can be altered to match colour schemes or design themes.
                    </li>
                    <li>Your wedding cake design must be finalised a minimum of 2 months prior to your wedding date.</li>
                    <li>The balance on your order is payable a minimum of 1 month prior to your wedding date.</li>
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h3>£100.00 </h3>
            </div>
            <div class="col-md-6">
                <form method="post" action="{{ route('wedding-cake-deposit.store') }}">
                    @csrf
                    <input type="hidden" value="100" name="booking_amount">
                    <div class="form-group mb-3">
                        <label for="consultationPreference" class="mb-2">Consultation preference:<span
                                class="text-danger">*</span></label>
                        <select class="form-control" id="consultationPreference" name="consultationPreference" required>
                            <option value="" disabled selected>-- Please Select --</option>
                            <option value="in-store">In-store consultation</option>
                            <option value="telephone">Telephone consultation</option>
                            <option value="video">Video consultation</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="existingDesign" class="mb-2">If an existing design, please tell us its name
                            here:</label>
                        <input type="text" class="form-control" id="existingDesign" name="existingDesign">
                    </div>
                    <div class="form-group mb-3">
                        <label for="weddingDate" class="mb-2">Wedding date:<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="weddingDate" name="weddingDate" required>
                    </div>
                    <div class="text-end"><button type="submit" onclick="loadProductModal"
                            class=" common_btn v_submit_button">Add to Cart</button></div>
                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('.v_submit_button').on('click', function(e) {
                e.preventDefault();
                $("#v_add_to_cart_form").submit();
            });


            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: '{{ route('add-to-cart') }}',
                data: formData,
                beforeSend: function() {
                    $('.v_submit_button').attr('disabled', true);
                    $('.v_submit_button').html(
                        '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                    )
                },
                success: function(response) {
                    updateSidebarCart();
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                complete: function() {
                    $('.v_submit_button').html('Add to Cart');
                    $('.v_submit_button').attr('disabled', false);
                }
            })

        });
    </script>

    <!--=============================
                                                             Wedding-cake-deposit PAGE END
                                                        ==============================-->
@endsection
