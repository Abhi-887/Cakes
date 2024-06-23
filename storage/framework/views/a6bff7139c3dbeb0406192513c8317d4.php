<div class="tab-pane fade show" id="stripe-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.stripe-setting.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group">
                    <label for="">Stripe Status</label>
                    <select name="stripe_status" id="" class="select3 form-control">
                        <option <?php if(@$paymentGateway['stripe_status'] == 1): echo 'selected'; endif; ?> value="1">Active</option>
                        <option <?php if(@$paymentGateway['stripe_status'] == 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Stripe Country Name</label>
                    <select name="stripe_country" id="" class="select3 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('country_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(@$paymentGateway['stripe_country'] === $key): echo 'selected'; endif; ?> value="<?php echo e($key); ?>"><?php echo e($country); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Stripe Currency</label>
                    <select name="stripe_currency" id="" class="select3 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('currencys.currency_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(@$paymentGateway['stripe_currency'] === $currency): echo 'selected'; endif; ?> value="<?php echo e($currency); ?>"><?php echo e($currency); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Currency Rate ( Per <?php echo e(config('settings.site_default_currency')); ?> )</label>
                    <input name="stripe_rate" type="text" class="form-control"
                        value="<?php echo e(@$paymentGateway['stripe_rate']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Stripe Key</label>
                    <input name="stripe_api_key" type="text" class="form-control"
                        value="<?php echo e(@$paymentGateway['stripe_api_key']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Stripe Secret Key</label>
                    <input name="stripe_secret_key" type="text" class="form-control"
                        value="<?php echo e(@$paymentGateway['stripe_secret_key']); ?>">
                </div>

                <div class="form-group">
                    <label>Stripe Logo</label>
                    <div id="image-preview-2" class="image-preview stripe-preview">
                        <label for="image-upload-2" id="image-label-2">Choose File</label>
                        <input type="file" name="stripe_logo" id="image-upload-2" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.stripe-preview').css({
                'background-image': 'url(<?php echo e(@$paymentGateway['stripe_logo']); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            if (jQuery().select2) {
                $(".select3").select2();
            }

            $.uploadPreview({
                input_field: "#image-upload-2", // Default: .image-upload
                preview_box: "#image-preview-2", // Default: .image-preview
                label_field: "#image-label-2", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/payment-setting/sections/stripe.blade.php ENDPATH**/ ?>