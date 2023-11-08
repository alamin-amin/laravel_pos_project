<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function  index(Request $request){
        $units=unit::latest();
        if(!empty($request->get('keyword'))){
            $units = $units->where('name','like','%'.$request->get('keyword').'%');
        }

        $units= $units->paginate(5);
        return view('admin.unit.list',compact('units'));
    }
    public function create(){
        return view('admin.unit.create');
       }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $units['name'] = $request->name;
        $units['status'] = $request->status;
        unit::create($units);
        return redirect()->route('units.index')->with('success','Unit create successful!');

    }
    public function show($id){

    }
    public function edit(unit $unit){
        return view('admin.unit.edit',compact('unit'));
        
    }
    public function update(Request $request, Unit $unit){
        $units['name'] = $request->name;
        $units['status'] = $request->status;
        $unit ->update($units);
        return redirect()->route('units.index')->with('success','Unit update successful!');
    }
    public function destroy($id){
        $units = unit::find($id);
        $units->delete();
        return redirect()->route('units.index')->with('success','Unit delete successful!');
    }

}
