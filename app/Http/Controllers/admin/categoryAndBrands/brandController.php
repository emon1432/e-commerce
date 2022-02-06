<?php

namespace App\Http\Controllers\admin\categoryAndBrands;

use App\Http\Controllers\Controller;
use App\Models\admin\brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class brandController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allBrand()
    {
        $brands = brand::all();
        return view('admin.category&brand.brandList', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:50',
                'brand_logo' => 'required',
                'brand_logo.*' => 'mimes:jpeg,jpg,png',
            ],
            [
                'brand_name.required' => 'Please Enter a Brand Name',
                'brand_name.max' => 'Category less than 50 chars',
            ]
        );
        $brand_logo = $request->file('brand_logo');
        $name_gen = hexdec(uniqid());
        $logo_ext = strtolower($brand_logo->getClientOriginalExtension());
        $logo_name = $name_gen . '.' . $logo_ext;
        $location = 'images/brand/';
        $final_logo_name = $location . $logo_name;
        $brand_logo->move($location, $logo_name);

        brand::insert([
            'brand_name' => $request->brand_name,
            'brand_logo' => $final_logo_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );


        return Redirect()->back()->with($notification);
    }

    public function editBrand($id)
    {
        $brands = brand::find($id);
        return view('admin.brand.editBrand', compact('brands'));
    }

    public function updateBrand(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|max:50',
                'brand_logo.*' => 'mimes:jpeg,jpg,png',
            ],
            [
                'brand_name.required' => 'Please Enter a Brand Name',
                'brand_name.max' => 'Category less than 50 chars',
            ]
        );

        $brand_logo = $request->file('brand_logo');

        if ($brand_logo) {
            $old_logo = $request->old_logo;
            unlink($old_logo);
            $name_gen = hexdec(uniqid());
            $logo_ext = strtolower($brand_logo->getClientOriginalExtension());
            $logo_name = $name_gen . '.' . $logo_ext;
            $location = 'logos/brand/';
            $final_logo_name = $location . $logo_name;
            $brand_logo->move($location, $logo_name);

            brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_logo' => $final_logo_name,
            ]);
        } else {
            brand::find($id)->update([
                'brand_name' => $request->brand_name,
            ]);
        }
        $notification = array(
            'message' => 'Brand Update Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }

    public function deleteBrand($id)
    {

        $logo = brand::find($id);
        $old_logo = $logo->brand_logo;
        unlink($old_logo);

        Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
}
