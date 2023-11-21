@extends('admin.layouts.app')

@section("content")
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                
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
            <div class="col-lg-4 col-6">							
                <div class="small-box card d-flex" style="background-color: #88a889">
                    <div class="d-flex pt-2 pl-3" style="font-size: 44px">
                        <i class="fa-solid fa-cart-flatbed-suitcase"></i> <span style="font-size: 24px; padding-left:23px">{{ $orderCount }}</span></i>
                    </div>
                    <div class=" d-flex inner">
                        <h4 class="pl-2">Total Orders </h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">							
                <div class="small-box card d-flex" style="background-color: #41f158">
                    <div class="d-flex pt-2 pl-3" style="font-size: 44px">
                        <i class="fa-solid fa-sitemap"></i> <span style="font-size: 24px; padding-left:23px"> {{  $totalSale  }} TK</span></i>
                    </div>
                    <div class=" d-flex inner">
                        <h4 class="pl-2">Total sale</h4>
                        <span class="pl-4"><i class="fa-solid fa-weight-scale"></i> Today sale :  {{ $todaySale }} TK</span>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">							
                <div class="small-box card " style="background-color: #54b58e">
                    <div class="d-flex pt-2 pl-2" style="font-size: 44px">
                        <i class="fa-solid fa-store"></i> <span style="font-size: 24px; padding-left:23px">{{$productCount}}</span></i>
                    </div>
                    <div class=" d-flex inner">
                            <h4 class="pl-2">Total Products</h4>
                            <span class="pl-4"><i class="fa-brands fa-quinscape"></i></i> Quantity :  {{ $totalQty }}</span>            
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">							
                <div class="small-box card d-flex" style="background-color: #caf47b">
                    <div class="d-flex pt-2 pl-3" style="font-size: 44px">
                        <i class="fa-solid fa-cart-shopping"></i> <span style="font-size: 24px; padding-left:23px">{{$categoryCount}}</span></i>
                    </div>
                    <div class=" d-flex inner">
                        <h4 class="pl-3">Total Category</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('categories.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-4 col-6">							
                <div class="small-box card d-flex" style="background-color: rgb(123, 244, 189)">
                    <div class="d-flex pt-2 pl-3" style="font-size: 44px">
                        <i class="fa-solid fa-user-plus"></i> <span style="font-size: 24px; padding-left:23px">{{$customerCount }}</span></i>
                    </div>
                    <div class=" d-flex inner">
                        <h4 class="pl-3">Total Customers</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('customers.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
                @php
                    $date =  date('d-m-y');
                    $expen = DB::Table('expenses')->where('date',$date)->sum('amount');
                @endphp

                <div class="col-lg-4 col-6">							
                    <div class="small-box card d-flex" style="background-color: rgb(232, 183, 49)">
                        <div class="d-flex pt-2 pl-3" style="font-size: 44px">
                            <i class="fa-solid fa-scale-balanced"> <span style="font-size: 24px; padding-left:23px">{{$expen }} TK</span></i>
                        </div>
                        <div class=" d-flex inner">
                            <h4 class="pl-3">Daily Expense</h4>
                            
                       
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('expenses.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> 
        </div>
    </div>					
    <!-- /.card -->
</section>
  
@endsection
@section('customJs')
    <script>
    console.log('Hello')
    
    </script>
@endsection