<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Blog Categories</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Blog Category</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.blog-category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($category->name); ?>">
                    </div>

                
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option <?php if($category->status === 1): echo 'selected'; endif; ?> value="1">Active</option>
                            <option <?php if($category->status === 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/blog/blog-category/edit.blade.php ENDPATH**/ ?>