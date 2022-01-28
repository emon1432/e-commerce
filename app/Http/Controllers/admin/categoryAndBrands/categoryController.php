<?php

namespace App\Http\Controllers\admin\categoryAndBrands;

use App\Http\Controllers\Controller;
use App\Models\admin\category;
use App\Models\Category as ModelsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //show all category
    public function allCategory()
    {
        $categories = category::all();
        
        return view('admin.category&brand.categoryList',compact('categories'));
    }


    //add a new category
    public function addCategory(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:50',
            ],
            [
                'category_name.required' => 'Please Enter a Category Name',
            ]
        );

        category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Edit category

    // public function editCategory($id)
    // {
        
    //     return view('admin.category.categoryList', compact('id'));
    // }


    public function updateCategory(Request $request, $id){
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:50',
            ],
            [
                'category_name.required' => 'Please Enter a Category Name',
            ]
        );

        $update = category::find($id)->update([
            'category_name' => $request->category_name
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }

    //delete category
    public function deleteCategory($id)
    {

        category::find($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }

    
}
