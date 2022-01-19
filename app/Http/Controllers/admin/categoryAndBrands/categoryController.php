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
    //show all category
    public function allCategory()
    {
        $categories = category::all();
        return view('admin.category.categoryList',compact('categories'));
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

    public function editCategory($id)
    {
    
        $categoriesFind = category::find($id);
        return view('admin.category.categoryList', compact('categoriesFind'));
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
