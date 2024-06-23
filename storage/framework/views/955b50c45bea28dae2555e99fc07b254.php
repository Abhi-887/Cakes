<div class="tab-pane fade show" id="appearance-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.appearance-setting.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Site Color</label>
                                <input type="text" class="form-control colorpickerinput" name="site_color" value="<?php echo e(config('settings.site_color')); ?>">
                            </div>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/setting/sections/appearance-setting.blade.php ENDPATH**/ ?>