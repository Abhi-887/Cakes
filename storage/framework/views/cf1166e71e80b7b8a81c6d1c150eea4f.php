<div class="tab-pane fade show active" id="general-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.general-setting.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Site Name</label>
                    <input name="site_name" type="text" class="form-control" value="<?php echo e(config('settings.site_name')); ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Site Email</label>
                            <input name="site_email" type="text" class="form-control" value="<?php echo e(config('settings.site_email')); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Site Phone</label>
                            <input name="site_phone" type="text" class="form-control" value="<?php echo e(config('settings.site_phone')); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Default Currency</label>
                    <select name="site_default_currency" id="" class="select2 form-control">
                        <option value="">Select</option>
                        <?php $__currentLoopData = config('currencys.currency_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(config('settings.site_default_currency') === $currency): echo 'selected'; endif; ?> value="<?php echo e($currency); ?>"><?php echo e($currency); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Currency Icon</label>
                            <input name="site_currency_icon" type="text" class="form-control" value="<?php echo e(config('settings.site_currency_icon')); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Currency Icon Position</label>
                            <select name="site_currency_icon_position" id="" class="select2 form-control">
                                <option <?php if(config('settings.site_currency_icon_position') === 'right'): echo 'selected'; endif; ?> value="right">Right</option>
                                <option <?php if(config('settings.site_currency_icon_position') === 'left'): echo 'selected'; endif; ?> value="left">Left</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/setting/sections/general-setting.blade.php ENDPATH**/ ?>