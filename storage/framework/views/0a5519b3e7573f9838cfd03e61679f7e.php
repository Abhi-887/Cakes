

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Wedding Cakes Deposit</h1>
        </div>

       
    </section>
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Wedding Cakes Deposit</h4>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/weddingcakesdeposit/index.blade.php ENDPATH**/ ?>