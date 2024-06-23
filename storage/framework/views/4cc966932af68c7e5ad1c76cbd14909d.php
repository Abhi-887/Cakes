<?php $__env->startSection('content'); ?>
      <!-- Main Content -->
      <section class="section">
        <div class="section-header">
          <h1>Footer</h1>
        </div>

        <div class="section-body">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Footer Grid Four Title</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo e(route('admin.footer-grid-four.change-title')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="col-4">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" name="title" value="<?php echo e(@$footerTitle->footer_grid_four_title); ?>">
                            <button type="submit" class="btn btn-primary ml-4">Save</button>
                        </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </section>

        <section class="section">

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Footer Grid Three</h4>
                    <div class="card-header-action">
                        <a href="<?php echo e(route('admin.footer-grid-four.create')); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <?php echo e($dataTable->table()); ?>

                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "<?php echo e(route('admin.footer-grid-three.change-status')); ?>",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })

            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/footer/footer-grid-four/index.blade.php ENDPATH**/ ?>