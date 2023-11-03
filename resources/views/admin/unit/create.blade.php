@extends('admin.layouts.app')
@section("content")

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif		
    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                
                <div class="col-sm-6">
                    <h1>Add units</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('units.store') }}" method="post" name ="categoryForm" id ="categoryForm">
                @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Unit Name</label>
                                    <input type="text" name ="name" id ="name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                            @error('nmae')
                                <span class="text-danger">{{ $message }}</span>   
                            @enderror					
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>   
                            @enderror									
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('units.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        
    </script>
@endsection
