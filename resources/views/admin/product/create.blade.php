@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('products.store')}}" method="post" name ="productForm" id ="productForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Product Name</label>
                                    <input type="text" name ="product_name" id ="product_name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Category Name</label>
                                         @php
                                             $category = DB::table('categories')->get();
                                        @endphp
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value=""> Select a category</option>
                                            @foreach ($category as $row)
                                                 <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Sub Category Name</label>
                                    @php
                                        $sub_categories = DB::table('sub_categories')->get();
                                    @endphp
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                        <option value=""> Select a sub category</option>
                                        @foreach ($sub_categories as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Unit</label>
                                    @php
                                        $units = DB::table('units')->get();
                                    @endphp
                                    <select name="unit_id" id="category_id" class="form-control">
                                        <option value=""> Select a unit</option>
                                        @foreach ($units as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Brands Nmae</label>
                                    @php
                                        $brands = DB::table('brands')->get();
                                    @endphp
                                    <select name="brand_id" id="category_id" class="form-control">
                                        <option value=""> Select a Brand</option>
                                        @foreach ($brands as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Suppliers Nmae</label>
                                    @php
                                        $suppliers = DB::table('suppliers')->get();
                                    @endphp
                                <select name="supplier_id" id="category_id" class="form-control">
                                    <option value=""> Select a Supplier</option>
                                    @foreach ($suppliers as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                      
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Description</label>
                                    <input type="text" name ="description" id ="description" class="form-control" placeholder="Description">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">QTY</label>
                                    <input type="text" name ="qty" id ="QTY" class="form-control" placeholder="QTY">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Product Code</label>
                                    <input type="text" name ="Product_code" id ="description" class="form-control" placeholder="Description">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Salliing price</label>
                                    <input type="text" name ="selling_price" id ="selling_price" class="form-control" placeholder="Sub Category">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Buying price</label>
                                    <input type="text" name ="buying_price" id ="name" class="form-control" placeholder="Sub Category">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Sku</label>
                                    <input type="text" name ="sku" id ="name" class="form-control" placeholder="Sku">
                                    <p></p>	
                                </div>
                            </div>
                            								
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img id="image" src="#" >
                                    <label for="name">Picture</label><br>
                                    <input type="file" name ="product_image" id ="photo" accept="image/*" class="upload" onchange="readURL(this);">
                                    <p></p>	
                                </div>
                            </div>										
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
       
       function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#image')
                    .attr('src',e.target.result)
                    .width(60)
                    .height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
    </script>
@endsection
