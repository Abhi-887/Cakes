<div class="tab-pane fade" id="v-pills-review" role="tabpanel"
aria-labelledby="v-pills-review-tab">
<div class="fp_dashboard_body dashboard_review">
    <h3>review</h3>
    <div class="fp__review_area">
        <div class="fp__comment pt-4 mt_20">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            <div class="fp__single_comment m-0 border-0">
                <img src="<?php echo e(asset($review->user->avatar)); ?>" alt="review" class="img-fluid">
                <div class="fp__single_comm_text">
                    <h3><a href="javascript:;"><?php echo e($review->user->name); ?></a> <span><?php echo e(date('d m Y', strtotime($review->created_at))); ?> </span>
                    </h3>
                    <span class="rating">
                        <?php for($i = 1; $i <= $review->rating; $i++): ?> 
                        <i class="fas fa-star"></i>
                        <?php endfor; ?>
                        
                    </span>
                    <p><?php echo e($review->review); ?></p>
                    <?php if($review->status === 1): ?>
                    <span class="status active">Active</span>
                    <?php else: ?>
                    <span class="status inactive">Pending</span>

                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(count($reviews) === 0): ?>
                <h5>No reviews added!</h5>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/dashboard/sections/review-section.blade.php ENDPATH**/ ?>