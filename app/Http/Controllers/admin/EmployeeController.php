<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
   public function  index(Request $request){
      $employee= Employee::latest();
      if(!empty($request->get('keyword'))){
          $employee = $employee->where('name','like','%'.$request->get('keyword').'%');
      }

      $employee= $employee->paginate(5);
      return view('admin.employee.list',compact('employee'));
  }
   public function create(){
      return view('admin.employee.create');
     }
     public function store(Request $request){
      $validator = Validator::make($request->all(),[
          'name'=>'required',
          'email'=>'required|unique:employees|max:255',
          'nid_no'=>'required|unique:employees|max:18',
          'address'=>'required',
          'phone'=>'required',
          'salary'=>'required',
      ]);
         $employee['name'] =$request->name;
         $employee ['email'] =$request->email;
         $employee['phone'] =$request->phone;
         $employee['address'] =$request->address;
         $employee['experience'] =$request->experience;
         $employee['nid_no'] =$request->nid_no;
         $employee['photo ']=$request->photo;
         $employee['salary'] =$request->salary;
         $employee['vacation'] =$request->vacation;
         Employee::create($employee);
         return redirect()->route('employee.index');
    
   }

//    public function show($id){
//     $employee = Employee::find($id);
//     return view('admin.employee.show',compact('employee'));
//    }
   public function edit($employeeId, Request $request){
      $employee = Employee::find($employeeId);
      if(empty($employee)){
          return redirect()->route('employee.index');
      }
      return view('admin.employee.edit',compact('employee'));
  }
  public function update(Request $request, Employee $employee){
   $data['name'] =$request->name;
   $data ['email'] =$request->email;
   $data['phone'] =$request->phone;
   $data['address'] =$request->address;
   $data['experience'] =$request->experience;
   $data['nid_no'] =$request->nid_no;
   $data['photo ']=$request->photo;
   $data['salary'] =$request->salary;
   $data['vacation'] =$request->vacation;
   $employee->update($data);
   return redirect()->route('employee.index');
  }

  public function destroy($id){
    $employee = Employee::find($id);
    $employee->delete();
    return redirect()->route('employee.index');

}


  
}
