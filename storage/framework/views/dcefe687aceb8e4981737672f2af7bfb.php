<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Block</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Block</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.slider2.update', $slider->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
				<div class="form-group">
					<label for="category_id" class="form-label">Category</label>
					<select name="category_id" id="category_id" class="form-control">
						<option value="">Select</option>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryId => $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($categoryId); ?>" <?php if($categoryId == $slider->category_id): ?> selected <?php endif; ?>>
								<?php echo e($categoryName); ?>

							</option>
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
                    <input type="text" name="offer" class="form-control" value="<?php echo e($slider->offer); ?>">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo e($slider->title); ?>">
                </div>
                <div class="form-group">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" value="<?php echo e($slider->sub_title); ?>">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control"><?php echo e($slider->short_description); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="<?php echo e($slider->button_link); ?>">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option <?php if($slider->status === 1): ?> selected <?php endif; ?> value="1">Active</option>
                        <option <?php if($slider->status === 0): ?> selected <?php endif; ?> value="0">Inactive</option>
                    </select>
                </div>
				
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Assuming $slider->image contains the path to the main image
        let imagePath = '<?php echo e(asset($slider->image)); ?>';

        // Check if the main image path is not empty
        if (imagePath.trim() !== '') {
            $('#image-preview').css({
                'background-image': 'url(' + imagePath + ')',
                'background-size': 'cover',
                'background-position': 'center center'
            });
            $('#image-label').text('Change File');
        }

        // Assuming $slider->background_image contains the path to the background image
        let backgroundImagePath = '<?php echo e(asset($slider->background_image)); ?>';

        // Check if the background image path is not empty
        if (backgroundImagePath.trim() !== '') {
            $('#background-image-preview').css({
                'background-image': 'url(' + backgroundImagePath + ')',
                'background-size': 'cover',
                'background-position': 'center center'
            });
            $('#background-image-label').text('Change File');
        }

        // Update main image preview on file input change
        $('#image-upload').on('change', function(){
            let input = this;

            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview').css({
                        'background-image': 'url(' + e.target.result + ')',
                        'background-size': 'cover',
                        'background-position': 'center center'
                    });
                    $('#image-label').text('Change File');
                };

                reader.readAsDataURL(input.files[0]);
            }
        });

        // Update background image preview on file input change
        $('#background-image-upload').on('change', function(){
            let input = this;

            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#background-image-preview').css({
                        'background-image': 'url(' + e.target.result + ')',
                        'background-size': 'cover',
                        'background-position': 'center center'
                    });
                    $('#background-image-label').text('Change File');
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/slider2/edit.blade.php ENDPATH**/ ?>