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
                    <h4>Footer Info</h4>

                  </div>
                  <div class="card-body">
                    <form action="<?php echo e(route('admin.footer-info.update', 1)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                       
                        <div class="row">
						<div class="col-md-6">
                                <div class="form-group">
                                    <label>Footer Info Title</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo e(@$footerInfo->name); ?>">
                                </div>
                        </div>
						
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo e(@$footerInfo->phone); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo e(@$footerInfo->email); ?>">
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo e(@$footerInfo->address); ?>">
                        </div>

                        <div class="form-group">
                            <label>copyright</label>
                            <input type="text" class="form-control" name="copyright" value="<?php echo e(@$footerInfo->copyright); ?>">
                        </div>

                        <button type="submmit" class="btn btn-primary">Update</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/footer/footer-info/index.blade.php ENDPATH**/ ?>