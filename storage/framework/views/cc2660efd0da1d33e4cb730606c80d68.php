<div class="tab-pane fade show active" id="paypal-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.paypal-setting.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group">
                    <label for="">Paypal Status</label>
                    <select name="paypal_status" id="" class="select2 form-control">
                        <option <?php if(@$paymentGateway['paypal_status'] == 1): echo 'selected'; endif; ?> value="1">Active</option>
                        <option <?php if(@$paymentGateway['paypal_status'] == 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Paypal Account Mode</label>
                    <select name="paypal_account_mode" id="" class="select2 form-control">
                        <option <?php if(@$paymentGateway['paypal_account_mode'] === 'sandbox'): echo 'selected'; endif; ?> value="sandbox">Sandbox</option>
                        <option <?php if(@$paymentGateway['paypal_account_mode'] === 'live'): echo 'selected'; endif; ?> value="live">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Paypal Country Name</label>
                    <select name="paypal_country" id="" class="select2 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('country_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(@$paymentGateway['paypal_country'] === $key): echo 'selected'; endif; ?> value="<?php echo e($key); ?>"><?php echo e($country); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Paypal Currency Name</label>
                    <select name="paypal_currency" id="" class="select2 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('currencys.currency_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(@$paymentGateway['paypal_currency'] === $currency): echo 'selected'; endif; ?> value="<?php echo e($currency); ?>"><?php echo e($currency); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Currency Rate ( Per <?php echo e(config('settings.site_default_currency')); ?> )</label>
                    <input name="paypal_rate" type="text" class="form-control" value="<?php echo e(@$paymentGateway['paypal_rate']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Paypal Client Id</label>
                    <input name="paypal_api_key" type="text" class="form-control" value="<?php echo e(@$paymentGateway['paypal_api_key']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Paypal Secret Key</label>
                    <input name="paypal_secret_key" type="text" class="form-control" value="<?php echo e(@$paymentGateway['paypal_secret_key']); ?>">
                </div>

                <div class="form-group">
                    <label for="">Paypal App Id</label>
                    <input name="paypal_app_id" type="text" class="form-control" value="<?php echo e(@$paymentGateway['paypal_app_id']); ?>">
                </div>

                <div class="form-group">
                    <label>Paypal Logo</label>
                    <div id="image-preview" class="image-preview paypal-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="paypal_logo" id="image-upload" />
                      </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('.paypal-preview').css({
                'background-image': 'url(<?php echo e(@$paymentGateway["paypal_logo"]); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/payment-setting/sections/paypal.blade.php ENDPATH**/ ?>