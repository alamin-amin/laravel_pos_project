<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\category;
use Illuminate\Support\Str;
use Faker\Core\File;
use Spatie\FlareClient\Http\Exceptions\NotFound;


class CategoryController extends Controller
{
    public function  index(Request $request){
        $categoris= category::latest();
        if(!empty($request->get('keyword'))){
            $categoris = $categoris->where('name','like','%'.$request->get('keyword').'%');
        }

        $categoris= $categoris->paginate(5);
        return view('admin.category.list',compact('categoris'));
    }
    public function create(){
     return view('admin.category.create');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required|unique:categories',
        ]);
        if($validator->passes()){

            $category = new category();
            $category->name =$request->name;
            $category->slug =$request->slug;
            $category->status =$request->status;
            $category->save();

            return response()->json([
                'status'=>true,
                'message'=>"Category added successfully"
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    public function edit($categoryId, Request $request){
        $category = category::find($categoryId);
        if(empty($category)){
            return redirect()->route('categories.index');
        }
        return view('admin.category.edit',compact('category'));
    }



    public function update($categoryId, Request $request){
        $category = category::find($categoryId);
        if(empty($category)){
            return response()->json([
                'status'=>false,
                'notFound'=>true,
                'message' =>'Category not found'
                ]);
        }
        

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required|unique:categories,slug,'.$category->id.',id',
        ]);
        if($validator->passes()){

            $category->name =$request->name;
            $category->slug =$request->slug;
            $category->status =$request->status;
            $category->save();

            return response()->json([
                'status'=>true,
                'message'=>"Category Updated successfully"
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    public function destroy($categoryId, Request $request){
        $category = category::find($categoryId);
        // if(empty($category)){
            $category->delete();
            return redirect()->route("categories.index");  
        }
        
        // return response()->json([
        //     "status" => true,
        //     "message" => "Category deleted successfully !"
        //     ]);
    // }
}
