<div class="tab-pane fade show" id="pusher-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.pusher-setting.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Pusher App Id</label>
                    <input name="pusher_app_id" type="text" class="form-control" value="<?php echo e(config('settings.pusher_app_id')); ?>">
                </div>
                <div class="form-group">
                    <label for="">Pusher Key</label>
                    <input name="pusher_key" type="text" class="form-control" value="<?php echo e(config('settings.pusher_key')); ?>">
                </div>
                <div class="form-group">
                    <label for="">Pusher Secret</label>
                    <input name="pusher_secret" type="text" class="form-control" value="<?php echo e(config('settings.pusher_secret')); ?>">
                </div>
                <div class="form-group">
                    <label for="">Pusher cluster</label>
                    <input name="pusher_cluster" type="text" class="form-control" value="<?php echo e(config('settings.pusher_cluster')); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/setting/sections/pusher-setting.blade.php ENDPATH**/ ?>