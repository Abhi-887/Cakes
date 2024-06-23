<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Menu Builder</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>All Menus</h4>
        </div>
        <div class="card-body">
            <?php echo Menu::render(); ?>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo Menu::scripts(); ?>

<?php $__env->stopPush(); ?>






<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/menu-builder/index.blade.php ENDPATH**/ ?>