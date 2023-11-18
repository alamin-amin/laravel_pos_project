@extends('admin.layouts.app')
@section("content")

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order: #4F3S8J</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="orders.html" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pt-3">
                        <div class="row invoice-info">
                            <div class="col-sm-6 pl-5 invoice-col">
                            <h1 class="h5 mb-3">Shop Address</h1>
                            <address>
                                <strong>Alamin</strong><br>
                                795 Folsom Ave, Mohammadpur<br>
                                Dkhaka, Bangladesh<br>
                                Phone: 01710034645 <br>
                                Email: alamin@gmail.com.com
                            </address>
                            </div>  
                            <div class="col-sm-6 text-right pr-5 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Total:</b> 9560.40<br>
                                <b>Status:</b> <span class="text-success">Delivered</span>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-3">								
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th width="100">Price</th>
                                    <th width="100">Qty</th>                                        
                                    <th width="100">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($invoiceLists as $invoiceList ) --}}
                                <tr>
                                    <td>56</td>
                                    <td>$10.00</td>                                        
                                    <td>2</td>
                                    <td>$20.00</td>
                                </tr>
                                {{-- @endforeach --}}
                                <tr>
                                    <th colspan="3" class="text-right">Subtotal:</th>
                                    <td>6000.00</td>
                                </tr>
                                
                                <tr>
                                    <th colspan="3" class="text-right">Shipping:</th>
                                    <td>8975.00</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-right">Grand Total:</th>
                                    <td>876.00</td>
                                </tr>
                                
                            </tbody>
                        </table>								
                    </div>                            
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Order Status</h2>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control">
                                <option value="">Pending</option>
                                <option value="">Shipped</option>
                                <option value="">Delivered</option>
                                <option value="">Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Send Inovice Email</h2>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control">
                                <option value="">Customer</option>                                                
                                <option value="">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- /.card -->
</section>


@endsection
@section('customJs')
  <script>
       
    </script>
@endsection