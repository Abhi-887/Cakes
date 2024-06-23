<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Testimonials</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Testimonial</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.testimonial.update', $testimonial->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="<?php echo e($testimonial->image); ?>" />

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($testimonial->name); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo e($testimonial->title); ?>">
                    </div>

                    <div class="form-group">
                        <label>Rating</label>
                        <select name="rating" class="form-control" id="">
                            <option <?php if($testimonial->rating === 1): echo 'selected'; endif; ?> value="1">1</option>
                            <option <?php if($testimonial->rating === 2): echo 'selected'; endif; ?> value="2">2</option>
                            <option <?php if($testimonial->rating === 3): echo 'selected'; endif; ?> value="3">3</option>
                            <option <?php if($testimonial->rating === 4): echo 'selected'; endif; ?> value="4">4</option>
                            <option <?php if($testimonial->rating === 5): echo 'selected'; endif; ?> value="5">5</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Review</label>
                        <textarea name="review" id="" class="form-control"><?php echo e($testimonial->review); ?></textarea>
                    </div>


                    <div class="form-group">
                        <label>Show at Home</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option <?php if($testimonial->show_at_home === 0): echo 'selected'; endif; ?> value="0">No</option>
                            <option <?php if($testimonial->show_at_home === 1): echo 'selected'; endif; ?> value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option <?php if($testimonial->status === 1): echo 'selected'; endif; ?> value="1">Active</option>
                            <option <?php if($testimonial->status === 0): echo 'selected'; endif; ?> value="0">Inactive</option>
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
                'background-image': 'url(<?php echo e(asset($testimonial->image)); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/testimonial/edit.blade.php ENDPATH**/ ?>