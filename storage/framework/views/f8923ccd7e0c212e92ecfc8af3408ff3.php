<div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
    <div class="fp_dashboard_body">
        <h3>Wishlist</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="t_header">
                            <th>No</th>
                            <th style="width: 40%">Product</th>
                            <th>Stock</th>
                            <th>action</th>

                        </tr>
                        <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <h5><?php echo e(++$loop->index); ?></h5>
                            </td>
                            <td style="width: 40%">
                                <?php echo e($item->product->name); ?>

                            </td>
                            <td>
                                <?php if($item->product->quantity > 0): ?>
                                    <h5 class="text-success">In Stock</h5>
                                <?php else: ?>
                                    <h5 class="text-danger">Out of Stock</h5>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('product.show', $item->product->slug)); ?>" class="view_invoice">View Product</a>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/dashboard/sections/wishlist-section.blade.php ENDPATH**/ ?>