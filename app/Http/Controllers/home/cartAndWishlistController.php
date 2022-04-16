<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
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
            return "hi";
        } else {
            return "no";
        }
    }
}
