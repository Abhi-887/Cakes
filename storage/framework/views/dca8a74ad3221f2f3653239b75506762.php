<section class="fp__add_slider mt_100 xs_mt_70 pt_100 xs_pt_70 pb_100 xs_pb_70">
    <div class="container">
        <div class="row add_slider wow fadeInUp" data-wow-duration="1s">
            <?php $__currentLoopData = $bannerSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSlider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4">
                <a href="<?php echo e($bannerSlider->url); ?>" class="fp__add_slider_single" style="background: url('<?php echo e(asset($bannerSlider->banner)); ?>');">
                    <div class="text">
                        <h3><?php echo $bannerSlider->title; ?></h3>
                        <p><?php echo $bannerSlider->sub_title; ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/ad-slider.blade.php ENDPATH**/ ?>