<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Block</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Block</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.slider2.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
				
				  <div class="form-group">
                        <label for="category_id" class="form-label">
                            Category
                        </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slidercategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($slidercategory->id); ?>"><?php echo e($slidercategory->category); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
				
				
				
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>
               
                <div class="form-group">
                    <label>Offer</label>
                    <input type="text" name="offer" class="form-control" id="remove">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" id="remove">
                </div>
                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" id="remove">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id="remove"></textarea>
                </div>
                <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control" id="remove">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
				
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/slider2/create.blade.php ENDPATH**/ ?>