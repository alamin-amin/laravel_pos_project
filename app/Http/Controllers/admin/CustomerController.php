<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function  index(Request $request){
        $customers=Customer::latest();
        if(!empty($request->get('keyword'))){
            $customers = $customers->where('name','like','%'.$request->get('keyword').'%');
        }

        $customers= $customers->paginate(5);
        return view('admin.customer.list',compact('customers'));
    }
    public function create(){
        return view('admin.customer.create');
       }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $customers['name'] = $request->name;
        $customers['email'] = $request->email;
        $customers['phone'] = $request->phone;
        $customers['address'] = $request->address;
        $customers['status'] = $request->status;
        Customer::create($customers);
        return back()->with('success','Customer Added successful!');

    }
    public function edit(Customer $Customer){
        return view('admin.customer.edit',compact('Customer'));
        
    }

    public function update(Request $request, Customer $customer){
        $customers['name'] = $request->name;
        $customers['email'] = $request->email;
        $customers['phone'] = $request->phone;
        $customers['address'] = $request->address;
        $customers['status'] = $request->status;
        $customer->update($customers);
        return redirect()->route('customers.index')->with('success','Customer Update successful!');
    }
    public function destroy($id){
        $customers = Customer::find($id);
        $customers->delete();
        return redirect()->route('customers.index')->with('success','Customer delete successful!');

    
    }
}
