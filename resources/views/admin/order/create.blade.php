@extends('admin.layouts.app')
@section("content")

<section class="">					
    <div class="container-fluid">
      <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fa-solid fa-scale-balanced"></i>  Create Orders</h1>
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
                      <form action="{{ route('place-orders.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                           <div class="col-7">
                            <label style="font-size: 30px; padding-left:6px; for="name"> <i class="fa-solid fa-layer-group"></i> Customers</label>
                            <select name="customer" id="customer" class="form-control">
                                <option value=""> Select a Customer</option>
                                @foreach ( $customers as  $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach 
                            </select>
                           </div>
                           
                            <div class="col-5">
                                <a href="#" class="btn btn-primary text-right mt-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">New Cuestomer</a>
                            </div>
                        </div>
                          {{-- //add tocart list.... --}}
                        <div style="border :1px solid grey">
                           <div>
                               <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Products</th>
                                      <th>Qty</th>
                                      <th>price</th>
                                      <th>Total</th>
                                      <th width="10">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     @foreach ( $cartData as $data )
                                      <tr>
                                          <td> <input type="text" name="product_name" value="{{  $data->product_name }}" style="width:100px; border: none;"></td>
                                          <td> 
                                              {{-- <form action="" method="post"> --}}
                                              
                                              <input type="number" name="qty" value="{{ $data->qty }}" style="width:40px;border: none;">
                                                {{-- <button type="text" class="btn btn-sm btn-info"><i class="fa-solid fa-square-check"></i></button> --}}
                                              {{-- </form> --}}
                                      
                                          </td>
                                          <td>{{  $data->Price  }}</td>
                                          <td> <input type="text" name="total" value="{{  $data->total }}" style="width:50px; border: none;"></td>
                                          <td class="pl-3"><a href="{{ route('carts.delete',$data->id) }}" class="text-danger "><i class="fa-solid fa-xmark"></i></a></td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                               </table>
                              </div>
                             
                              <hr>
                              <div class="pl-4  bg-light">
                                  <td> <span style="font-size:20px">Sub Total :</span> <input type="text" name="sub_total" value="{{ $subTotal }}" style="width:350px; border: none;"></td>
                              </div>
                                <hr>
                                
                             
                              <div class="row">
                                <div class="col-6 pl-5">
                                   <h4><i class="fa-regular fa-money-bill-1"></i> Total Pay <input type="text" name="sub_total" value="{{  $subTotal }} TK " style="width:100%; border: none;"></h4>
                                </div>
                                <div class="col-6">
                                  <h4>Payment Method</h4>
                                  <label for="payment"><i class="fa-solid fa-sack-dollar"></i> Hand Cash
                                    <input type="checkbox" value="handcash" name="payment_type" class="ml-3 selected>
                                    <span class="checkmark"></span>
                                  </label><br>
                                  <label for="payment"><i class="fa-solid fa-money-check"></i>  Digital pay
                                    <input type="checkbox" value="digitalpay"  name="payment_type" class="ml-3">
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                              </div>
                              <div class="mb-2 pl-3 ">
                                <button class="btn btn-success">Submit Order</button>
                              </div>
                            </form>
                        </div>
                    </div> 
                    
                    {{-- Right side start here --}}

                    <div class="col-7">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                   	<th>Add to Cart</th>			
                                    <th>Product Name</th>
                                    <th>Images</th>
                                    <th>QTY</th>
                                    <th>Price</th>                                   
                                    <th>Brand</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                <tr>
                                  <form action="{{ route('carts.addToCart',$product->id) }}" method="post">
                                     @csrf
                                      <td>
                                       <button type="submit"><i class="fa-solid fa-cart-shopping"></i></button> 
                                       <input type="number" value="1" name="qty" style="width: 40px">
                                      </td>
                                      <td>
                                        {{$product->product_name  }}
                                      </td>
                                    <td>
                                        <img src="/product_image/{{$product ->product_image}}" style="height: 40px;width:50px;"> 
                                    </td>
                                    @if('error')
                                      not
                                    @endif
                                    <td>{{$product->qty}}</td>
                                    <td>{{$product->selling_price}}</td>                                   
                                    <td>{{$product->brandName}}</td>
                                    <td>{{$product->Product_code}}</td>	
                                  </form>	
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                          <div class="row">
                            @foreach ($products as $product )
                            <div class="col-6">
                              <div class="card bg-warning m-1" >
                                <form action="{{ route('carts.addToCart',$product->id) }}" method="post">
                                  @csrf
                                  <p> <img src="/product_image/{{$product ->product_image}}" style="height: 100px;width:100%;"></p>
                                    <div class=" ">
                                      <h5>Product : {{$product->product_name  }}</h5>
                                      <p> Brand : {{$product->brandName}}</p>
                                      <p class=""> Price : {{$product->selling_price}}</p>
                                    </div>
                                      <div class="pb-3">
                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i></button>
                                        <input type="number" value="1" name="qty" style="width: 40px">
                                      </div>      
                                 </form>
                              </div>
                            </div>
                            @endforeach
                          </div>
                          
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
          @csrf
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