<?php

use App\Http\Controllers\admin\auth\UserSettingsController;
use App\Http\Controllers\admin\categoryAndBrands\brandController;
use App\Http\Controllers\admin\categoryAndBrands\categoryController;
use App\Http\Controllers\admin\categoryAndBrands\subCategoryController;
use App\Http\Controllers\admin\coupons\couponController;
use App\Http\Controllers\admin\product\productController;
use App\Http\Controllers\admin\subscription\subscriberController;
use App\Models\admin\product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//All Home Route
Route::get('/', function () {
    return view('main.index');
});


//Add Subscriber
Route::post('/subscriber/add', [subscriberController::class, 'addSubscriber'])->name('add.subscriber');









// ---------->Admin Panel Route Group<----------

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');



    //User Settings
    Route::get('/user/settings', [UserSettingsController::class, 'userSettings'])->name('user.settings');

    //Admin Password Update
    Route::post('/update/password', [UserSettingsController::class, 'adminPasswordUpdate'])->name('admin.password.update');

    //---------->Product<----------
    //Product List
    Route::get('/products/all', [productController::class, 'allProduct'])->name('products.all');

    //Add Product
    Route::get('/product/add', [productController::class, 'addProduct'])->name('product.add');

    //Get Sub Category 
    Route::get('/get/subcategory/{category_id}', [productController::class, 'getSubCategory']);

    //Store Product
    Route::post('/product/add', [productController::class, 'storeProduct'])->name('add.product');

    //Inactive Product
    Route::get('/product/inactive/{id}', [productController::class, 'inactiveProduct']);

    //Active Product
    Route::get('/product/active/{id}', [productController::class, 'activeProduct']);

    //Delete Product
    Route::get('/product/delete/{id}', [productController::class, 'deleteProduct']);

    //Show Product
    Route::get('/product/show/{id}', [productController::class, 'showProduct']);

    //Edit Product
    Route::get('/product/edit/{id}', [productController::class, 'editProduct']);

    //Update Product
    Route::post('/product/update/{id}', [productController::class, 'updateProduct']);



    //---------->Category<----------

    //Category List
    Route::get('/category/all', [categoryController::class, 'allCategory'])->name('category.all');

    //Add Category
    Route::post('/category/add', [categoryController::class, 'addCategory'])->name('add.category');

    //Delete Category 
    Route::get('/category/delete/{id}', [categoryController::class, 'deleteCategory']);

    //Edit Category
    // Route::get('/category/edit/{id}',[categoryController::class,'editCategory']);

    //update Category
    Route::post('/category/update/{id}', [categoryController::class, 'updateCategory']);


    //---------->Sub Category<----------

    //Sub Category List
    Route::get('/subcategory/all', [subCategoryController::class, 'allSubCategory'])->name('subcategory.all');

    //Add Sub Category
    Route::post('/subcategory/add', [subCategoryController::class, 'addSubCategory'])->name('add.subcategory');

    //Delete Sub Category 
    Route::get('/subcategory/delete/{id}', [subCategoryController::class, 'deleteSubCategory']);

    //Edit Sub Category
    // Route::get('/subcategory/edit/{id}',[subCategoryController::class,'editSubCategory']);

    //update Category
    Route::post('/subcategory/update/{id}', [subCategoryController::class, 'updateSubCategory']);



    //---------->Brand<----------

    //Brand List
    Route::get('/brand/all', [brandController::class, 'allBrand'])->name('brand.all');

    //Add Brand
    Route::post('/brand/add', [brandController::class, 'addBrand'])->name('add.brand');

    //Delete Brand 
    Route::get('/brand/delete/{id}', [brandController::class, 'deleteBrand']);

    //Edit Brand
    // Route::get('/brand/edit/{id}',[brandController::class,'editBrand']);

    //update Brand
    Route::post('/brand/update/{id}', [brandController::class, 'updateBrand']);



    //---------->Coupon<----------

    //Coupon List
    Route::get('/coupon/all', [couponController::class, 'allCoupon'])->name('coupon.all');

    //Add Coupon
    Route::post('/coupon/add', [couponController::class, 'addCoupon'])->name('add.coupon');

    //Delete Coupon
    Route::get('/coupon/delete/{id}', [couponController::class, 'deleteCoupon']);

    //Update Coupon
    Route::post('/coupon/update/{id}', [couponController::class, 'updateCoupon']);


    //---------->Subscriber<----------
    //Subscriber List
    Route::get('/subscriber/all', [subscriberController::class, 'allSubscriber'])->name('subscriber.all');

    //Delete Subscriber
    Route::get('/subscriber/delete/{id}', [subscriberController::class, 'deleteSubscriber']);
});
