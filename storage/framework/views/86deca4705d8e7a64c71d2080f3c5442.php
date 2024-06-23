<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Category</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.category.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
				
				<div class="form-group">
					<label for="parent">Parent</label>
					<select name="parent" class="form-control" id="parent">
						<option value="" selected>Select Parent Category</option>
						<?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>

                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control" id="">
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                    </select>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/product/category/create.blade.php ENDPATH**/ ?>