<?php

namespace App\Http\Controllers\admin;
use App\Models\Cart;
use App\Models\palceOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        //  $orderList = DB::table('palce_orders')
        //  ->join('order_customers','palce_orders.order_customer_id','order_customers.id')
        //  ->join('products','palce_orders.product_id','products.id')
        //  ->select('palce_orders.*','order_customers.*','products.*')
        //  ->get();

         $orderList= palceOrder::latest()->get();

        // $orderList = DB::table('palce_orders')
        //  ->join('order_customers','palce_orders.order_customer_id',' = ','order_customers.id')
        //  ->join('products','palce_orders.product_id', '=','products.id')

        //  ->select('palce_orders.*','order_customers.*')
        //  ->get()->toArray;
        
        
        //  echo '<pre>';
        //  print_r($orderList);

  
        return view ('admin.order.list',compact('orderList'));
    }
    public function create(){
            $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select(
                'categories.name as categoryName',
                'brands.name as brandName',
                'products.*',
               )
            ->get();
                $cartData= DB::table('carts')
                ->join('products','carts.products_id','products.id')
                ->select('products.*', 'carts.*')
                ->get();
                $subTotal = Cart::all()->where("products_id")->sum("total");

           $customers = DB::table('customers')->get();
            return view ('admin.order.create',compact('products','customers','cartData','subTotal'));
       }
       public function destroy($cart_id){
         Cart::where('id',$cart_id)->delete();
        return redirect()->back();
       }

       public function update(Request $request, $cart_id){
        $cart = Cart::find($cart_id);
        $cart->update(['qty'=>$request->qty]);
        return redirect()->back();
       }


        // Order Invoice....

    public function orderInvoice(){
        $invoiceLists = DB::table('palce_orders')
        ->join('order_customers','palce_orders.order_customer_id','customer_id')
        ->select('palce_orders.*','order_customers.*')
        ->get();

        return view ('admin.order.invoice',compact('invoiceLists'));
    }
}
