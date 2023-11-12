<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
   
    public function create(){
        return view('admin.Purchase_Order.create');
       }
}
