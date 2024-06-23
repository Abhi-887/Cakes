<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>About Us</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update About Us</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.aboutus.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                   

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e(@$about->title); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="summernote" class="form-control"><?php echo @$about->description; ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/about-us/index.blade.php ENDPATH**/ ?>