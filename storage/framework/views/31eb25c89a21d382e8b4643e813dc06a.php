

<?php $__env->startSection('content'); ?>

<style>
.form-control {
  -webkit-appearance: button;
  -moz-appearance: button;
}
</style>
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Book A Free Consultation</h1>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">Consultation</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->
    <!--=============================
        Consultation PAGE START
    ==============================-->
    <div class="container mt-5">
        <div class="mt-3 mb-4"><h3 class="text-center">3D Cakes are currently Scotland's most awarded cake boutique.</h3></div>
        <p class="text-center mb-2">Fill out your details below to book a free consultation and cake tasting with our award-winning team.</p>
        <p class="text-center mb-2">Personal Design Service: Our skilled team will help take you through the process to create a design tailored to your requirements.</p>
        <p class="text-center mb-2">Full details on our ordering process and terms & conditions of booking can be viewed <a href="#">here</a>.</p>
        
        <div class="my-5 py-5">
            <form action="<?php echo e(route('consultations.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="">
                    <div class=""><h4> Personal Details</h4></div>
                    <hr>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="firstName" class="mb-1">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surname" class="mb-1">Surname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="email" class="mb-1">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="mb-1">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                </div>
                <div class=" mt-3">
                    <div class=""><h4> Event Information</h4></div>
                    <hr>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="eventDate" class="mb-1">Event Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="eventDate" name="event_date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="venue" class="mb-1">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue">
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="numberGuests" class="mb-1">Number of Guests</label>
                            <select id="numberGuests" class="form-control" name="number_of_guests">
                                <option>0-35</option>
                                <option>36-70</option>
                                <option>71-100</option>
                                <option>101-150</option>
                                <option>151-200</option>
								<option>201-250</option>
								<option>251-300</option>
								<option>301-350</option>
								<option>351-400</option>
								<option>400+</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="otherInfo" class="mb-1">Any other information</label>
                            <input type="text" class="form-control" id="otherInfo" name="other_information">
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="cakeBudget" class="mb-1">Cake Budget <span class="text-danger">*</span></label>
                            <select id="cakeBudget" class="form-control" name="cake_budget" required>
                                <option>Under £50</option>
								<option>Under £150</option>
								<option>Under £250</option>
								<option>£250-£400</option>
								<option>£400-£700</option>
								<option>£700-£1000</option>
								<option>£1000-£2000</option>
								<option>£2000+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class=" mt-3">
                    <div class=""><h4> Consultation Info</h4></div>
                    <hr>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="consultationStore" class="mb-1">Select Consultation Store <span class="text-danger">*</span></label>
                            <select id="consultationStore" class="form-control" name="consultation_store" required>
                                <option>Edinburgh Store: Open (20 Roseburn Terrace, EH12 6AW)</option>
                                <option>Milngavie Store: (38 Station Road, Milngavie, G62 8AB)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="consultationType" class="mb-1">Consultation Type (in-store, telephone or zoom) <span class="text-danger">*</span></label>
                            <select id="consultationType" class="form-control" name="consultation_type" required>
                                <option>In-store</option>
                                <option>Telephone</option>
                                <option>Zoom</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="existingOrder" class="mb-1">Is this for an existing booking or new order? <span class="text-danger">*</span></label>
                            <select id="existingOrder" class="form-control" name="existing_order" required>
                                <option>New Order</option>
                                <option>Existing Booking</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-1">Type of cake required <span class="text-danger">*</span></label>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="weddingCake" name="cake_type[]" value="wedding">
                                <label class="form-check-label  ms-2" for="weddingCake">Wedding Cake</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="birthdayCake" name="cake_type[]" value="birthday">
                                <label class="form-check-label  ms-2" for="birthdayCake">Birthday Cake</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="corporateCake" name="cake_type[]" value="corporate">
                                <label class="form-check-label  ms-2" for="corporateCake">Corporate Cake</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="otherCake" name="cake_type[]" value="other">
                                <label class="form-check-label  ms-2" for="otherCake">Other Occasion</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="bookingStatus" class="mb-1">If you have an existing booking with us, please select whether you are looking to discuss/change aspects of your cake design, or whether you would like to come in for a cake tasting only</label>
                        <select id="bookingStatus" class="form-control" name="booking_status">
                            <option>Not applicable, my booking is new</option>
                            <option>I would like to try cake samples only</option>
                            <option>I would like to discuss/make changes to aspects of my design</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="consultationDate" class="mb-1">Consultation Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="consultationDate" name="consultation_date" required>
                    </div>
                </div>
                
                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="consultationTime" class="mb-1">Consultation Time <span class="text-danger">*</span></label>
                        <select id="consultationTime" class="form-control" name="consultation_time" required>
                            <option>10am-10:45am</option>
                            <option>10:45am-11:30am</option>
                            <option>11:30am-12:15pm</option>
                            <option>12:15pm-1pm</option>
                            <option>1pm-1:45pm</option>
                            <option>1:45pm-2:30pm</option>
                            <option>2:30pm-3:15pm</option>
                            <option>3:15pm-4pm</option>
							 <option>4pm-4:45pm</option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-5 text-center"><button type="submit" class="btn btn-primary px-5">Book Now</button></div>
            </form>
        </div>
    </div>
    <!--=============================
        Consultation PAGE END
    ==============================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/consultation.blade.php ENDPATH**/ ?>