<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>About</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update About</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.about.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="<?php echo e(@$about->image); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e(@$about->title); ?>">
                    </div>
                    <div class="form-group">
                        <label>Main Title</label>
                        <input type="text" name="main_title" class="form-control" value="<?php echo e(@$about->main_title); ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="summernote" class="form-control"><?php echo @$about->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Youtube Video Link</label>
                        <input type="text" name="video_link" class="form-control" value="<?php echo e(@$about->video_link); ?>">
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
                'background-image': 'url(<?php echo e(asset(@$about->image)); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/about/index.blade.php ENDPATH**/ ?>