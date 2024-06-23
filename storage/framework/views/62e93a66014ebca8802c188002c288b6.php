<div class="tab-pane fade show" id="razorpay-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.razorpay-setting.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group">
                    <label for="">Razorpay Status</label>
                    <select name="razorpay_status" id="" class="select3 form-control">
                        <option <?php if(@$paymentGateway['razorpay_status'] == 1): echo 'selected'; endif; ?> value="1">Active</option>
                        <option <?php if(@$paymentGateway['razorpay_status'] == 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Razorpay Country Name</label>
                    <select name="razorpay_country" id="" class="select3 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('country_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(@$paymentGateway['razorpay_country'] === $key): echo 'selected'; endif; ?> value="<?php echo e($key); ?>"><?php echo e($country); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Razorpay Currency</label>
                    <select name="razorpay_currency" id="" class="select3 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('currencys.currency_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(@$paymentGateway['razorpay_currency'] === $currency): echo 'selected'; endif; ?> value="<?php echo e($currency); ?>"><?php echo e($currency); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Currency Rate ( Per <?php echo e(config('settings.site_default_currency')); ?> )</label>
                    <input name="razorpay_rate" type="text" class="form-control"
                        value="<?php echo e(@$paymentGateway['razorpay_rate']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Razorpay Key</label>
                    <input name="razorpay_api_key" type="text" class="form-control"
                        value="<?php echo e(@$paymentGateway['razorpay_api_key']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Razorpay Secret Key</label>
                    <input name="razorpay_secret_key" type="text" class="form-control"
                        value="<?php echo e(@$paymentGateway['razorpay_secret_key']); ?>">
                </div>

                <div class="form-group">
                    <label>Razorpay Logo</label>
                    <div id="image-preview-3" class="image-preview razorpay-preview">
                        <label for="image-upload-3" id="image-label-3">Choose File</label>
                        <input type="file" name="razorpay_logo" id="image-upload-3" />
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
            $('.razorpay-preview').css({
                'background-image': 'url(<?php echo e(@$paymentGateway["razorpay_logo"]); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            if (jQuery().select2) {
                $(".select3").select2();
            }

            $.uploadPreview({
                input_field: "#image-upload-3", // Default: .image-upload
                preview_box: "#image-preview-3", // Default: .image-preview
                label_field: "#image-label-3", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/payment-setting/sections/razorpay.blade.php ENDPATH**/ ?>