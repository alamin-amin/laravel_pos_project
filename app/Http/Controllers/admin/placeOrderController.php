<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderCustomer;
use App\Models\orderItem;
use App\Models\palceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class placeOrderController extends Controller
{
    
    //    'invoice_no'=>mt_rand(10000000,99999999),
   
    public function store(Request $request){
        $customerData= new OrderCustomer;
        $customerData->customer_id=$request->customer;
        $customerData->save();
        $customer_id= $customerData->id;
          $Carts= Cart::all();
          $orderId = Str::uuid();
          foreach($Carts as $cart){
            $placeOrder = new palceOrder;
                $placeOrder->product_id = $cart->products_id;
                $placeOrder->order_customer_id = $customer_id;
                $placeOrder->invoice_no =$orderId;
                $placeOrder->payment_type = $request->payment_type;
                $placeOrder->total = $cart->total;
                $placeOrder->sub_total = $cart->sub_total;
                $placeOrder->qty = $cart->qty;
                $placeOrder->save();    
          }

          Cart::truncate();
          return redirect()->back();
    }

}
