<?php

namespace App\Http\Controllers\admin;
use App\Models\category;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderCustomer;
use App\Models\palceOrder;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index(){

      $categoryCount = category:: count();
      $customerCount = Customer::count();
      $productCount = product::count();
      $orderCount = OrderCustomer::count();
      $totalSale = palceOrder::sum('total');
      $totalQty = product::sum('qty');
      $todaySale = palceOrder::where('date')->sum('total');
      return view('admin.dashboard',compact('categoryCount','customerCount','productCount','orderCount','totalSale','totalQty','todaySale'));

      
      // $admin = Auth::guard('admin')->user();
      // echo 'Welcome'.$admin->name. '<a href="'.route('admin.logout').'">Logout</a>';

      
   }
   public function logout(){
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login'); 
  }
}
