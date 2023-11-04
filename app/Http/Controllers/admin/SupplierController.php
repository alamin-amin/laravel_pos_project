<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function  index(Request $request){
        $suppliers=supplier::latest();
        if(!empty($request->get('keyword'))){
            $suppliers = $suppliers->where('name','like','%'.$request->get('keyword').'%');
        }

        $suppliers= $suppliers->paginate(5);
        return view('admin.supplier.list',compact('suppliers'));
    }

    public function create(){
        return view('admin.supplier.create');
       }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers',
            'phone' => 'required',
            'address' => 'required',
            
        ]);

        $suppliers['name'] = $request->name;
        $suppliers['email'] = $request->email;
        $suppliers['phone'] = $request->phone;
        $suppliers['address'] = $request->address;
        supplier::create($suppliers);
        return redirect()->route('suppliers.index')->with('success','Supplier Added successful!');
    }
    public function edit(supplier $supplier){
        return view('admin.supplier.edit',compact('supplier'));
        
    }
    public function update(Request $request, supplier $supplier){
        $suppliers['name'] = $request->name;
        $suppliers['email'] = $request->email;
        $suppliers['phone'] = $request->phone;
        $suppliers['address'] = $request->address;
        $supplier->update($suppliers);
        return redirect()->route('suppliers.index')->with('success','Unit delete successful!');
    }
    public function destroy($id){
        $suppliers = supplier::find($id);
        $suppliers->delete();
        return redirect()->route('suppliers.index')->with('success','Unit delete successful!');
    }
}
