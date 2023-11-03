<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

Route::get('/', function () {
    return view('admin.login');
});



Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' =>'admin.auth'],function(){
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

        //Category Route
        Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
        Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
        Route::get('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.delete');
        
        //  Sub Category Route
        Route::get('/sub-categories',[SubCategoryController::class,'index'])->name('sub-categories.index');
        Route::get('/sub-categories/create',[SubCategoryController::class,'create'])->name('sub-categories.create');
        Route::post('/sub-categories',[SubCategoryController::class,'store'])->name('sub-categories.store');
        Route::get('/sub-categories/{subCategory}/edit',[SubCategoryController::class,'edit'])->name('sub-categories.edit');
        Route::put('/sub-categories/{subCategory}',[SubCategoryController::class,'update'])->name('sub-categories.update');
        Route::get('/sub-categories/{subCategory}',[SubCategoryController::class,'destroy'])->name('sub-categories.delete');

        //  Brands Route
        Route::get('/brands',[BrandController::class,'index'])->name('brands.index');
        Route::get('/brands/create',[BrandController::class,'create'])->name('brands.create');
        Route::post('/brands',[BrandController::class,'store'])->name('brands.store');
        Route::get('/brands/{brand}/edit',[BrandController::class,'edit'])->name('brands.edit');
        Route::put('/brands/{brand}',[BrandController::class,'update'])->name('brands.update');
        Route::get('/brands/{brand}',[BrandController::class,'destroy'])->name('brands.delete');

        //  unit Route....................
        Route::get('/units',[UnitController::class,'index'])->name('units.index');
        Route::get('/units/create',[UnitController::class,'create'])->name('units.create');
        Route::post('/units',[UnitController::class,'store'])->name('units.store');
        Route::get('/units/{unit}/edit',[UnitController::class,'edit'])->name('units.edit');
        Route::put('/units/{unit}',[UnitController::class,'update'])->name('units.update');
        Route::get('/units/{unit}',[UnitController::class,'destroy'])->name('units.delete');

        // Customers Route................
        Route::get('/customers',[CustomerController::class,'index'])->name('customers.index');
        Route::get('/customers/create',[CustomerController::class,'create'])->name('customers.create');
        Route::post('/customers',[CustomerController::class,'store'])->name('customers.store');
        Route::get('/customers/{customer}/edit',[CustomerController::class,'edit'])->name('customers.edit');
        Route::put('/customers/{customer}',[CustomerController::class,'update'])->name('customers.update');
        Route::get('/customers/{customer}',[CustomerController::class,'destroy'])->name('customers.delete');
      

        // product Route...........
        Route::get('/product',[ProductController::class,'index'])->name('product.index');
        Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

        // Order route..................
        Route::get('/order',[OrderController::class,'index'])->name('order.index');


        //Employee Route..................
        Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
        Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
        Route::post('/employee',[EmployeeController::class,'store'])->name('employee.store');
        Route::get('/employee/{data}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
        Route::put('/employee/{data}',[EmployeeController::class,'update'])->name('employee.update');
        Route::get('/employee/{data}',[EmployeeController::class,'destroy'])->name('employee.delete');
        







            Route::get('/getSlug', function(Request $request){
                    $slug ='';
                        if(!empty($request->title)) {
                         Str::slug($request->title);
                        }
                        return response()->json([
                            'status'=> true,
                            'slug'=> $slug
                        ]);
                    })->name('getSlug');
      
    });
});


