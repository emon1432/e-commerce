<?php

use App\Http\Controllers\admin\auth\UserSettingsController;
use App\Http\Controllers\admin\categoryAndBrands\categoryController;
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

Route::get('/', function () {
    return view('welcome');
});














// ---------->Admin Panel Route Group<----------

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');



    //User Settings
    Route::get('/user/settings',[UserSettingsController::class,'userSettings'])->name('user.settings');

    //Admin Password Update
    Route::post('/update/password',[UserSettingsController::class,'adminPasswordUpdate'])->name('admin.password.update');


    //---------->Category<----------

    //Category List
    Route::get('/category/all',[categoryController::class,'allCategory'])->name('category.all');

    //Add Category
    Route::post('/category/add',[categoryController::class,'addCategory'])->name('add.category');

    //Delete Category 
    Route::get('/category/delete/{id}',[categoryController::class,'deleteCategory']);

    //Edit Category
    // Route::get('/category/edit/{id}',[categoryController::class,'editCategory']);

    //update Category
    Route::post('/category/update',[categoryController::class,'updateCategory'])->name('update.category');






    
});