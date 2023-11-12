<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{

    public function  index(Request $request){
        $expenses = expenses::latest();
        if(!empty($request->get('keyword'))){
            $expenses = $expenses->where('name','like','%'.$request->get('keyword').'%');
        }

        $expenses= $expenses->paginate(5);
        return view('admin.expenses.list',compact('expenses'));
    }
    public function create(){
        return view('admin.expenses.create');
       }
    public function store(Request $request){
        $request->validate([
            'expenses_details' => 'required|max:255',
            'amount' => 'required',
        ]);

        $expenses['expenses_details'] = $request->expenses_details;
        $expenses['amount'] = $request->amount;
        $expenses['month'] = $request->month;
        $expenses['date'] = $request->date;
        $expenses['year'] = $request->year;
       
        expenses::create($expenses);
        return redirect()->route('expenses.index')->with('success','Expense Added successful!');

    }
    public function edit(expenses $expense){
        return view('admin.expenses.edit',compact('expense'));
        
    }
    public function update (Request $request, expenses $expense){
        $expenses['expenses_details'] = $request->expenses_details;
        $expenses['amount'] = $request->amount;
        $expenses['month'] = $request->month;
        $expenses['date'] = $request->date;
        $expenses['year'] = $request->year;
        $expense->update($expenses);
        return redirect()->route('expenses.index')->with('success','Expense Update successful!');
    }
    public function destroy ($id){
        $expenses = expenses::find($id);
        $expenses->delete();
        return redirect()->route('expenses.index')->with('success','Expense delete successful!');
    }

    public function TodayExpense(){
        $date = date('d-m-y');
        $today = DB::table('expenses')->where('date', $date)->get();
       return view('admin.expenses.list',compact('today'));
    }


    public function monthlyExpense(){
        $month = date('F');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function yearlyExpense(){
        $year = date('Y');
        $years = DB::table('expenses')->where('year', $year)->get();    
        return view('admin.expenses.yearlyExpense',compact('years'));
    }



    public function january(){
        $month = ('January');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function february(){
        $month = ('February');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function march(){
        $month = ('March');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function april(){
        $month = ('April');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function may(){
        $month = ('May');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function june(){
        $month = ('June');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function july(){
        $month = ('July');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function august(){
        $month = ('August');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function september(){
        $month = ('September');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function october(){
        $month = ('October');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function november(){
        $month = ("November");
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }
    public function december(){
        $month = ('December');
        $exp= DB::table('expenses')->where('month', $month)->get();
       return view('admin.expenses.monthExpense',compact('exp'));
    }

}
