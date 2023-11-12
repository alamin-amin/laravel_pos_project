@extends('admin.layouts.app')
@section("content")

<section class="">					
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fa-solid fa-baby-carriage"></i>  Create Orders</h1>
            </div>
            <div class="col-sm-6 text-right">
                <h3 class="pt-3"> {{ date('d-m-y') }}</h3>
               
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" name="table_search" class=" float-right" placeholder="Search">
    
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <div class="row">

                    <div class="col-5">
                        <div class="mb-3 row">
                           <div class="col-7">
                            <label style="font-size: 30px; padding-left:6px; for="name">Customers</label>
                            <select name="customer" id="customer" class="form-control">
                                <option value=""> Select a Customer</option>
                                @foreach ( $customers as  $customer)
                                    <option>{{ $customer->name }}</option>
                                @endforeach 
                            </select>
                           </div>
                           
                            <div class="col-5">
                                <a href="#" class="btn btn-primary text-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">New Cuestomer</a>
                            </div>
                        </div>

                        <div>
                           <div>
                                <h5 class="text-center bg-success">Product not Added</h5>
                           </div>
                           <div class="pl-4">
                            <p style="font-size:20px">Quantity : 00.00</p>
                            <p style="font-size:20px">Product : 00.00</p>
                            <p style="font-size:20px">Vat : 00.00</p>
                            <hr>
                            <p>Total : 0000</p>
                           </div>
                           <button class="btn btn-success">Submit Order</button>
                        </div>

                        

                    </div>  
                    <div class="col-7">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                   										
                                    <th>Product Name</th>
                                    <th>Images</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Code</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                <tr>
                                    
                                    <td>
                                        <a href="#" style="font-size: 20px; padding-right:11px"><i class="fa-solid fa-square-plus"></i></a>
                                        {{$product->product_name  }}
                                    </td>
                                    <td>
                                        <img src="/product_image/{{$product ->product_image}}" style="height: 40px;width:50px;"> 
                                    </td>
                                    <td>{{$product->categoryName}}</td>
                                    <td>{{$product->brandName}}</td>
                                    <td>{{$product->selling_price}}</td>
                                    <td>{{$product->Product_code}}</td>																		
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>							
               
                </div>											
            </div>
        </div>
    </div>
    <!-- /.card -->




{{-- customers add modal  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="">
        <h4 class="modal-title bg-info text-center " id="exampleModalLabel"> Add New Customer</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('customers.store') }}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name : </label>
            <input type="text" name="name" placeholder="Customer Name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email : </label>
            <input type="text" name="email" placeholder="Email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone Number : </label>
            <input type="text" name="phone" placeholder=" Phone Number" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address : </label>
            <input type="text" name="address" placeholder="Address" class="form-control" id="recipient-name">
          </div>
          <div class="col-md-6">
            <div class="mb-2">
                <label for="status" class="col-form-label">Status</label>
                <select name="status" id="recipient-name" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
            </div>
        </div>	
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
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