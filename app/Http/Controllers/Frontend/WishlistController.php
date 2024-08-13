<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WishlistController extends Controller
{
    public function store(string $productId): Response
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please log in to add products to your wishlist.',
                'redirect' => route('login') // Redirect URL to the login page
            ], 401); // Unauthorized status code
        }

        // Check if the product is already in the user's wishlist
        $productAlreadyExist = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->exists();
        if ($productAlreadyExist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product is already in your wishlist.'
            ], 422); // Unprocessable Entity status code
        }

        // Add the product to the wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->product_id = $productId;
        $wishlist->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to your wishlist!'
        ], 200); // OK status code
    }
}
