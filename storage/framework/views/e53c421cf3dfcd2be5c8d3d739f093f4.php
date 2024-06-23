<?php $__env->startSection('content'); ?>
<!--=============================
            BANNER START
        ==============================-->
<?php echo $__env->make('frontend.home.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--=============================
            BANNER END
        ==============================-->


<!--=============================
            BLOCKS START
        ==============================-->
<?php echo $__env->make('frontend.home.components.block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--=============================
            BLOCKS END
        ==============================-->





<!--=============================
            ABOUT START
        ==============================-->
<?php echo $__env->make('frontend.home.components.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=============================
			ABOUT END
        ==============================-->


<!--=============================
            MENU ITEM START
        ==============================-->
<?php echo $__env->make('frontend.home.components.menu-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--=============================
            MENU ITEM END
        ==============================-->









<!--=============================
           TESTIMONIAL  START
        ==============================-->
<?php echo $__env->make('frontend.home.components.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=============================
            TESTIMONIAL END
        ==============================-->





<!--=============================
            BLOG 2 START
        ==============================-->
<?php echo $__env->make('frontend.home.components.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--=============================
            BLOG 2 END
        ==============================-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/index.blade.php ENDPATH**/ ?>