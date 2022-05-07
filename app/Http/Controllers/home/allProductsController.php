<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\admin\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class allProductsController extends Controller
{
    //

    public function allProducts(){
        $allProducts = DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')
        ->join('sub_categories','products.subcategory_id','sub_categories.id')
        ->where('status',1)
        ->select('products.*','categories.category_name','brands.brand_name','sub_categories.subcategory_name')
        ->get();

        // return response()->json($allProducts);

        return view('main.clientsPart.allProducts',compact('allProducts'));
    }
}
