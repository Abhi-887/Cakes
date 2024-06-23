<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo e(config('settings.site_name')); ?> | Dashboard</title>
	<link rel="icon" href="<?php echo e(asset('frontend/images/3d-cakes-favicon.png')); ?>" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/fontawesome/css/all.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/toastr.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/bootstrap-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/components.css')); ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        var pusherKey = "<?php echo e(config('settings.pusher_key')); ?>";
        var pusherCluster = "<?php echo e(config('settings.pusher_cluster')); ?>";
        var loggedInUserId = "<?php echo e(auth()->user()->id); ?>";
    </script>
    <!-- /END GA -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js', 'resources/js/admin.js']); ?>

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?php echo e(date('Y')); ?> <div class="bullet"></div> Developed By DrupalBuilder Pvt. Ltd
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('admin/assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/stisla.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('admin/assets/modules/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
    <!-- Template JS File -->
    <script src="<?php echo e(asset('admin/assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/custom.js')); ?>"></script>



    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- show dynamic validation message-->
    <script>
        toastr.options.progressBar = true;

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>")
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>

    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {

            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault()

                let url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {_token: "<?php echo e(csrf_token()); ?>"},
                            success: function(response) {
                                if(response.status === 'success'){
                                    toastr.success(response.message)

                                    window.location.reload();

                                }else if(response.status === 'error'){
                                    toastr.error(response.message)
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        })
                    }
                })
            })

        })

    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>