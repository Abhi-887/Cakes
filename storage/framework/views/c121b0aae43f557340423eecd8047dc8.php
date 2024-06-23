<?php $__env->startSection('content'); ?>
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Order</h1>
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PAYMENT PAGE START
    ==============================-->
    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="text-center ">
                    <div class="mb-4">
                        <i class="fas fa-times-circle" style="font-size: 100px;
                        color: red;"></i>
                    </div>

                    <h4>Transaction Faild!</h4>
                    <p><b class="mx-5"><?php echo e(session()->has('errors') ? session('errors')->first('error') : ''); ?></b></p>
                    <a class="common_btn mt-4" href="<?php echo e(route('dashboard')); ?>">Go to Payment Page</a>
                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/payment-cancel.blade.php ENDPATH**/ ?>