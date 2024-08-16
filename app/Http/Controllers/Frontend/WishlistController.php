<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class WishlistController extends Controller
{
    function store(string $productId): Response
    {
        // Check if the user is authenticated first
        if (!Auth::check()) {
            throw ValidationException::withMessages(['Please login to add products to your wishlist']);
        }

        // Check if the product is already in the user's wishlist
        $productAlreadyExist = Wishlist::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->exists();
        if ($productAlreadyExist) {
            throw ValidationException::withMessages(['Product is already added to the wishlist']);
        }

        // Add the product to the wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = auth()->user()->id;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return response(['status' => 'success', 'message' => 'Product added to wishlist!']);
    }
}
