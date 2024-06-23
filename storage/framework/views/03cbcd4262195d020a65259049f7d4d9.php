<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Privacy Policy</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Privacy Policy</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.privacy-policy.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="summernote" class="form-control"><?php echo @$privacyPolicy->content; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/privacy-policy/index.blade.php ENDPATH**/ ?>