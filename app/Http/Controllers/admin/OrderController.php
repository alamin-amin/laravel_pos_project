<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view ('admin.order.list');
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

            $customers = DB::table('customers')->get();
            $categories = DB::table('categories')->get();
            return view ('admin.order.create',compact('products','customers','categories'));
       }
}
