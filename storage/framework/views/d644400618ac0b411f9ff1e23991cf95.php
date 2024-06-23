<?php $__env->startSection('content'); ?>
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1><?php echo e($page->name); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="javascript:;"><?php echo e($page->name); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->


    <!--================================
            Trams And Condtions START
        =================================-->
    <section class="fp__terms_condition mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__career_det_text">
                        <?php echo $page->content; ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================================
            Trams And Condtions END
        =================================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/custom-page.blade.php ENDPATH**/ ?>