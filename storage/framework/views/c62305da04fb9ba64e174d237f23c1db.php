<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Footer Info</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Footer Info</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.footer-info.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group">
                    <label>Short Info</label>
                    <textarea name="short_info" class="form-control"><?php echo e(@$footerInfo->short_info); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo e(@$footerInfo->address); ?>">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo e(@$footerInfo->phone); ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo e(@$footerInfo->email); ?>">
                </div>

                <div class="form-group">
                    <label>Copyright</label>
                    <input type="text" name="copyright" class="form-control" value="<?php echo e(@$footerInfo->copyright); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/footer-info/index.blade.php ENDPATH**/ ?>