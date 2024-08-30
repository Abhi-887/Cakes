<?php
namespace App\Listeners;

use App\Events\OrderPaymentUpdateEvent;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderPaymentUpdateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPaymentUpdateEvent $event): void
    {
        $orderId = $event->orderId;
        $order = Order::find($orderId);

        // Update the payment information
        $order->payment_method = $event->paymentMethod;
        $order->payment_status = $event->paymentInfo['status'];
        $order->payment_approve_date = now();
        $order->transaction_id = $event->paymentInfo['transaction_id'];
        $order->currency_name = $event->paymentInfo['currency'];
        $order->save();

        // Check if the payment status is successful
        if ($event->paymentInfo['status'] === 'completed') {
            // Loop through the order items and decrease the product quantity if trackable
            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $orderItem) {
                $productModel = Product::find($orderItem->product_id);
                if ($productModel && $productModel->track_stock == 1) {  // Check if track_stock is 1
                    $productModel->decrement('quantity', $orderItem->qty);

                    // If the product quantity is now 0 or less, mark it as out of stock
                    if ($productModel->quantity <= 0) {
                        $productModel->update(['out_of_stock' => 1]);
                    }
                }
            }
        }
    }
}
