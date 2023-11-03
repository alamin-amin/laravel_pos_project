@extends('admin.layouts.app')
@section("content")

    <section class="content-header">					
        <div class="container-fluid my-1">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1>Edit Employee</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('employee.store') }}" method="post" name ="categoryForm" id ="categoryForm" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name ="name" value="{{ $employee->name }}" id ="name" class="form-control" placeholder="Name">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Email</label>
                                    <input type="text" name ="email" value="{{ $employee->email }}" id ="email" class="form-control" placeholder="Enter your email">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Phone</label>
                                    <input type="text" name ="phone" value="{{ $employee->phone }}" id ="phone" class="form-control" placeholder="Enter your phone number">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Address</label>
                                    <input type="text" name ="address" value="{{ $employee->address }}" id ="address" class="form-control" placeholder="Address">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Experience</label>
                                    <input type="text" name ="experience" value="{{ $employee->experience }}" id ="experience" class="form-control" placeholder="Experience">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">NID NO</label>
                                    <input type="text" name ="nid_no" value="{{ $employee->nid_no }}" id ="nid_no" class="form-control" placeholder="NID Number">
                                    <p></p>	
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Salary</label>
                                    <input type="text" name ="salary" value="{{ $employee->salary }}" id ="salary" class="form-control" placeholder="Salary">
                                    <p></p>	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name">Vacation</label>
                                    <input type="text" name ="vacation" value="{{ $employee->vacation }}" id ="vacation" class="form-control" placeholder="Vacation">
                                    <p></p>	
                                </div>
                            </div>
                            									
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img id="image" src="#" >
                                    <label for="name">Picture</label><br>
                                    <input type="file" name ="photo" value="{{ $employee->name }}" id ="photo" accept="image/*" class="upload" required onchange="readURL(this);">
                                    <p></p>	
                                </div>
                            </div>							
                        </div>
                    </div>							
                </div>
                <div class="pb-2 pt-1">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        // $('#categoryForm').submit(function(event){
        //     event.preventDefault();
        //     var element= $(this);
        //     $("button[type=submit]").prop ('disabled',true);
        //     $.ajax({
        //         url:'{{ route("categories.store") }}',
        //         type:'post',
        //         data: element.serializeArray(),
        //         dataType:'json',
        //         success:function(response){
        //             if(response["status"]==true){
        //                 window.location.href="{{ route('categories.index') }}";
        //                 $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");

        //                 $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
        //             }else{
                        
        //                 var errors = response['errors'];
        //                 if(errors['name']){
        //                     $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
        //                 }else{
        //                     $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
        //                 }


        //                 if(errors['slug']){
        //                     $('#email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['email']);
        //                 }else{
        //                     $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
        //                 }
        //             }  
        //         }, error:function(jqXHR, exception){
        //             console.log('Somethin want wrong');
        //         }
        //     })
        // });

            
        // $("#name").change(function(){
        //         element= $(this);
        //         $.ajax({
        //             url:'{{ route("getSlug") }}',
        //             type:'get',
        //         data: {title: element.val()},
        //         dataType:'json',
        //             success:function(response){
        //                 if(response["status"]==true){
        //                     $('#slug').val()
        //                 }
        //             }
        //         });
        //  });  
         
        //  // photo......
         function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#image')
                    .attr('src',e.target.result)
                    .width(60)
                    .height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
         }
   
    </script>
@endsection

