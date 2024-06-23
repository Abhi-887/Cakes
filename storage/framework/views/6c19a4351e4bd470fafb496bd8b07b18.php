<div class="tab-pane fade show" id="seo-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="card-body border">
            <form action="<?php echo e(route('admin.seo-setting.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="">Seo Title</label>
                    <input name="seo_title" type="text" class="form-control" value="<?php echo e(config('settings.seo_title')); ?>">
                </div>
                <div class="form-group">
                    <label for="">Seo Description</label>
                    <textarea name="seo_description" class="form-control"><?php echo e(config('settings.seo_description')); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Seo Keywords</label>
                    <input type="text" class="form-control inputtags" name="seo_keywords" value="<?php echo e(config('settings.seo_keywords')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(".inputtags").tagsinput('items');
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/setting/sections/seo-setting.blade.php ENDPATH**/ ?>