<?php

namespace App\Http\Controllers\admin\categoryAndBrands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //

    public function allCategory(){
        return view('admin.category.categoryList');
    }
}
