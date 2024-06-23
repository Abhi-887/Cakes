<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Products Variants (<?php echo e($product->name); ?>)</h1>
        </div>

        <div>
            <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-primary my-3">Go Back</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Create Product Size</h4>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.product-size.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" id="" class="form-control">
                                        <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="price" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td>
                                        <td><?php echo e($size->name); ?></td>
                                        <td><?php echo e(currencyPosition($size->price)); ?></td>
                                        <td>
                                            <a href='<?php echo e(route('admin.product-size.destroy', $size->id)); ?>'
                                                class='btn btn-danger delete-item mx-2'><i class='fas fa-trash'></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($sizes) === 0): ?>
                                    <tr>
                                        <td colspan='3' class="text-center">No data found!</td>

                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Create Product Options</h4>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.product-option.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" id="" class="form-control">
                                        <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="price" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$loop->index); ?></td>
                                        <td><?php echo e($option->name); ?></td>
                                        <td><?php echo e(currencyPosition($option->price)); ?></td>
                                        <td>
                                            <a href='<?php echo e(route('admin.product-option.destroy', $option->id)); ?>'
                                                class='btn btn-danger delete-item mx-2'><i class='fas fa-trash'></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($options) === 0): ?>
                                    <tr>
                                        <td colspan='3' class="text-center">No data found!</td>

                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/product/product-size/index.blade.php ENDPATH**/ ?>