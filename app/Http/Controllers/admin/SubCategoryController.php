<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
   public function index(Request $request){
      $subCategoris= SubCategory::select('sub_categories.*','categories.name as categoryName')->latest('sub_categories.id')->leftJoin('categories','categories.id','sub_categories.category_id');
      if(!empty($request->get('keyword'))){
          $subCategoris = $subCategoris->where('sub_categories.name','like','%'.$request->get('keyword').'%');
          $subCategoris = $subCategoris->orWhere('categories.name','like','%'.$request->get('keyword').'%');
      }

      $subCategoris= $subCategoris->paginate(5);
      return view('admin.sub_category.list',compact('subCategoris'));
   }
   public function create(){
    $categories = category::orderBy("name","ASC")->get();
    $data ['categories']= $categories;
    return view("admin.sub_category.create", $data);

   }
   public function store(Request $request){
      $valadator = Validator::make($request->all(),[
         "name"=> "required",
         "slug"=>"required|unique:sub_categories",
         "category"=>"required",
         "status"=>"required",
      ]);
      if($valadator->passes()){
         $subCategory = new SubCategory();
         $subCategory->name = $request->name;
         $subCategory->slug = $request->slug;
         $subCategory->status = $request->status;
         $subCategory->category_id = $request->category;
         $subCategory->save();
         return response([
            'status' => true,
            'message'=> 'Sub category create successfully'  
         ]);
      }else{
         return response([
            'status' => false,
            'errors' => $valadator->errors()
         ]);
      }
   }

   public function edit($id,Request $request){
      $subCategory = SubCategory::find($id);
      if(empty($subCategory)){  
         return redirect()->route('sub-categories.index');
       }

      $categories = category::orderBy("name","ASC")->get();
      $data ['categories']= $categories;
      $data ['subCategory'] = $subCategory;
      return view("admin.sub_category.edit", $data);
   }
   public function update($id, Request $request){
      $subCategory = SubCategory::find($id);
      
      if(empty($subCategory)){
         return response([
            "status"=> false,
            'notFound'=> true
            
            ]);
         } 
         
         $valadator = Validator::make($request->all(),[
            "name"=> "required",
            'slug'=>'required|unique:sub_categories,slug,'.$subCategory->id.',id',
            "category"=>"required",
            "status"=>"required",
         ]);
         if($valadator->passes()){
           
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;
            $subCategory->status = $request->status;
            $subCategory->category_id = $request->category;
            $subCategory->save();

            return response([
               'status' => true,
               'message'=> 'Sub category Update successfully'
               
            ]);
         }else{
            return response([
               'status' => false,
               'errors' => $valadator->errors()
            ]);
         }
    }
    public function destroy($id){
      $subCategory = SubCategory::find($id);
      $subCategory->delete();   
       return redirect()->route('sub-categories.index');      
    }

}
