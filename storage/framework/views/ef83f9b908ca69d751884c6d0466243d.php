<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Counter</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Counter</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.counter.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Background</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="background" id="image-upload" />
                            <input type="hidden" name="old_background" id="image-upload" value="<?php echo e(@$counter->background); ?>" />
                          </div>
                    </div>

                    <h6>Counter One</h6>
                    <hr>
                    <div class="form-group">
                        <label for="">Counter Icon One</label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_one" data-icon="<?php echo e(@$counter->counter_icon_one); ?>"></button>
                    </div>

                    <div class="form-group">
                        <label for="">Counter count One</label>
                        <input type="text" class="form-control" name="counter_count_one" value="<?php echo e(@$counter->counter_count_one); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Counter count Name</label>
                        <input type="text" class="form-control" name="counter_name_one" value="<?php echo e(@$counter->counter_name_one); ?>">
                    </div>

                    <h6>Counter Two</h6>
                    <hr>
                    <div class="form-group">
                        <label for="">Counter Icon Two</label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_two" data-icon="<?php echo e(@$counter->counter_icon_two); ?>"></button>
                    </div>

                    <div class="form-group">
                        <label for="">Counter count Two</label>
                        <input type="text" class="form-control" name="counter_count_two" value="<?php echo e(@$counter->counter_count_two); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Counter count Name Two</label>
                        <input type="text" class="form-control" name="counter_name_two" value="<?php echo e(@$counter->counter_name_two); ?>">
                    </div>


                    <h6>Counter Three</h6>
                    <hr>
                    <div class="form-group">
                        <label for="">Counter Icon Three</label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_three" data-icon="<?php echo e(@$counter->counter_icon_three); ?>"></button>
                    </div>

                    <div class="form-group">
                        <label for="">Counter Count Three</label>
                        <input type="text" class="form-control" name="counter_count_three" value="<?php echo e(@$counter->counter_count_three); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Counter count Name Theree</label>
                        <input type="text" class="form-control" name="counter_name_three" value="<?php echo e(@$counter->counter_name_three); ?>">
                    </div>

                    <h6>Counter Four</h6>
                    <hr>
                    <div class="form-group">
                        <label for="">Counter Icon Four</label>
                        <br>
                        <button class="btn btn-secondary" role="iconpicker" name="counter_icon_four" data-icon="<?php echo e(@$counter->counter_icon_four); ?>"></button>
                    </div>

                    <div class="form-group">
                        <label for="">Counter Count Four</label>
                        <input type="text" class="form-control" name="counter_count_four" value="<?php echo e(@$counter->counter_count_four); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Counter count Name Four</label>
                        <input type="text" class="form-control" name="counter_name_four" value="<?php echo e(@$counter->counter_name_four); ?>">
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
                'background-image': 'url(<?php echo e(asset(@$counter->background)); ?>)',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/counter/index.blade.php ENDPATH**/ ?>