@extends('admin.layouts.app')
@section("content")

<section class="content-header">					
    <div class="container-fluid my-1">
        <div class="row mb-1">


            @php
                $date =  date('d-m-y');
                $expen = DB::Table('expenses')->where('date',$date)->sum('amount');
            @endphp

            <div class="col-sm-3">
                <h1><i class="fa-solid fa-list"></i> All Expense</h1>
            </div>
            <div class="col-sm-3">
                <h3> Today Cost = {{$expen }}  ৳</h3>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add New Expense</a>
                <a href="{{ route('expenses.index') }}" class="btn btn-success">Today</a>
                <a href="{{ route('expenses.monthlyExpense') }}" class="btn btn-info">Month</a>
                <a href="{{ route('expenses.yearlyExpense') }}" class="btn btn-warning">Year</a>
            </div>
        </div>
    </div>
</section>


          
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
            <form action="" method="get">
            <div class="card-header">
                <div class="card-title">
                    <button class="btn btn-default btn-sm" type="button" 
                    onclick = "window.location.href='{{ route("expenses.index") }}'">Reset</button> 

                </div>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" value="{{ Request::get('kewword') }}" name="keyword" class="form-control float-right" placeholder="Search">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                    </div> 
            </div>
        </form>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead style="background-color: rgb(232, 231, 231)">
                        <tr>
                            <th width="200">ID</th>
                            <th>Details</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($expenses as $expense )
                        <tr>
                            <td>{{ $expense ->id }}</td>
                            <td>{{ $expense ->expenses_details }}</td>
                            <td>{{ $expense ->date }}</td>
                            <td>{{ $expense ->amount }}</td>
                            <td>
                                <a href="{{ route('expenses.edit',$expense ->id) }}"> 
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('expenses.delete',$expense ->id) }}"  class="text-danger w-4 h-4 mr-1">
                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                      </svg>
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                {{ $expenses->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
  <script>
        
 </script>
@endsection


