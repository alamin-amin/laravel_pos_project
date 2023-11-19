@extends('admin.layouts.app')
@section("content")

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- @foreach ( $orderList as $list ) --}}
                 <h1> Order Id # </h1>
                {{-- @endforeach --}}
            </div>
            <div class="col-sm-6 text-right">
                <a href="" class="btn btn-info mr-3"> <i class="fa-solid fa-print"></i></a>
                <a href="orders.html" class="btn btn-primary mr-3"><i class="fa-solid fa-file-arrow-down"></i></a>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
               
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
                                795 Folsom Ave, Mohammadpur, Dhaka.<br>
                                Phone: 01710034645 <br>
                               
                            </address>
                            </div> 
                             
                            <div class="col-sm-6 text-right pr-5 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Total:</b> 9560.40 <br>
                                <b>Status:</b> <span class="text-success">Delivered</span>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-3">								
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="60">ID</th>
                                    <th>Product Name</th>
                                    <th>Invoice</th>
                                     <th>QTY</th>
                                    <th>Payment Type</th>
                                    <th>Total</th>
                                </tr>
                  
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $orderItem )
                                <tr>
                                    <td>{{ $orderItem->id }}</td>
                                    <td>{{ $orderItem->product['product_name'] }}</td>
                                    <td>{{ $orderItem->invoice_no }}</td>
                                    <td>{{ $orderItem->qty }}</td>
                                    <td>{{ $orderItem->payment_type }}</td>
                                    <td>{{ $orderItem->total }}</td> 
                                </tr>
                                @endforeach
                                
                                <tr>
                                    <th colspan="3" class="text-right">Subtotal :</th>
                                    <td>{{ $invoiceSubTotal}}</td>
                                </tr>
                                {{-- <tr>
                                    <th colspan="3" class="text-right">Grand Total :</th>
                                    <td>876.00</td>
                                </tr> --}}
                              
                            </tbody>
                        </table>								
                    </div>                            
                </div>
            </div>
        </div>
    </div>
  
    <!-- /.card -->
</section>
@endsection

@section('customJs')
  <script>
       
    </script>
@endsection