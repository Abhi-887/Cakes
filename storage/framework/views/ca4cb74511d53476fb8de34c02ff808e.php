<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#general-setting"
                                    role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab4" data-toggle="tab" href="#logo-setting" role="tab"
                                    aria-controls="home" aria-selected="true">Logo Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab4" data-toggle="tab" href="#appearance-setting" role="tab"
                                    aria-controls="home" aria-selected="true">Appearance Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#pusher-setting"
                                    role="tab" aria-controls="profile" aria-selected="false">Pusher Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#mail-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Mail Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#seo-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Seo Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">

                            <?php echo $__env->make('admin.setting.sections.general-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->make('admin.setting.sections.logo-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->make('admin.setting.sections.appearance-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->make('admin.setting.sections.pusher-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->make('admin.setting.sections.mail-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->make('admin.setting.sections.seo-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/setting/index.blade.php ENDPATH**/ ?>