<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\ExpenseController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PurchaseOrderController;
use App\Http\Controllers\admin\SupplierController;
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

        // Supplier Route..................
        Route::get('/suppliers',[SupplierController::class,'index'])->name('suppliers.index');
        Route::get('/suppliers/create',[SupplierController::class,'create'])->name('suppliers.create');
        Route::post('/suppliers',[SupplierController::class,'store'])->name('suppliers.store');
        Route::get('/suppliers/{supplier}/edit',[SupplierController::class,'edit'])->name('suppliers.edit');
        Route::put('/suppliers/{supplier}/',[SupplierController::class,'update'])->name('suppliers.update');
        Route::get('/suppliers/{supplier}/',[SupplierController::class,'destroy'])->name('suppliers.delete');
      

        // product Route...........
        Route::get('/products',[ProductController::class,'index'])->name('products.index');
        Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/products',[ProductController::class,'store'])->name('products.store');
        Route::get('/products/{product}/id',[ProductController::class,'view'])->name('products.view');
        Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
        Route::put('/products/{product}/',[ProductController::class,'update'])->name('products.update');
        Route::get('/products/{product}/',[ProductController::class,'destroy'])->name('products.delete');

        // Order route..................
        Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
        Route::get('/orders/create',[OrderController::class,'create'])->name('orders.create');


        Route::post('/carts/{cart}/id',[CartController::class,'addToCart'])->name('carts.addToCart');





        










        //Purchase Order Route..........
        Route::get('/purchase-order/create',[PurchaseOrderController::class,'create'])->name('purchase-order.create');


        //Employee Route..................
        Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
        Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
        Route::post('/employee',[EmployeeController::class,'store'])->name('employee.store');
        Route::get('/employee/{data}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
        Route::put('/employee/{data}',[EmployeeController::class,'update'])->name('employee.update');
        Route::get('/employee/{data}',[EmployeeController::class,'destroy'])->name('employee.delete');
        
        //Expense Route...............
        Route::get('/expenses',[ExpenseController::class,'index'])->name('expenses.index');
        Route::get('/expenses/create',[ExpenseController::class,'create'])->name('expenses.create');
        Route::post('/expenses',[ExpenseController::class,'store'])->name('expenses.store');
        Route::get('/expenses/{expense}/edit',[ExpenseController::class,'edit'])->name('expenses.edit');
        Route::put('/expenses/{expense}',[ExpenseController::class,'update'])->name('expenses.update');
        Route::get('/expenses/{expense}',[ExpenseController::class,'destroy'])->name('expenses.delete');

        Route::get('/today-expenses',[ExpenseController::class,'TodayExpense'])->name('expenses.TodayExpense');
        Route::get('/monthly-expenses',[ExpenseController::class,'monthlyExpense'])->name('expenses.monthlyExpense');
        Route::get('/yearly-expenses',[ExpenseController::class,'yearlyExpense'])->name('expenses.yearlyExpense');
        //Expense MONTH ROUTE
        Route::get('/january-expenses',[ExpenseController::class,'january'])->name('expenses.january');     
        Route::get('/february-expenses',[ExpenseController::class,'february'])->name('expenses.february');     
        Route::get('/march-expenses',[ExpenseController::class,'march'])->name('expenses.march');     
        Route::get('/april-expenses',[ExpenseController::class,'april'])->name('expenses.april');     
        Route::get('/may-expenses',[ExpenseController::class,'may'])->name('expenses.may');     
        Route::get('/june-expenses',[ExpenseController::class,'june'])->name('expenses.june');     
        Route::get('/july-expenses',[ExpenseController::class,'july'])->name('expenses.july');     
        Route::get('/august-expenses',[ExpenseController::class,'august'])->name('expenses.august');     
        Route::get('/september-expenses',[ExpenseController::class,'september'])->name('expenses.september');     
        Route::get('/october-expenses',[ExpenseController::class,'october'])->name('expenses.october');     
        Route::get('/november-expenses',[ExpenseController::class,'november'])->name('expenses.november');     
        Route::get('/december-expenses',[ExpenseController::class,'december'])->name('expenses.december');     







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


