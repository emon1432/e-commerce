<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\home\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class cartAndWishlistController extends Controller
{
    public function authCheck()
    {
        if (Auth::user()) {
            return true;
        } else {
            return false;
        }
    }

    //Add to wishlist
    public function addToWishlist(Request $request)
    {
        if ($this->authCheck()) {
            $product_id = $request->product_id;
            $user_id = Auth::user()->id;

            $already = wishlist::where('user_id', $user_id)->where('product_id', $product_id)->get();

            if (count($already) > 0) {
                $wishlist_item = wishlist::where('user_id', $user_id)->get();
                $wishlist_item = count($wishlist_item);
                $notification = array(
                    'message' => 'Product already in wishlist !!!'
                );
                return [$wishlist_item, $notification, "already"];
            } else {
                $wishlist = new wishlist;
                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
                $wishlist_item = wishlist::where('user_id', $user_id)->get();
                $wishlist_item = count($wishlist_item);
                $notification = array(
                    'message' => 'Product added in wishlist successfully !!!'
                );
                return [$wishlist_item, $notification, "new_add"];
            }
        } else {
            $notification = array(
                'message' => 'You should log in first !!!'
            );
            return [false, $notification];
        }
    }
}
