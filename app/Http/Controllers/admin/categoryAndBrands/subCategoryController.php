<?php

namespace App\Http\Controllers\admin\categoryAndBrands;

use App\Http\Controllers\Controller;
use App\Models\admin\category;
use App\Models\admin\subCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //show all SubCategory
    public function allSubCategory()
    {
        $categories = category::all();


        $subCategories = subCategory::join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->get(['sub_categories.*', 'categories.category_name']);

        return view('admin.category&brand.subCategoryList', compact('categories','subCategories'));
    }

    public function addSubCategory(Request $request){
        $validated = $request->validate(
            [
                'subcategory_name' => 'required|unique:sub_categories|max:50',
                'category_id' => 'required',
            ],
            [
                'subcategory_name.required' => 'Please Enter a Sub Category Name',
                'category_id.required' => 'Please Enter a Category Name',
            ]
        );

        subCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Sub Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function updateSubCategory(Request $request, $id){
        $validated = $request->validate(
            [
                'subcategory_name' => 'required|max:50',
                'category_id' => 'required',
            ],
            [
                'subcategory_name.required' => 'Please Enter a Sub Category Name',
                'category_id.required' => 'Please Enter a Category Name',
            ]
        );

        $update = subCategory::find($id)->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
        ]);
        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }




    //delete category
    public function deleteSubCategory($id)
    {

        subCategory::find($id)->delete();
        $notification = array(
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
}
