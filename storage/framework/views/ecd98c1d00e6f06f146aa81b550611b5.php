<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Blog</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Blog</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.blogs.update', $blog->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                        <input type="hidden" name="old_image" value="<?php echo e($blog->image); ?>" />
                      </div>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo e($blog->title); ?>">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control select2" id="" >
                        <option value="">select</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($category->id === $blog->category_id): echo 'selected'; endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control summernote" id=""><?php echo $blog->description; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?php echo e($blog->seo_title); ?>">
                </div>

                <div class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control" id=""><?php echo e($blog->seo_description); ?></textarea>
                </div>


                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option <?php if($blog->status === 1): echo 'selected'; endif; ?> value="1">Active</option>
                        <option <?php if($blog->status === 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('.image-preview').css({
                'background-image': 'url(<?php echo e(asset($blog->image)); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/blog/edit.blade.php ENDPATH**/ ?>