@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Edit Products</h1>
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
            <form action="{{ route('products.update',$product->id) }}" method="post" name ="categoryForm" id ="categoryForm" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Product Name</label>
                                    <input type="text" name ="product_name" value="{{ $product ->product_name }}" id ="name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Description</label>
                                    <input type="text" name ="Description" value="{{$product ->description}}" id ="phone" class="form-control" placeholder="Enter your phone number">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Product Code</label>
                                    <input type="text" name ="Product_code" value="{{ $product ->Product_code  }}" id ="address" class="form-control" placeholder="Address">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ ($product->status ==1) ?'selected': '' }} value="1">Active</option>
                                        <option {{ ($product->status ==0) ?'selected': '' }} value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="">Product Images</label>
                                        <img src="/product_image/{{ $product ->product_image }}" alt="" style ="height: 60px; width:70px">
                                    </div>
                            </div>	
                            <div class="col-md-6>
                                <div class = " mb-2">
                                    <label for="image">Update Images</label>
                                    <input type="file" name ="product_image" class="form-control" placeholder="image"/>	
                                </div>
                            </div>	
                        </div>				
                    </div>						
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
       
   
    </script>
@endsection
