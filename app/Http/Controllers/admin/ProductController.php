<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'supplier_id' => 'required',
            // 'product_code' => 'required|unique:employees|max:18',
            'description' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'sku' => 'required',
            'status' => 'required',
         ]);
         if($validator->passes()){
                $products = new product();
                $products['product_name'] = $request->product_name;
                $products['category_id'] = $request->category_id;
                $products['sub_category_id'] = $request->sub_category_id;
                $products['brand_id'] = $request->brand_id;
                $products['unit_id'] = $request->unit_id;
                $products['supplier_id'] = $request->supplier_id;
                
                $image = $request->product_image;
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $request->product_image->move('product_image',$imageName);
                $products->product_image = $imageName;
                
                $products['Product_code'] = $request->Product_code;
                $products['description'] = $request->description;
                $products['qty'] = $request->qty;
                $products['buying_price'] = $request->buying_price;
                $products['selling_price'] = $request->selling_price;
                $products['sku'] = $request->sku;
                $products['product_image'] =$imageName;
                $products['status'] = $request->status;
                $products->status=$request->status;
                $products->save();
                return redirect()->route('products.index')->with('success','Product Added successful!');
       
         }
    }
    public function view ($id){
       $products = DB::table('products')
       ->join('categories','products.category_id','categories.id')
       ->join('sub_categories','products.sub_category_id','sub_categories.id')
        ->join('brands','products.brand_id','brands.id')
        ->join('units','products.unit_id','units.id')
        ->join('suppliers','products.supplier_id','suppliers.id')
       ->select(
        'categories.name as categoryName',
        'sub_categories.name as subCategoryName',
        'brands.name as brandName',
        'units.name as unitName',
        'suppliers.name as supplierName',
        'products.*',
       )
      -> where ('products.id',$id ) 
      ->first();
        return view('admin.product.view',compact('products'));
    }
    public function edit(product $product){
        return view('admin.product.edit',compact('product'));       
    }
    public function update(Request $request, product $product){
        $products['product_name'] = $request->product_name;
        $products['description'] = $request->description;
        $products['qty'] = $request->qty;
        $products['Product_code'] = $request->Product_code;
       
        $image = $request->product_image;
        if($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->product_image->move('product_image',$imageName);
        $product ->product_image = $imageName;
        }
        $products['status'] = $request->status;
        $product->update( $products);
        return redirect()->route('products.index')->with('success','product updated successful!');
    }


    public function destroy($id){
        $products = product::find($id);
        $products->delete();
        return redirect()->route('products.index')->with('danger','Product delete successful!');

    }

}