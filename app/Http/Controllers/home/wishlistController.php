<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\home\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class wishlistController extends Controller
{
    public function authCheck()
    {
        if (Auth::user()) {
            return true;
        } else {
            return false;
        }
    }

    public function showAllWishlistItem()
    {
        $user_id = Auth::user()->id;

        $wishlist_items = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->where('wishlists.user_id', $user_id)
            ->select('products.*', 'wishlists.*')
            ->get();

        // return response()->json($wishlist_items);

        return view('main.clientsPart.wishlist', compact('wishlist_items'));
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

    //Delete Wishlist
    public function deleteWishlistItem(Request $request)
    {
        $item_id = $request->wishlist_item_id;

        $value = DB::table('wishlists')
            ->where('user_id', Auth::user()->id)
            ->where('id', $item_id);

        if ($value->delete()) {
            $list_item = DB::table('wishlists')->where('user_id', Auth::user()->id)->get();
            $countval = count($list_item);
            $notification = array(
                'message' => 'Product deleted successfully',
            );
            return [$countval, $notification];
        }
    }
}
