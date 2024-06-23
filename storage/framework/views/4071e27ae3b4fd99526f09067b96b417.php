<?php
    $selectedOption = $selectedOption ?? null;
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $sliders2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($slider->show_at_home == $selectedOption || is_null($selectedOption) || $selectedOption === ''): ?>
                    <div class="col-12 col-md-6 col-lg-4 my-3">
                        <a class="w-100" href="<?php echo e($slider->button_link); ?>">
                            <div class="image-block position-relative overflow-hidden rounded-3">
                                <img src="<?php echo e(asset($slider->image)); ?>" class="img-fluid w-100 h-100"
                                    alt="<?php echo e($slider->title); ?>">
                                <div
                                    class="overlay image-textblock position-absolute w-100 h-100 d-flex top-0 start-0 justify-content-center align-items-center">
                                    <h3 class="overlay-text text-white text-center"><?php echo e($slider->title); ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<style>
    .image-block {
        height: 300px;
    }

    .image-textblock {
        background-color: rgba(0, 0, 0, 0.5);
        transition: opacity 0.3s ease;
        z-index: 0 !important;
    }

    .image-block:hover .image-textblock {
        opacity: 1;
    }

    .overlay-text {
        transform: translateY(100%);
        transition: transform 0.5s ease-out, opacity 0.5s ease-out;
        opacity: 0;
    }

    .image-block:hover .overlay-text {
        transform: translateY(0);
        opacity: 1;
    }
</style>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/block.blade.php ENDPATH**/ ?>