<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\admin\brand;
use App\Models\admin\category;
use App\Models\admin\product;
use App\Models\admin\subCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class productController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');

    //     if (Auth::user()->user_role != 1) {
    //         return view('main.clientsPart.home');
    //     }
    // }

    public function allProduct()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();
        // return response()->json($products);
        return view('admin.product.productList', compact('products'));
    }

    //Add Product
    public function addProduct()
    {
        $categories = category::all();
        $brands = brand::all();
        return view('admin.product.productAdd', compact('categories', 'brands'));
    }

    //Get Sub Category
    public function getSubCategory($category_id)
    {
        $subCategories = DB::table('sub_categories')->where('category_id', $category_id)->get();
        return json_encode($subCategories);
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate(
            [
                'product_name' => 'required|unique:products|max:50',
                'product_code' => 'required|unique:products|max:50',
                'category_id' => 'required',
                'image_one' => 'required',
                'image_one.*' => 'mimes:jpeg,jpg,png',
                'image_two' => 'required',
                'image_two.*' => 'mimes:jpeg,jpg,png',
                'image_three' => 'required',
                'image_three.*' => 'mimes:jpeg,jpg,png',
            ]
        );

        $image_one = $request->file('image_one');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($image_one->getClientOriginalExtension());
        $one_name = $name_gen . '.' . $image_ext;
        $location = 'images/product/';
        $final_image_one = $location . $one_name;
        $image_one->move($location, $one_name);

        $image_two = $request->file('image_two');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($image_two->getClientOriginalExtension());
        $two_name = $name_gen . '.' . $image_ext;
        $location = 'images/product/';
        $final_image_two = $location . $two_name;
        $image_two->move($location, $two_name);

        $image_three = $request->file('image_three');
        $name_gen = hexdec(uniqid());
        $image_ext = strtolower($image_three->getClientOriginalExtension());
        $three_name = $name_gen . '.' . $image_ext;
        $location = 'images/product/';
        $final_image_three = $location . $three_name;
        $image_three->move($location, $three_name);

        if ($request->subcategory_id != true) {
            $request->subcategory_id = -1;
        }
        product::insert([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_details' => $request->product_details,
            'video_link' => $request->video_link,
            'main_slider' => $request->main_slider,
            'hot_deal' => $request->hot_deal,
            'best_rated' => $request->best_rated,
            'mid_slider' => $request->mid_slider,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend,
            'status' => 1,
            'image_one' => $final_image_one,
            'image_two' => $final_image_two,
            'image_three' => $final_image_three,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect('/products/all')->with($notification);
    }


    //Product Edit 
    public function editProduct($id)
    {
        $product = product::find($id);
        $categories = category::all();
        // $subcategories = subCategory::all();
        $brands = brand::all();
        return view('admin.product.productEdit', compact('product', 'categories', 'brands'));
    }

    //Product Update
    public function updateProduct(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'product_name' => 'required|max:50',
                'product_code' => 'required|max:50',
                'category_id' => 'required',
                'image_one.*' => 'mimes:jpeg,jpg,png',
                'image_two.*' => 'mimes:jpeg,jpg,png',
                'image_three.*' => 'mimes:jpeg,jpg,png',
            ]
        );
        if ($request->subcategory_id != true) {
            $request->subcategory_id = -1;
        }
        product::find($id)->update([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_details' => $request->product_details,
            'video_link' => $request->video_link,
            'main_slider' => $request->main_slider,
            'hot_deal' => $request->hot_deal,
            'best_rated' => $request->best_rated,
            'mid_slider' => $request->mid_slider,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend
        ]);


        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');


        if ($image_one) {
            $old_image = $request->old_image_one;
            if ($old_image) {
                unlink($old_image);
            }
            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($image_one->getClientOriginalExtension());
            $one_name = $name_gen . '.' . $image_ext;
            $location = 'images/product/';
            $final_image_one = $location . $one_name;
            $image_one->move($location, $one_name);

            product::find($id)->update([
                'image_one' => $final_image_one
            ]);
        }
        if ($image_two) {
            $old_image = $request->old_image_two;
            if ($old_image) {
                unlink($old_image);
            }

            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($image_two->getClientOriginalExtension());
            $two_name = $name_gen . '.' . $image_ext;
            $location = 'images/product/';
            $final_image_two = $location . $two_name;
            $image_two->move($location, $two_name);

            product::find($id)->update([
                'image_two' => $final_image_two
            ]);
        }
        if ($image_three) {
            $old_image = $request->old_image_three;
            if ($old_image) {
                unlink($old_image);
            }

            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($image_three->getClientOriginalExtension());
            $three_name = $name_gen . '.' . $image_ext;
            $location = 'images/product/';
            $final_image_three = $location . $three_name;
            $image_three->move($location, $three_name);

            product::find($id)->update([
                'image_three' => $final_image_three
            ]);
        }

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect('/products/all')->with($notification);
    }

    //Product inactive
    public function inactiveProduct($id)
    {
        product::find($id)->update([
            'status' => 0
        ]);

        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }

    //Product active
    public function activeProduct($id)
    {
        product::find($id)->update([
            'status' => 1
        ]);

        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Product Details Show
    public function showProduct($id)
    {
        $subCategoryId = product::find($id);

        // return response()->json($subCategory);
        $subCategoryName = true;
        if ($subCategoryId->subcategory_id == -1) {
            $product = DB::table('products')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name')
                ->where('products.id', $id)
                ->first();
            $subCategoryName = false;
        } else {
            $product = DB::table('products')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('brands', 'products.brand_id', 'brands.id')
                ->join('sub_categories', 'products.subcategory_id', 'sub_categories.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name', 'sub_categories.subcategory_name')
                ->where('products.id', $id)
                ->first();
            $subCategoryName = true;
        }
        // $product = DB::table('products')
        //     ->join('categories', 'products.category_id', 'categories.id')
        //     ->join('brands', 'products.brand_id', 'brands.id')
        //     ->join('sub_categories', 'products.subcategory_id', 'sub_categories.id')
        //     ->select('products.*', 'categories.category_name', 'brands.brand_name', 'sub_categories.subcategory_name')
        //     ->where('products.id', $id)
        //     ->first();

        // $product = product::join('categories', 'products.category_id', '=', 'categories.id')
        // ->join('brands', 'products.brand_id', '=', 'brands.id')
        // ->join('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')
        // ->where('products.id', $id)
        // ->get(['products.*', 'categories.category_name', 'brands.brand_name', 'sub_categories.subcategory_name']);




        // return response()->json($product);


        return view('admin.product.productShow', compact('product', 'subCategoryName'));
    }

    //Product Delete
    public function deleteProduct($id)
    {

        $product = product::find($id);
        $images = array(
            $image_one = $product->image_one,
            $image_two = $product->image_two,
            $image_three = $product->image_three
        );
        for ($i = 0; $i < count($images); $i++) {
            unlink($images[$i]);
        }
        product::find($id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
}
