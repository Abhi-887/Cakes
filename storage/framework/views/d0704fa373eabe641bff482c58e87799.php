<section class="fp__why_choose mt_100 xs_mt_70">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_25">
                    <h4><?php echo @$sectionTitles['why_choose_top_title']; ?></h4>
                    <h2><?php echo @$sectionTitles['why_choose_main_title']; ?></h2>
                    <span>
                        <img src="<?php echo e(asset('frontend/images/heading_shapes.png')); ?>" alt="shapes" class="img-fluid w-100">
                    </span>
                    <p><?php echo @$sectionTitles['why_choose_sub_title']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $whyChooseUs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="fp__choose_single">
                    <div class="icon icon_1">
                        <i class="<?php echo e($item->icon); ?>"></i>
                    </div>
                    <div class="text">
                        <h3><?php echo $item->title; ?></h3>
                        <p><?php echo $item->short_description; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/why-choose.blade.php ENDPATH**/ ?>