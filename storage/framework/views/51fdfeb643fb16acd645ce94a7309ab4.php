<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Coupon</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Coupon</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.coupon.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                </div>

                <div class="form-group">
                    <label>Coupon Code</label>
                    <input type="text" name="code" class="form-control" value="<?php echo e(old('code')); ?>">
                </div>

                <div class="form-group">
                    <label>Coupon Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>">
                </div>

                <div class="form-group">
                    <label>Minumum Purchase Price</label>
                    <input type="text" name="min_purchase_amount" class="form-control" value="<?php echo e(old('min_purchase_amount')); ?>">
                </div>

                <div class="form-group">
                    <label>Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" value="<?php echo e(old('date')); ?>">
                </div>

                <div class="form-group">
                    <label>Discount Type</label>
                    <select name="discount_type" class="form-control" id="">
                        <option value="percent">Percent</option>
                        <option value="amount">Amount (<?php echo e(config('settings.site_currency_icon')); ?>)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Discount Amount</label>
                    <input type="text" name="discount" class="form-control" value="<?php echo e(old('discount')); ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/coupon/create.blade.php ENDPATH**/ ?>