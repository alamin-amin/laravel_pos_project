@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Edit Customers</h1>
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
                                    <input type="text" name ="name" value="{{ $Customer->name }}" id ="name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Email</label>
                                    <input type="text" name ="email" value="{{ $Customer->email }}" id ="email" class="form-control" placeholder="Enter your email">
                                    <p></p>	
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Phone</label>
                                    <input type="text" name ="phone" value="{{ $Customer->phone }}" id ="phone" class="form-control" placeholder="Enter your phone number">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Address</label>
                                    <input type="text" name ="address" value="{{ $Customer->address }}" id ="address" class="form-control" placeholder="Address">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ ($Customer->status ==1) ?'selected': '' }} value="1">Active</option>
                                        <option {{ ($Customer->status ==1) ?'selected': '' }} value="0">Block</option>
                                    </select>
                                </div>
                            </div>		
                            					
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Update</button>
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
