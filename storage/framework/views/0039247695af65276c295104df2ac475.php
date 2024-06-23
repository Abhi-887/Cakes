<?php $__env->startSection('content'); ?>
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Our Customar Feedbacks</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="javascript:;">Testimonial</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->


    <!--=============================
            TESTIMONIAL PAGE START
        ==============================-->
    <section class="fp__testimonial_page mt_95 xs_mt_65 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_testimonial">
                            <div class="fp__testimonial_header d-flex flex-wrap align-items-center">
                                <div class="img">
                                    <img src="<?php echo e(asset($testimonial->image)); ?>" alt="clients" class="img-fluid w-100">
                                </div>
                                <div class="text">
                                    <h4><?php echo e($testimonial->name); ?></h4>
                                    <p><?php echo e($testimonial->title); ?></p>
                                </div>
                            </div>
                            <div class="fp__single_testimonial_body">
                                <p class="feedback"><?php echo e($testimonial->review); ?></p>
                                <span class="rating">
                                    <?php for($i = 1; $i <= $testimonial->rating; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($testimonials->hasPages()): ?>
                <div class="fp__pagination mt_60">
                    <div class="row">
                        <div class="col-12">
                            <?php echo e($testimonials->links()); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!--=============================
            TESTIMONIAL PAGE END
        ==============================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/testimonial.blade.php ENDPATH**/ ?>