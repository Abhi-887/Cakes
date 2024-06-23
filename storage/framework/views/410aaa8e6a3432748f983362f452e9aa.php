<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Blog Categories</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Blog Category</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.blog-category.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/blog/blog-category/create.blade.php ENDPATH**/ ?>