<div class="tab-pane fade" id="v-pills-reservation" role="tabpanel" aria-labelledby="v-pills-reservation-tab">
    <div class="fp_dashboard_body">
        <h3>Reservations</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="t_header">
                            <th>No</th>
                            <th>Reseration Id</th>
                            <th>Date/Time</th>
                            <th>Person</th>
                            <th>Status</th>

                        </tr>
                        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <h5><?php echo e(++$loop->index); ?></h5>
                            </td>
                            <td>
                                <?php echo e($reservation->reservation_id); ?>

                            </td>
                            <td>
                                <?php echo e($reservation->date); ?> | <?php echo e($reservation->time); ?>

                            </td>
                            <td>
                                <?php echo e($reservation->persons); ?>

                            </td>
                            <td>
                                <?php if($reservation->status === 'pending'): ?>
                                <span class="active">Pending</span>
                                <?php elseif($reservation->status === 'approve'): ?>
                                <span class="active">Approve</span>
                                <?php elseif($reservation->status === 'complete'): ?>
                                <span class="complete">Complete</span>
                                <?php elseif($reservation->status === 'cancel'): ?>
                                <span class="cancel">Cancel</span>
                                <?php endif; ?>
                            </td>
 
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="fp__invoice invoice_details_<?php echo e($order->id); ?>">
            <a class="go_back d-print-none"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
            <div class="fp__track_order d-print-none">
                <ul>

                    <?php if($order->order_status === 'declined'): ?>

                    <li class="
                    declined_status
                    <?php echo e(in_array($order->order_status, ['declined']) ? 'active' : ''); ?>

                    ">order declined</li>
                    <?php else: ?>
                    <li class="
                    <?php echo e(in_array($order->order_status, ['pending', 'in_process', 'delivered', 'declined']) ? 'active' : ''); ?>

                    ">order pending</li>
                    <li class="
                    <?php echo e(in_array($order->order_status, ['in_process', 'delivered', 'declined']) ? 'active' : ''); ?>

                    ">order in process</li>
                    <li class="
                    <?php echo e(in_array($order->order_status, ['delivered']) ? 'active' : ''); ?>

                    ">order delivered</li>
                    <?php endif; ?>
                    
                </ul>
            </div>
            <div class="fp__invoice_header">
                <div class="header_address">
                    <h4>invoice to</h4>
                    <p><?php echo e(@$order->userAddress->first_name); ?></p>
                    <p><?php echo e($order->address); ?></p>
                    <p><?php echo e(@$order->userAddress->phone); ?></p>
                    <p><?php echo e(@$order->userAddress->email); ?></p>

                </div>
                <div class="header_address" style="width: 50%">
                    <p><b style="width: 140px">invoice no: </b><span><?php echo e(@$order->invoice_id); ?></span></p>
                    <p><b style="width: 140px">Payment Status: </b><span><?php echo e(@$order->payment_status); ?></span></p>
                    <p><b style="width: 140px">Payment Method: </b><span><?php echo e(@$order->payment_method); ?></span></p>
                    <p><b style="width: 140px">Transaction Id: </b><span><?php echo e(@$order->transaction_id); ?></span></p>



                    <p><b style="width: 140px">date:</b> <span><?php echo e(date('d-m-Y', strtotime($order->created_at))); ?></span></p>
                </div>
            </div>
            <div class="fp__invoice_body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr class="border_none">
                                <th class="sl_no">SL</th>
                                <th class="package">item description</th>
                                <th class="price">Price</th>
                                <th class="qnty">Quantity</th>
                                <th class="total">Total</th>
                            </tr>

                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $size = json_decode($item->product_size);
                                $options = json_decode($item->product_option);

                                $qty = $item->qty;
                                $untiPrice = $item->unit_price;
                                $sizePrice = $size->price ?? 0;

                                $optionPrice = 0;
                                foreach ($options as $optionItem) {
                                    $optionPrice += $optionItem->price;
                                }

                                $productTotal = ($untiPrice + $sizePrice + $optionPrice) * $qty;
                            ?>
                            <tr>
                                <td class="sl_no"><?php echo e(++$loop->index); ?></td>
                                <td class="package">
                                    <p><?php echo e($item->product_name); ?></p>
                                    <span class="size"><?php echo e(@$size->name); ?> - <?php echo e(@$size->price ? currencyPosition(@$size->price) : ''); ?></span>
                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="coca_cola"><?php echo e(@$option->name); ?> - <?php echo e(@$option->price ? currencyPosition(@$option->price) : ''); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td class="price">
                                    <b><?php echo e(currencyPosition($item->unit_price)); ?></b>
                                </td>
                                <td class="qnty">
                                    <b><?php echo e($item->qty); ?></b>
                                </td>
                                <td class="total">
                                    <b><?php echo e(currencyPosition($productTotal)); ?></b>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="package" colspan="3">
                                    <b>sub total</b>
                                </td>
                                <td class="qnty">
                                    <b>-</b>
                                </td>
                                <td class="total">
                                    <b><?php echo e(currencyPosition($order->subtotal)); ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="package coupon" colspan="3">
                                    <b>(-) Discount coupon</b>
                                </td>
                                <td class="qnty">
                                    <b></b>
                                </td>
                                <td class="total coupon">
                                    <b><?php echo e(currencyPosition($order->discount)); ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="package coast" colspan="3">
                                    <b>(+) Shipping Cost</b>
                                </td>
                                <td class="qnty">
                                    <b></b>
                                </td>
                                <td class="total coast">
                                    <b><?php echo e(currencyPosition($order->delivery_charge)); ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="package" colspan="3">
                                    <b>Total Paid</b>
                                </td>
                                <td class="qnty">
                                    <b></b>
                                </td>
                                <td class="total">
                                    <b><?php echo e(currencyPosition($order->grand_total)); ?></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <a class="print_btn common_btn d-print-none" href="javascript:;" onclick="printInvoice('<?php echo e($order->id); ?>')"><i class="far fa-print "></i> print
                PDF</a>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function viewInvoice(id){
            $(".fp_dashboard_order").fadeOut();
            $(".invoice_details_"+id).fadeIn();
        }

        function printInvoice(id) {
            let printContents = $('.invoice_details_'+id).html();

            let printWindow = window.open('', '', 'width=600,height=600');
            printWindow.document.open();
            printWindow.document.write('<html>');
            printWindow.document.write('<link rel="stylesheet" href="<?php echo e(asset("frontend/css/bootstrap.min.css")); ?>">');
            printWindow.document.write('<link rel="stylesheet" href="<?php echo e(asset("frontend/css/style.css")); ?>');

            printWindow.document.write('<body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.print();
            printWindow.close();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/dashboard/sections/reservation-section.blade.php ENDPATH**/ ?>