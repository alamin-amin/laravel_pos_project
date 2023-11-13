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
                <div class="small-box card bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-4 col-6">							
                <div class="small-box card bg-success">
                    <div class="inner">
                        <h3>50</h3>
                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-4 col-6">							
                <div class="small-box card" style="background-color: rgb(225, 118, 106)">
                    <div class="inner">
                        <h3>1000 TK</h3>
                        <p>Total Sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
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


            <div class="col-lg-4 col-6">							
                <div class="small-box card">
                    <div class="inner">
                        <h3>1000 TK</h3>
                        <p>Total Sale</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
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