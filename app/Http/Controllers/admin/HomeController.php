<?php

namespace App\Http\Controllers\admin;
use App\Models\category;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index(){

      $categoryCount = category:: count();
      $customerCount = Customer::count();
      $productCount = product::count();

      return view('admin.dashboard',compact('categoryCount','customerCount','productCount'));
      // $admin = Auth::guard('admin')->user();
      // echo 'Welcome'.$admin->name. '<a href="'.route('admin.logout').'">Logout</a>';

      
   }
   public function logout(){
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login'); 
  }
}
