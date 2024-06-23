<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Blogs Comments</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Comments</h4>
            </div>
            <div class="card-body">
                <?php echo e($dataTable->table()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/blog/blog-comment/index.blade.php ENDPATH**/ ?>