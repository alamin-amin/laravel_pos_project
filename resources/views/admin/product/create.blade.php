@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
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
            <form action="" method="post" name ="categoryForm" id ="categoryForm">
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Product Name</label>
                                    <input type="text" name ="name" id ="product_name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Category Name</label>
                                    <input type="text" name ="name" id ="name" class="form-control" placeholder="Category Name">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Sub Category Name</label>
                                    <input type="text" name ="name" id ="name" class="form-control" placeholder="Sub Category">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Unit</label>
                                    <input type="text" name ="unit" id ="unit" class="form-control" placeholder="Unit">
                                    <p></p>	
                                </div>
                            </div>
                      
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Description</label>
                                    <input type="text" name ="description" id ="description" class="form-control" placeholder="Description">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Salliing price</label>
                                    <input type="text" name ="name" id ="name" class="form-control" placeholder="Sub Category">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Sku</label>
                                    <input type="text" name ="sku" id ="name" class="form-control" placeholder="Sku">
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
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img id="image" src="#" >
                                    <label for="name">Picture</label><br>
                                    <input type="file" name ="photo" id ="photo" accept="image/*" class="upload" required onchange="readURL(this);">
                                    <p></p>	
                                </div>
                            </div>										
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $('#categoryForm').submit(function(event){
            event.preventDefault();
            var element= $(this);
            $("button[type=submit]").prop ('disabled',true);
            $.ajax({
                url:'{{ route("categories.store") }}',
                type:'post',
                data: element.serializeArray(),
                dataType:'json',
                success:function(response){
                    if(response["status"]==true){
                        window.location.href="{{ route('categories.index') }}";
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

            
        $("#name").change(function(){
                element= $(this);
                $.ajax({
                    url:'{{ route("getSlug") }}',
                    type:'get',
                data: {title: element.val()},
                dataType:'json',
                    success:function(response){
                        if(response["status"]==true){
                            $('#slug').val()
                        }
                    }
                });
         });  
   
    </script>
@endsection
