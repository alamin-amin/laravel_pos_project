@extends('admin.layouts.app')
@section("content")

<section class="content-header">					
    <div class="container-fluid my-1">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1>Show data</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('brands.create') }}" class="btn btn-primary"> Add New Brands</a>
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
                    onclick = "window.location.href='{{ route("brands.index") }}'">Reset</button> 

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
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th width="100">Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($employee->isNotEmpty())
                        @foreach ($employee as $data )
                        <tr>
                            <td>{{ $data ->id }}</td>
                            <td>{{ $data ->name }}</td>
                            <td>{{ $data ->email }}</td>
                            <td>{{ $data ->phone }}</td>
                            <td>{{ $data ->address }}</td>
                            <td>{{ $data ->experience }}</td>
                            <td>{{ $data ->nid_no }}</td>
                            <td>{{ $data ->salary }}</td>
                            <td>{{ $data ->vacation }}</td>
                            
                           
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5"> Records Not Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                {{ $brands->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
  <script>
       
    </script>
@endsection


