<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Reservation</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Reservation</h4>
            </div>
            <div class="card-body">
                <?php echo e($dataTable->table()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


    <script>
        $(document).ready(function(){
            $('body').on('change', '.reservation_status', function(){
                let status = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route("admin.reservation.update")); ?>',
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        status: status,
                        id: id
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/reservation/index.blade.php ENDPATH**/ ?>