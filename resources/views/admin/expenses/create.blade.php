@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Add Expenses</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('expenses.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('expenses.store') }}" method="post" name ="categoryForm" id ="categoryForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="name">Expense Details</label>
                                    <textarea  name ="expenses_details" id ="name" class="form-control" placeholder="Expense Details" ></textarea>
                                    <p></p>	
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="name">Amount</label>
                                    <input type="text" name ="amount" id ="email" class="form-control" placeholder="Enter your email">
                                    <p></p>	
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="mb-2">

                                    <input type="hidden" value="{{ date('F') }}" name ="month" id ="address" class="form-control" placeholder="Address">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="hidden" value="{{ date('d-m-y') }}" name ="date" id ="phone" class="form-control" placeholder="Enter your phone number">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <input type="hidden" value="{{ date('Y') }}" name ="year" id ="phone" class="form-control" placeholder="Enter your phone number">
                                    <p></p>	
                                </div>
                            </div>
                    					
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('expenses.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
       
   
    </script>
@endsection
