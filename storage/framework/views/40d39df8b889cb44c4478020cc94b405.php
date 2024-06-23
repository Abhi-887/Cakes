<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Products Gallery (<?php echo e($product->name); ?>)</h1>
        </div>

        <div>
            <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-primary my-3">Go Back</a>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Images</h4>

            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <form action="<?php echo e(route('admin.product-gallery.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                            <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card card-primary">

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img width="150px" src="<?php echo e(asset($image->image)); ?>" alt=""></td>
                            <td>
                                <a href='<?php echo e(route('admin.product-gallery.destroy', $image->id)); ?>' class='btn btn-danger delete-item mx-2'><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($images) === 0): ?>
                        <tr >
                            <td colspan='2' class="text-center">No data found!</td>

                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/product/gallery/index.blade.php ENDPATH**/ ?>