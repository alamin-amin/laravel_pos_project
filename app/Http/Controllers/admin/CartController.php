<?php

namespace App\Http\Controllers\admin;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function addToCart(Request $request ,$id){
   
    $productData = product:: find($id);
      $check= Cart::where("products_id",$id)->first();
    if($check){
      $check= Cart::where("products_id",$id)->increment('qty');
      return redirect()->back();
    }else{
        $cart= new Cart();
        $cart->products_id = $productData["id"];      
        $cart->qty       = $request["qty"];
        $cart->Price     = $productData["selling_price"];
        $cart->total     = $request["qty"]*  $productData["selling_price"];
        $cart->sub_total = $cart->total ;
        $cart->save();
        return redirect()->back();
    }
 }
}
