<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
aria-labelledby="v-pills-home-tab">
<div class="fp_dashboard_body">
    <h3>Welcome to your Profile</h3>

    <div class="fp__dsahboard_overview">
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>total order <span>(<?php echo e($totalOrders); ?>)</span></h4>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item green">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>Completed <span>(<?php echo e($totalCompleteOrders); ?>)</span></h4>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item red">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>cancel <span>(<?php echo e($totalCancelOrders); ?>)</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="fp_dash_personal_info">
        <h4>Parsonal Information
            <a class="dash_info_btn">
                <span class="edit">edit</span>
                <span class="cancel">cancel</span>
            </a>
        </h4>

        <div class="personal_info_text">
            <p><span>Name:</span> <?php echo e(auth()->user()->name); ?></p>
            <p><span>Email:</span> <?php echo e(auth()->user()->email); ?></p>
        </div>

        <div class="fp_dash_personal_info_edit comment_input p-0">
            <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="fp__comment_imput_single">
                            <label>name</label>
                            <input type="text" placeholder="Name" name="name" value="<?php echo e(auth()->user()->name); ?>">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="fp__comment_imput_single">
                            <label>email</label>
                            <input type="email" placeholder="Email" name="email" value="<?php echo e(auth()->user()->email); ?>">
                        </div>
                    </div>

                    <div class="col-xl-12">

                        <button type="submit" class="common_btn">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/dashboard/sections/personal-info-section.blade.php ENDPATH**/ ?>