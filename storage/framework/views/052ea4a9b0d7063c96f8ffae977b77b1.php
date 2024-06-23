<?php $__env->startSection('content'); ?>
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Meet Our Expert Chefs</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="javascript:;">chefs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=============================
        TEAM PAGE START
    ==============================-->
    <section class="fp__team_page pt_95 xs_pt_65 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_team">
                        <div class="fp__single_team_img">
                            <img src="<?php echo e(asset($chef->image)); ?>" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="fp__single_team_text">
                            <h4><?php echo e($chef->name); ?></h4>
                            <p><?php echo e($chef->title); ?></p>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <?php if($chef->fb): ?>
                                <li><a href="<?php echo e($chef->fb); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                                <?php if($chef->in): ?>
                                <li><a href="<?php echo e($chef->in); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php endif; ?>
                                <?php if($chef->x): ?>
                                <li><a href="<?php echo e($chef->x); ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if($chef->web): ?>
                                <li><a href="<?php echo e($chef->web); ?>"><i class="fas fa-link"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($chefs->hasPages()): ?>
            <div class="fp__pagination mt_60">
                <div class="row">
                    <div class="col-12">
                        <?php echo e($chefs->links()); ?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!--=============================
        TEAM PAGE END
    ==============================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/chefs.blade.php ENDPATH**/ ?>