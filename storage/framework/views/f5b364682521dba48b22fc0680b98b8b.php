<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="description" content="<?php echo e(config('settings.seo_description')); ?>">
    <meta name="keywords" content="<?php echo e(config('settings.seo_keywords')); ?>">

    <?php echo $__env->yieldContent('og_metatag_section'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo e(config('settings.seo_title')); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset(config('settings.favicon'))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/spacing.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/venobox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery.exzoom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/toastr.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/custom.css')); ?>">

    

    <script>
        var pusherKey = "<?php echo e(config('settings.pusher_key')); ?>";
        var pusherCluster = "<?php echo e(config('settings.pusher_cluster')); ?>";
        var loggedInUserId = "<?php echo e(auth()->user()->id ?? ''); ?>";
    </script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js', 'resources/js/frontend.js']); ?>
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>
    <div class="overlay-container d-none">
        <div class="overlay">
            <span class="loader"></span>
        </div>
    </div>
    <!--=============================
        Cart Popup Modal Start
    ==============================-->
    <div class="fp__cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body load_product_modal_body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=============================
        Cart Popup Modal End
    ==============================-->

    <!--=============================
        TOPBAR START
    ==============================-->
    <div class="header-top">
        <section class="wrapper px-3 mx-auto w-100">
            <div class="row align-items-center py-2">
                <div class="col-md-6 text-center text-sm-center text-md-start text-lg-start">
                    <div class="d-flex">
                        <h6 class="me-5"><b>Edinburgh:</b> 0131 337 9990</h6>
                        <h6 class=""><b>Glasgow:</b> 0141 378 0027</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="text-uppercase d-none d-md-flex d-lg-flex justify-content-end">
                        <li class="pe-3"><a class="text-decoration-none black text-dark" href="/login">My
                                Account</a></li>
                        <li class="pe-3"><a class="text-decoration-none black text-dark" href="/">My
                                Wishlist</a></li>
                        <li class=""><a class="text-decoration-none black text-dark" href="/admin/dashboard">Log
                                In</a></li>
                    </ul>
                </div>
            </div>
            <div class="row d-md-none d-lg-none mt-5 px-5">
                <div class="col-6 p-0 text-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary rounded-0 bg-black dropdown-toggle w-100 menu-btn"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="menu-icon" src="image/menu(1).png" alt="">
                        </button>
                        <ul class="dropdown-menu slider w-75 p-0">
                            <li><a class="dropdown-item" href="#">MY ACCOUNT</a></li>
                            <li><a class="dropdown-item" href="#">MY WISHLIST</a></li>
                            <li><a class="dropdown-item" href="#">LOG IN</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 p-0">
                    <div class="dropdown">
                        <button class="btn btn-secondary rounded-0 bg-black dropdown-toggle w-100" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><img class="menu-icon1 p-1 "
                                src="image/cart.png" alt=""></button>

                        <ul class="dropdown-menu  p-0">
                            <li class="px-3 py-1"><a class="dropdown-item p-0" href="#">You have no
                                    items in your</a>
                            </li>
                            <li class="px-3 py-1"><a class="dropdown-item p-0" href="#">shopping
                                    cart.</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--=============================
        TOPBAR END
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
    <?php echo $__env->make('frontend.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--=============================
        MENU END
    ==============================-->


    <?php echo $__env->yieldContent('content'); ?>


    <!--=============================
        FOOTER START
    ==============================-->
    <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--=============================
        FOOTER END
    ==============================-->


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="fp__scroll_btn">
        Go To Top
    </div>
    <!--=============================
        SCROLL BUTTON END
    ==============================-->


    <!--jquery library js-->
    <script src="<?php echo e(asset('frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    <!--bootstrap js-->
    <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <!--font-awesome js-->
    <script src="<?php echo e(asset('frontend/js/Font-Awesome.js')); ?>"></script>
    <!-- slick slider -->
    <script src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
    <!-- isotop js -->
    <script src="<?php echo e(asset('frontend/js/isotope.pkgd.min.js')); ?>"></script>
    <!-- simplyCountdownjs -->
    <script src="<?php echo e(asset('frontend/js/simplyCountdown.js')); ?>"></script>
    <!-- counter up js -->
    <script src="<?php echo e(asset('frontend/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery.countup.min.js')); ?>"></script>
    <!-- nice select js -->
    <script src="<?php echo e(asset('frontend/js/jquery.nice-select.min.js')); ?>"></script>
    <!-- venobox js -->
    <script src="<?php echo e(asset('frontend/js/venobox.min.js')); ?>"></script>
    <!-- sticky sidebar js -->
    <script src="<?php echo e(asset('frontend/js/sticky_sidebar.js')); ?>"></script>
    <!-- wow js -->
    <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
    <!-- ex zoom js -->
    <script src="<?php echo e(asset('frontend/js/jquery.exzoom.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/js/toastr.min.js')); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--main/custom js-->
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>

    <!-- show dynamic validation message-->
    <script>
        toastr.options.progressBar = true;

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>")
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        // Set csrf at ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('.button-click').click();
        })
    </script>

    <!-- Load global js -->
    <?php echo $__env->make('frontend.layouts.global-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/layouts/master.blade.php ENDPATH**/ ?>