<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Product</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.product.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" id="categoryDropdown">
                        <option value="">Select</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($category->parent === 0): ?>
                                <option value="<?php echo e($category->id); ?>" data-parent="<?php echo e($category->parent); ?>"><?php echo e($category->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group d-none">
                    <label>Sub Category</label>
                    <select name="sub" class="form-control" id="subcategoryDropdown">
                    </select>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo e(old('price')); ?>">
                </div>

                <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" name="offer_price" class="form-control" value="<?php echo e(old('offer_price')); ?>">
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id=""><?php echo e(old('short_description')); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control summernote" id=""><?php echo e(old('long_description')); ?></textarea>
                </div>

                <div class="form-group">
                    <label>Sku</label>
                    <input type="text" name="sku" class="form-control" value="<?php echo e(old('sku')); ?>">
                </div>

                <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?php echo e(old('seo_title')); ?>">
                </div>

                <div class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control" id=""><?php echo e(old('seo_description')); ?></textarea>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/product/create.blade.php ENDPATH**/ ?>