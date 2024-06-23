<section class="fp__team pt_95 xs_pt_65 pb_50">
    <div class="container">

        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_25">
                    <h4><?php echo e(@$sectionTitles['chef_top_title']); ?></h4>
                    <h2><?php echo e(@$sectionTitles['chef_main_title']); ?></h2>
                    <span>
                        
                    </span>
                    <p><?php echo e(@$sectionTitles['chef_sub_title']); ?></p>
                </div>
            </div>
        </div>

        <div class="row team_slider">
            <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
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
    </div>
</section>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/team.blade.php ENDPATH**/ ?>