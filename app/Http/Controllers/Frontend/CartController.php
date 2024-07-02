<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem; // Import the ProductVariantItem model
use Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CartController extends Controller
{
    function index(): View
    {
        return view('frontend.pages.cart-view');
    }

    function addToCart(Request $request)
    {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);
        if ($product->quantity < $request->quantity) {
            throw ValidationException::withMessages(['Quantity is not available!']);
        }

        try {
            $basePrice = $product->offer_price > 0 ? $product->offer_price : $product->price;
            $totalPrice = $basePrice;
            $variantDetails = [];

            // Process selected variant items
            $selectedVariants = $request->input('variants_items', []);
            foreach ($selectedVariants as $variantId) {
                $variantItem = ProductVariantItem::find($variantId);
                if ($variantItem) {
                    $totalPrice += $variantItem->price;
                    $variantDetails[] = [
                        'id' => $variantItem->id,
                        'name' => $variantItem->name,
                        'price' => $variantItem->price
                    ];
                }
            }

            $totalPrice *= $request->quantity;

            $options = [
                'product_variants' => $variantDetails,
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug
                ]
            ];

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $totalPrice / $request->quantity, // Store price per item
                'weight' => 0,
                'options' => $options
            ]);

            return response(['status' => 'success', 'message' => 'Product added into cart!'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
        }
    }

    function getCartProduct()
    {
        return view('frontend.layouts.ajax-files.sidebar-cart-item')->render();
    }

    function cartProductRemove($rowId)
    {
        try {
            Cart::remove($rowId);
            return response([
                'status' => 'success',
                'message' => 'Item has been removed!',
                'cart_total' => cartTotal(),
                'grand_cart_total' => grandCartTotal()
            ], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Sorry something went wrong!'], 500);
        }
    }

    function cartQtyUpdate(Request $request): Response
    {
        $cartItem = Cart::get($request->rowId);
        $product = Product::findOrFail($cartItem->id);

        if ($product->quantity < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity is not available!', 'qty' => $cartItem->qty]);
        }

        try {
            $cart = Cart::update($request->rowId, $request->qty);
            return response([
                'status' => 'success',
                'product_total' => productTotal($request->rowId),
                'qty' => $cart->qty,
                'cart_total' => cartTotal(),
                'grand_cart_total' => grandCartTotal()
            ], 200);

        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong please reload the page.'], 500);
        }
    }

    function cartDestroy()
    {
        Cart::destroy();
        session()->forget('coupon');
        return redirect()->back();
    }
}
