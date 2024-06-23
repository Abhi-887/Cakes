<div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
    <div class="fp_dashboard_body address_body">
        <h3>address <a class="dash_add_new_address"><i class="far fa-plus"></i> add new
            </a>
        </h3>
        <div class="fp_dashboard_address show_edit_address">
            <div class="fp_dashboard_existing_address">
                <div class="row">
                    <?php $__currentLoopData = $userAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6">
                            <div class="fp__checkout_single_address">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <span class="icon">
                                            <?php if($address->type === 'home'): ?>
                                                <i class="fas fa-home"></i>
                                            <?php else: ?>
                                                <i class="far fa-car-building"></i>
                                            <?php endif; ?>

                                            <?php echo e($address->type); ?>

                                        </span>
                                        <span class="address"><?php echo e($address->address); ?>,
                                            <?php echo e($address->deliveryArea?->area_name); ?> </span>
                                    </label>
                                </div>
                                <ul>
                                    <li><a class="dash_edit_btn show_edit_section" data-class="edit_section_<?php echo e($address->id); ?>"><i class="far fa-edit"></i></a></li>
                                    <li><a href="<?php echo e(route('address.destroy', $address->id)); ?>" class="dash_del_icon delete-item" ><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="fp_dashboard_new_address ">
                <form action="<?php echo e(route('address.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <h4>add new address</h4>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <select id="select_js3" name="area">
                                    <option value="">Slelect Area</option>
                                    <?php $__currentLoopData = $deliveryAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($area->id); ?>"><?php echo e($area->area_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="First Name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Last Name" name="last_name">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Phone" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Email" name="email">
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
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1"
                                        value="home">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        home
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2"
                                        value="office">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        office
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="common_btn cancel_new_address">cancel</button>
                            <button type="submit" class="common_btn">save
                                address</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php $__currentLoopData = $userAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="fp_dashboard_edit_address edit_section_<?php echo e($address->id); ?>" >
                <form action="<?php echo e(route('address.update', $address->id)); ?>" method="Post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-12">
                            <h4>Edit Address</h4>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <select class="nice-select" name="area">
                                    <option value="">Slelect Area</option>
                                    <?php $__currentLoopData = $deliveryAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($address->delivery_area_id === $area->id): echo 'selected'; endif; ?> value="<?php echo e($area->id); ?>"><?php echo e($area->area_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="First Name" name="first_name" value="<?php echo e($address->first_name); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Last Name" name="last_name" value="<?php echo e($address->last_name); ?>">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Phone" name="phone" value="<?php echo e($address->phone); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Email" name="email" value="<?php echo e($address->email); ?>">
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <textarea cols="3" rows="4" placeholder="Address" name="address"><?php echo $address->address; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="fp__check_single_form check_area">
                                <div class="form-check">
                                    <input <?php if($address->type === 'home'): echo 'checked'; endif; ?> class="form-check-input" type="radio" name="type"
                                        id="flexRadioDefault1" value="home">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        home
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php if($address->type === 'office'): echo 'checked'; endif; ?> class="form-check-input" type="radio" name="type"
                                        id="flexRadioDefault2" value="office">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        office
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="common_btn cancel_edit_address">cancel</button>
                            <button type="submit" class="common_btn">save
                                address</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('.show_edit_section').on('click', function(){
                let className = $(this).data('class');
                $('.fp_dashboard_edit_address').removeClass('d-block');
                $('.fp_dashboard_edit_address').removeClass('d-none');

                $('.fp_dashboard_existing_address').addClass('d-none');
                $('.'+className).addClass('d-block');
            })

            $('.cancel_edit_address').on('click', function(){
                $('.fp_dashboard_edit_address').addClass('d-none');
                $('.fp_dashboard_existing_address').removeClass('d-none');
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/dashboard/sections/address-section.blade.php ENDPATH**/ ?>