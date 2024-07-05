@extends('frontend.layouts.master')

@section('content')
    <style>
        .form-control {
            -webkit-appearance: button;
            -moz-appearance: button;
        }
    </style>

    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
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

    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('frontend/images/screen_shot_2020-05-22_at_13.24.27.png') }}" class="img-fluid"
                    alt="Couple eating cake">
            </div>
            <div class="col-md-7">
                <h2>Why Choose 3D Cakes?</h2>
                <ul>
                    <!-- List of reasons -->
                </ul>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <h2>Secure your date now; decide on your design and flavours later:</h2>
                <ul>
                    <!-- List of steps -->
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h3>£100.00 </h3>
            </div>
            <div class="col-md-6">
                <form id="wedding_cake_deposit_form" method="post" action="{{ route('wedding-cake-deposit.store') }}">
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
                    <div class="text-end">
                        <button type="submit" class="common_btn v_submit_button">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#wedding_cake_deposit_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('wedding-cake-deposit.store') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.v_submit_button').attr('disabled', true);
                        $('.v_submit_button').html(
                            '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                        );
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
                });
            });
        });
    </script>
@endsection
