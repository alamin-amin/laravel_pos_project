<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  index(Request $request){
        $products=product::latest();
        if(!empty($request->get('keyword'))){
            $products = $products->where('name','like','%'.$request->get('keyword').'%');
        }

        $products= $products->paginate(5);
        return view('admin.product.list',compact('products'));
    }

    public function create(){
        return view("admin.product.create");
    }

    public function store(Request $request){
        $request->validate([
            'product_name' => 'required|max:255',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'supplier_id' => 'required',
            'product_image' => 'required',
            'Product_code' => 'required|unique:products',
            'description' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'sku' => 'required',
            'qty' => 'required',
            'status' => 'required',
           
        ]);
       
        $products['product_name'] = $request->product_name;
        $products['category_id'] = $request->category_id;
        $products['sub_category_id'] = $request->sub_category_id;
        $products['brand_id'] = $request->brand_id;
        $products['unit_id'] = $request->unit_id;
        $products['supplier_id'] = $request->supplier_id;
        $products['product_image'] = $request->product_image;
        $products['Product_code'] = $request->Product_code;
        $products['description'] = $request->description;
        $products['buying_price'] = $request->buying_price;
        $products['selling_price'] = $request->selling_price;
        $products['sku'] = $request->sku;
        $products['qty'] = $request->qty;
        $products['status'] = $request->status;
        product::create($products);
        return redirect()->route('products.index')->with('success','Product Added successful!');

    }
}
