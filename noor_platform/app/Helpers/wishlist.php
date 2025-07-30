<?php

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getWishlist')) {
    function getWishlist()
    {
        if (!Auth::check()) {
            return collect();
        }

        return Wishlist::where('user_id', Auth::id())->get();
    }
}
