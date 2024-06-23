<?php $__env->startSection('content'); ?>
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>checkout</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="javascript:;">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->


    <!--============================
            CHECK OUT PAGE START
        ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>select address <a href="#" data-bs-toggle="modal" data-bs-target="#address_modal"><i
                                        class="far fa-plus"></i> add address</a></h5>

                            <div class="fp__address_modal">
                                <div class="modal fade" id="address_modal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="address_modalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="fp_dashboard_new_address d-block">
                                                    <form action="<?php echo e(route('address.store')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">

                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <select class="nice-select" name="area">
                                                                        <option value="">Slelect Area</option>
                                                                        <?php $__currentLoopData = $deliveryAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($area->id); ?>">
                                                                                <?php echo e($area->area_name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="First Name"
                                                                        name="first_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Last Name"
                                                                        name="last_name">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Phone"
                                                                        name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Email"
                                                                        name="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <textarea cols="3" rows="4" placeholder="Address" name="address"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="fp__check_single_form check_area">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault1"
                                                                            value="home">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            home
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault2"
                                                                            value="office">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            office
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div  style="display:flex;">
                                                                <button style="width: 200px" type="button"
                                                                    class="common_btn cancel_new_address mr-2">cancel</button>
                                                                <button style="width: 200px" type="submit" class="common_btn">save
                                                                    address</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <div class="fp__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input v_address" value="<?php echo e($address->id); ?>" type="radio" name="flexRadioDefault"
                                                    id="home">
                                                <label class="form-check-label" for="home">
                                                    <?php if($address->type === 'home'): ?>
                                                        <span class="icon"><i class="fas fa-home"></i> home</span>
                                                    <?php else: ?>
                                                        <span class="icon"><i class="fas fa-home"></i> office</span>
                                                    <?php endif; ?>
                                                    <span class="address"><?php echo e($address->address); ?>,
                                                        <?php echo e($address->deliveryArea?->area_name); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span><?php echo e(currencyPosition(cartTotal())); ?></span></p>
                        <p>delivery: <span id="delivery_fee">$00.00</span></p>
                        <?php if(session()->has('coupon')): ?>
                        <p>discount: <span><?php echo e(currencyPosition(session()->get('coupon')['discount'])); ?></span></p>
                        <?php else: ?>
                        <p>discount: <span><?php echo e(currencyPosition(0)); ?></span></p>

                        <?php endif; ?>
                        <p class="total"><span>total:</span> <span id="grand_total"><?php echo e(currencyPosition(grandCartTotal())); ?></span></p>

                        <a class="common_btn" id="procced_pmt_button" href=" #">Proceed to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            CHECK OUT PAGE END
        ==============================-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.v_address').prop('checked', false);

            $('.v_address').on('click', function(){
                let addressId = $(this).val();
                let deliveryFee = $('#delivery_fee');
                let grandTotal = $('#grand_total');

                $.ajax({
                    method: 'GET',
                    url: '<?php echo e(route("checkout.delivery-cal", ":id")); ?>'.replace(":id", addressId),
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(response) {
                        deliveryFee.text("<?php echo e(currencyPosition(':amount')); ?>"
                            .replace(":amount", response.delivery_fee.toFixed(2)));

                        grandTotal.text("<?php echo e(currencyPosition(':amount')); ?>"
                        .replace(":amount", response.grand_total.toFixed(2)));
                    },
                    error: function(xhr, status, error){
                        let errorMessage = xhr.responseJSON.message;
                        toastr.success(errorMessage);
                    },
                    complete: function() {
                        hideLoader()
                    }
                })
            })

            $('#procced_pmt_button').on('click', function(e){
                e.preventDefault();
                let address = $('.v_address:checked');
                let id = address.val();
                if(address.length === 0){
                    toastr.error('Please Select a Address!');
                    return;
                }

                $.ajax({
                    method: 'Post',
                    url: '<?php echo e(route("checkout.redirect")); ?>',
                    data: {
                        id: id
                    },
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error){
                        let errorMessage = xhr.responseJSON.message;
                        toastr.success(errorMessage);
                    },
                    complete: function() {
                        hideLoader()
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/checkout.blade.php ENDPATH**/ ?>