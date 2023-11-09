@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Single Product Data</h1>
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
            
                <div class="card">
                    <div class="card-body pl-5" style=width:900px>								
                        <div class="row">
                            <div class="col-12 mb-3 ">
                                <img src="/product_image/{{ $products ->product_image }}" alt="" style="height: 150px;width:260px; border-radius:5%";>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h4 for="name">Product Name :</h4>
                                    <p>{{ $products->product_name }}</p>	
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h4 class="fs-5" for="name">Category Name :</h4>
                                       <p>{{ $products->categoryName }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h4 for="name">Sub Category Name :</h4>
                                    <p>{{ $products->subCategoryName}}</p>
                                   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h4 for="name">Unit :</h4>
                                    <p>{{ $products->unitName}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h4 for="name">Brands Nmae :</h4>
                                    <p>{{ $products->brandName}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">Suppliers Nmae :</h5>
                                    <p>{{ $products->supplierName }}</p>	
                                </div>
                            </div>
                      
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">Description :</h5>
                                    <p>{{ $products->description }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">QTY :</h5>
                                    <p>{{ $products->qty }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">Product Code :</h5>
                                    <p>{{ $products->Product_code }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">Salliing price :</h5>
                                    <p>{{ $products->selling_price }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">Buying price :</h5>
                                    <p>{{ $products->buying_price }}</p>	
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="name">Sku :</h5>
                                    <p>{{ $products->sku }}</p>
                                    
                                </div>
                            </div>
                            								
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <h5 for="status">Status :</h5>
                                    <p>{{ $products->status }}</p>
                                </div>
                            </div>						
                        </div>
                    </div>							
                </div>
              
        </div>
    </section>
@endsection

@section('customJs')
    <script>
       
       
    </script>
@endsection
