@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1> <i class="fa-solid fa-user-secret"></i> Add Customers</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('customers.store') }}" method="post" name ="categoryForm" id ="categoryForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name ="name" id ="name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Email</label>
                                    <input type="text" name ="email" id ="email" class="form-control" placeholder="Enter your email">
                                    <p></p>	
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Phone</label>
                                    <input type="text" name ="phone" id ="phone" class="form-control" placeholder="Enter your phone number">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Address</label>
                                    <input type="text" name ="address" id ="address" class="form-control" placeholder="Address">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>		
                            					
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
       
   
    </script>
@endsection
