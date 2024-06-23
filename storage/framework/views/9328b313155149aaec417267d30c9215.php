<?php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerInfoTwo = \App\Models\FooterInfoTwo::first();
    $footerSocials = \App\Models\FooterSocial::where('status', 1)->get();
    $footerGridTwoLinks = \App\Models\FooterGridTwo::where('status', 1)->get();
    $footerTitle = \App\Models\FooterTitle::first();
    $footerGridThreeLinks = \App\Models\FooterGridThree::where('status', 1)->get();
    $footerGridFourLinks = \App\Models\FooterGridFour::where('status', 1)->get();
?>

<footer>
    <div class="wrapper mx-auto w-100 px-2">
        <div class="">
            <div class="row py-5">
                <div class="col-lg-3 col-md-12 footer-info">
                    <h5 class="mb-xl-3 mb-1 fw-normal text-black mt-xl-0 mt-2"><?php echo e(@$footerInfo->name); ?></h5>
                    <p><strong class="me-2">Address:</strong><span class="text-muted"><?php echo e(@$footerInfo->address); ?></span>
                    </p>
                    <p><strong class="me-2">Email:</strong><span class="text-muted"><?php echo e(@$footerInfo->email); ?></span></p>
                    <p><strong class="me-2">Phone:</strong><span class="text-muted"><?php echo e(@$footerInfo->phone); ?></span>
                    </p>
                </div>

                <div class="col-lg-3 col-md-12 footer-info">
                    <h5 class="mb-xl-3 mb-1 fw-normal text-black mt-xl-0 mt-2"><?php echo e(@$footerInfoTwo->name); ?></h5>
                    <p><strong class="me-2">Address:</strong><?php echo e(@$footerInfoTwo->address); ?></p>
                    <p><strong class="me-2">Email:</strong><?php echo e(@$footerInfoTwo->email); ?></p>
                    <p><strong class="me-2">Phone:</strong><?php echo e(@$footerInfoTwo->phone); ?></p>
                </div>

                <div class="col-xl-2 lh-lg footer-hover">
                    <h5 class="mb-xl-3 mb-1 fw-normal text-black mt-xl-0 mt-2">
                        <?php echo e(@$footerTitle->footer_grid_two_title); ?></h5>
                    <div class="d-none d-xl-inline d-lg-none d-md-none d-sm-none">
                        <?php $__currentLoopData = $footerGridTwoLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="text-decoration-none black-colour"
                                href="<?php echo e($link->url); ?>"><?php echo e($link->name); ?></a><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="col-xl-2 lh-lg footer-hover">
                    <h5 class="mb-xl-3 mb-0 fw-normal text-black mt-xl-0 mt-3">
                        <?php echo e(@$footerTitle->footer_grid_three_title); ?></h5>
                    <div class="d-none d-xl-inline d-lg-none d-md-none">
                        <?php $__currentLoopData = $footerGridThreeLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="text-decoration-none black-colour"
                                href="<?php echo e($link->url); ?>"><?php echo e($link->name); ?></a><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="col-xl-2 lh-lg footer-hover">
                    <h5 class="mb-xl-3 mb-0 fw-normal text-black mt-xl-0 mt-3">
                        <?php echo e(@$footerTitle->footer_grid_four_title); ?></h5>
                    <div class="d-none d-xl-inline d-lg-none d-md-none">
                        <?php $__currentLoopData = $footerGridFourLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="text-decoration-none black-colour"
                                href="<?php echo e($link->url); ?>"><?php echo e($link->name); ?></a><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <hr class="pb-4">
        <div class="container">
            <div class="text-center">
                <div>
                    <h2 class="text-black">Subscribe FREE to 3D Cakes Special Offers</h2>
                    <p class="mt-3 footer-color">Receive discount codes, view our latest designs and find out about
                        special offers</p>
                </div>
            </div>

            <form class="position-relative row justify-content-center">
                <?php echo csrf_field(); ?>
                <div class="row justify-content-center">
                    <div class="col-xl-4 ps-xl-5">
                        <input class="form-control" type="text" name="email" placeholder="Email Address">
                    </div>
                    <div class="col-xl-2">
                        <button type="submit"
                            class="background-light-gray btn btn-dark text-white border border-0 px-5 mt-3 mt-sm-3 mt-md-3 mt-xl-0 subscribe">Subscribe
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <hr class="mt-5">
        <div class="row d-flex justify-content-center align-items-center pb-3">
            <div class="col-md-6 p-0">
                <span class="color-dark-gray fw-semibold">© 3D Cakes. All Rights Reserved.</span>
            </div>
            <div class="col-md-6 text-end">
                <div class="social-links">
                    <?php $__currentLoopData = $footerSocials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($link->url); ?>" class="<?php echo e($link->icon); ?> fs-3 mx-2"></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
    </div>
</footer>

<style>
    footer {
        background-color: #f9f9f9 !important;
    }

    .form-control:focus {
        border-color: white !important;
        box-shadow: none !important;
    }

    .subscribe:hover {
        background: #8daabc !important;
    }
</style>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.subscribe_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route('subscribe-newsletter')); ?>',
                    data: formData,
                    beforeSend: function() {
                        $('.subscribe_btn').attr('disabled', true);
                        $('.subscribe_btn').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        );
                    },
                    success: function(response) {
                        $('.subscribe_form').trigger("reset");
                        $('.subscribe_btn').attr('disabled', false);
                        $('.subscribe_btn').html('Subscribe');
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                        $('.subscribe_btn').attr('disabled', false);
                        $('.subscribe_btn').html('Subscribe');
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/layouts/footer.blade.php ENDPATH**/ ?>