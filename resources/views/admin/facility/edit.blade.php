@extends('admin.includes.admin_design')


@section('title') Edit Facility  - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Edit Facility </h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('facility.index') }}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View Facility  </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                                <form action="{{ route('updateFacility', $facilities->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Facility Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Name</label>
                                                   <input type="text" class="form-control" name="name" id="name" value="{{ $facilities->name }}">
                                                </div>
                                            </div>
                                            
                                           <!--  <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon</label>
                                                     <input type="text" class="form-control" name="icon" id="icon" value="{{ old('icon') }}">
                                                </div>
                                            </div>
                                            -->

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Image</label>
                                              <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="readURL(this);">

                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                    <div class="card-body text-center">
                                        @if(empty($facilities->image))
                                        <img src="{{ asset('public/uploads/default/cat_image.png') }}" class="avatar avatar-xxl brround" alt="" id="one">
                                         @else
                                         <img src="{{ asset('public/uploads/facility/'.$facilities->image) }}" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @endif
                                    </div>
                                                </div>
                                            
                                            


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $facilities->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Excerpt</label>
                                                    <textarea class="form-control" name="excerpt" id="excerpt">{{ $facilities->excerpt }}</textarea>
                                                </div>
                                            </div>

                                            

                                        </div>









                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn  btn-success">Save</button>
                                        <a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- End Row-->


                    </div>
                </div>
                <!-- CONTAINER END -->
            </div>

          
@endsection

@section('js')
    <script>
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                .attr('src', e.target.result)
                .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

     <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


    @endsection
        

