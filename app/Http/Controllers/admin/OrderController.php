<?php

namespace App\Http\Controllers\admin;
use App\Models\Cart;
use App\Models\palceOrder;
use App\Http\Controllers\Controller;
use App\Models\OrderCustomer;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(){
        $orderList= OrderCustomer ::latest()->get();
        return view ('admin.order.list',compact('orderList'));
    }


    public function orderView($id){
        $invoiceSubTotal = palceOrder::all()->where("order_customer_id")->sum('sub_total');
        $orderItems = palceOrder::where('order_customer_id', $id)->with('product')->get();

        
        return view('admin.order.invoice', compact('orderItems','invoiceSubTotal'));
    }


    public function orderInvoice($id){
        // $data ='Customer.pdf';
        // $pdf = Pdf::loadView('admin.order.invoice',compact('data'));
        // return $pdf->stream('XyZ-invoice');

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
}
