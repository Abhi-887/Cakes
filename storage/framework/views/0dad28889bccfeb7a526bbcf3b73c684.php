<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Product</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.product.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                      </div>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>">
                </div>

                <div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control" id="categoryDropdown">
						<option value="">Select</option>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($category->parent === 0): ?>
								<option value="<?php echo e($category->id); ?>" data-parent="<?php echo e($category->parent); ?>"
									<?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>>
									<?php echo e($category->name); ?>

								</option>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>

                <div class="form-group">
                    <label>Sub Category</label>
                    <select name="sub" class="form-control" id="subcategoryDropdown">
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($category->parent == $product->category_id): ?>
								<option value="<?php echo e($category->id); ?>"
									<?php echo e($product->sub_category == $category->id ? 'selected' : ''); ?>>
									<?php echo e($category->name); ?>

								</option>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
				
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo e($product->price); ?>">
                </div>

                <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" name="offer_price" class="form-control" value="<?php echo e($product->offer_price); ?>">
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo e($product->quantity); ?>">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id=""><?php echo $product->short_description; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control summernote" id=""><?php echo $product->long_description; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Sku</label>
                    <input type="text" name="sku" class="form-control" value="<?php echo e($product->sku); ?>">
                </div>

                <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?php echo e($product->seo_title); ?>">
                </div>

                <div class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control" id=""><?php echo $product->seo_description; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control" id="">
                        <option <?php if($product->show_at_home === 1): echo 'selected'; endif; ?> value="1">Yes</option>
                        <option <?php if($product->show_at_home === 0): echo 'selected'; endif; ?> value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option <?php if($product->status === 1): echo 'selected'; endif; ?> value="1">Active</option>
                        <option <?php if($product->status === 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
	
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.image-preview').css({
			'background-image': 'url(<?php echo e(asset($product->thumb_image)); ?>)',
			'background-size': 'cover',
			'background-position': 'center center'
		})
		
	$(document).ready(function(){
        $('#categoryDropdown').on('change', function(){
            var categoryId = $(this).val();
            $('#subcategoryDropdown').empty().append('<option value="">Select Sub Category</option>');
            if (categoryId !== '') {
                $.ajax({
                    url: "<?php echo e(route('admin.subcategories', ':categoryId')); ?>".replace(':categoryId', categoryId),
                    type: 'GET',
                    success: function(response){
                        $.each(response, function(index, subcategory){
                            $('#subcategoryDropdown').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });
                        $('.form-group.d-none').removeClass('d-none');
                    }
                });
            }
            else {
                $('.form-group.d-none').addClass('d-none');
            }
        });
    });
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>