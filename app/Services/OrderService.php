<?php
namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\CouponUsageLog; // Add this import

class OrderService
{

    /** Store Order in Database  */
    function createOrder()
    {
        try {
            // Create a new order
            $order = new Order();
            $order->invoice_id = generateInvoiceId();
            $order->user_id = auth()->user()->id;
            $order->address = session()->get('address');
            $order->discount = session()->get('coupon')['discount'] ?? 0;
            $order->delivery_charge = session()->get('delivery_fee');
            $order->subtotal = cartTotal();
            $order->grand_total = grandCartTotal(session()->get('delivery_fee'));
            $order->product_qty = \Cart::content()->count();
            $order->payment_method = NULL;
            $order->payment_status = 'pending';
            $order->payment_approve_date = NULL;
            $order->transaction_id = NULL;
            $order->coupon_info = json_encode(session()->get('coupon'));

            // Get coupon code from session and store coupon ID if it exists
            $couponCode = session()->get('coupon')['code'] ?? null;
            if ($couponCode) {
                $coupon = Coupon::where('code', $couponCode)->first();
                if ($coupon) {
                    $order->coupon_id = $coupon->id;
                }
            }

            $order->currency_name = NULL;
            $order->order_status = 'pending';
            $order->address_id = session()->get('address_id');
            $order->save();

            // Loop through the cart items and create order items
            foreach (\Cart::content() as $product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_name = $product->name;
                $orderItem->product_id = $product->id;
                $orderItem->unit_price = $product->price;
                $orderItem->qty = $product->qty;
                $orderItem->product_size = json_encode($product->options->product_size);
                $orderItem->product_option = json_encode($product->options->product_options);
                $orderItem->save();

                // // Decrease the product quantity
                // $productModel = Product::find($product->id);
                // if ($productModel) {
                //     $productModel->decrement('quantity', $product->qty);

                //     // If the product quantity is now 0 or less, mark it as out of stock
                //     if ($productModel->quantity <= 0) {
                //         $productModel->update(['out_of_stock' => 1]);
                //     }
                // }
            }

            // Log coupon usage if a coupon was applied
            if ($couponCode && isset($coupon)) {
                CouponUsageLog::create([
                    'user_id' => auth()->user()->id,
                    'coupon_id' => $coupon->id,
                    'used_at' => now(),
                    'order_id' => $order->id
                ]);
            }

            // Putting the Order id and grand total amount in session
            session()->put('order_id', $order->id);
            session()->put('grand_total', $order->grand_total);

            return true;
        } catch (\Exception $e) {
            logger($e);

            return false;
        }
    }

    /** Clear Session Items  */
    function clearSession()
    {
        \Cart::destroy();
        session()->forget('coupon');
        session()->forget('address');
        session()->forget('delivery_fee');
        session()->forget('delivery_area_id');
        session()->forget('order_id');
        session()->forget('grand_total');
    }
}
