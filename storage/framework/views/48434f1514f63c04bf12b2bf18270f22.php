<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
    <div class="fp_dashboard_body fp__change_password">
        <div class="fp__review_input">
            <h3>change password</h3>
            <div class="comment_input pt-0">
                <form method="POST" action="<?php echo e(route('profile.password.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="fp__comment_imput_single">
                                <label>Current Password</label>
                                <input type="password" placeholder="Current Password" name="current_password">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="fp__comment_imput_single">
                                <label>New Password</label>
                                <input type="password" placeholder="New Password" name="password">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="fp__comment_imput_single">
                                <label>confirm Password</label>
                                <input type="password" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <button type="submit" class="common_btn mt_20">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/dashboard/change-password.blade.php ENDPATH**/ ?>