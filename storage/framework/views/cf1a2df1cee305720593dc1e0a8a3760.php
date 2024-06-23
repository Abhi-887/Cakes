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
                    <h4>Edit Footer Social</h4>

                  </div>
                  <div class="card-body">
                    <form action="<?php echo e(route('admin.footer-socials.update', $footer->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label>Icon</label>
                             <div>
                                <button class="btn btn-primary" data-icon="<?php echo e($footer->icon); ?>" data-selected-class="btn-danger"
                                data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                             </div>

                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($footer->name); ?>">
                        </div>
                        <div class="form-group">
                            <label>url</label>
                            <input type="text" class="form-control" name="url" value="<?php echo e($footer->url); ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option <?php echo e($footer->status === 1 ? 'selected': ''); ?> value="1">Active</option>
                              <option <?php echo e($footer->status === 0 ? 'selected': ''); ?> value="0">Inactive</option>
                            </select>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/footer/footer-socials/edit.blade.php ENDPATH**/ ?>