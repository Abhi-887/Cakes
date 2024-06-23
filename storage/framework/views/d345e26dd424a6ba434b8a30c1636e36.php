<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Contact</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Updated Contact</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.contact.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="">Phone One</label>
                        <input type="text" class="form-control" name="phone_one" value="<?php echo e(@$contact->phone_one); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Phone Two</label>
                        <input type="text" class="form-control" name="phone_two" value="<?php echo e(@$contact->phone_two); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Email One</label>
                        <input type="text" class="form-control" name="mail_one" value="<?php echo e(@$contact->mail_one); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Email Two</label>
                        <input type="text" class="form-control" name="mail_two" value="<?php echo e(@$contact->mail_two); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        
						<textarea name="address" class="form-control summernote"><?php echo e(@$contact->address); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Google Map Link</label>
                        <input type="text" class="form-control" name="map_link" value="<?php echo e(@$contact->map_link); ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/contact/index.blade.php ENDPATH**/ ?>