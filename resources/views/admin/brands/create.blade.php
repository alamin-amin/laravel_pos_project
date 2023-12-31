@extends('admin.layouts.app')
@section("content")

<section class="content-header">					
    <div class="container-fluid my-1">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1><i class="fa-solid fa-code-branch"></i> Create Brand</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('brands.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" method="post" id="createBrandForm" name="createBrandForm">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name :</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Add Brand name">
                                <p></p>	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Slug :</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
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
            <div class="pb-5 pt-1">
                <button type="submit" class="btn btn-primary"> 
                    Create</button>
                <a href="{{ route('brands.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customJs')
    <script>
        $('#createBrandForm').submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type = submit]").prop('disabled',true);
            $.ajax({
                url:'{{ route("brands.store") }}',
                type:'post',
                data: element.serializeArray(),
                dataType:'json',
                success:function(response){
                    if(response["status"]==true){
                        window.location.href="{{ route('brands.index') }}";
                        $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

                        $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }else{
                        
                        var errors = response['errors'];
                        if(errors['name']){
                            $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
                        }else{
                            $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        if(errors['slug']){
                            $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);
                        }else{
                            $("#slug").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                    }  
                }, error:function(jqXHR, exception){
                    console.log('Somethin want wrong');
                }
            })
        });

    </script>
@endsection