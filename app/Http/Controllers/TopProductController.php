<?php
namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;

class TopProductController extends Controller
{
    public function getTopSellingProducts(): JsonResponse
    {
        $topSellingProducts = OrderItem::select(
                'products.id', 'products.name', 'products.slug', 'products.thumb_image',
                'products.price', 'products.offer_price', 'products.quantity',
                'products.out_of_stock', 'categories.name as category_name',
                'categories.slug as category_slug'
            )
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->groupBy('products.id', 'products.name', 'products.slug', 'products.thumb_image',
                      'products.price', 'products.offer_price', 'products.quantity',
                      'products.out_of_stock', 'categories.name', 'categories.slug')
            ->orderByRaw('SUM(order_items.qty) DESC')
            ->take(40)
            ->get();

        return response()->json($topSellingProducts);
    }
}
