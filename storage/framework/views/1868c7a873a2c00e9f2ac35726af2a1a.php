<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Social Link</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Link</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.social-link.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="">Icon</label>
                    <br>
                    <button class="btn btn-secondary" role="iconpicker" name="icon" data-icon=""></button>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/social-link/create.blade.php ENDPATH**/ ?>