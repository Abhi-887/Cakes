<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.cart-view');
    }


    public function addToCart(Request $request)
    {
        $product = Product::with(['productSizes', 'productOptions', 'variants.productVariantItems'])->findOrFail($request->product_id);
        if ($product->quantity < $request->quantity) {
            throw ValidationException::withMessages(['Quantity is not available!']);
        }

        try {
            $productSize = $product->productSizes->where('id', $request->product_size)->first();
            $productOptions = $product->productOptions->whereIn('id', $request->product_option);
            $variantItems = $request->input('variants_items', []);

            $options = [
                'product_size' => [],
                'product_options' => [],
                'product_variants' => [],
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug
                ]
            ];

            if ($productSize !== null) {
                $options['product_size'] = [
                    'id' => $productSize?->id,
                    'name' => $productSize?->name,
                    'price' => $productSize?->price
                ];
            }

            foreach ($productOptions as $option) {
                $options['product_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price
                ];
            }

            foreach ($variantItems as $variantId => $itemValues) {
                if (is_array($itemValues)) {
                    foreach ($itemValues as $itemValue) {
                        // Check if the item is a variant item
                        $variantItem = $product->variants->flatMap->productVariantItems->where('id', $itemValue)->first();
                        if ($variantItem) {
                            $options['product_variants'][] = [
                                'variant_id' => $variantItem->productVariant->id,
                                'variant_name' => $variantItem->productVariant->name,
                                'item_id' => $variantItem->id,
                                'item_name' => $variantItem->name,
                                'item_price' => $variantItem->price
                            ];
                        }
                    }
                } else {
                    // Check if the item is a variant item
                    $variantItem = $product->variants->flatMap->productVariantItems->where('id', $itemValues)->first();
                    if ($variantItem) {
                        $options['product_variants'][] = [
                            'variant_id' => $variantItem->productVariant->id,
                            'variant_name' => $variantItem->productVariant->name,
                            'item_id' => $variantItem->id,
                            'item_name' => $variantItem->name,
                            'item_price' => $variantItem->price
                        ];
                    } else {
                        // For custom fields, use the variant name and value
                        $variant = $product->variants->where('id', $variantId)->first();
                        if ($variant) {
                            $options['product_variants'][] = [
                                'variant_id' => $variantId,
                                'variant_name' => $variant->name,
                                'item_id' => null,
                                'item_name' => $itemValues,
                                'item_price' => null
                            ];
                        }
                    }
                }
            }

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options
            ]);

            return response(['status' => 'success', 'message' => 'Product added into cart!'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
        }
    }



    public function getCartProduct()
    {
        return view('frontend.layouts.ajax-files.sidebar-cart-item')->render();
    }

    public function cartProductRemove($rowId)
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

    public function cartQtyUpdate(Request $request): Response
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

    public function cartDestroy()
    {
        Cart::destroy();
        session()->forget('coupon');
        return redirect()->back();
    }
}
