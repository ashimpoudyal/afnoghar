@extends('admin.includes.admin_design')


@section('title') Edit Service  - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Edit Service </h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('service.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View Service  </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                                <form action="{{ route('updateService', $services->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Service Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"> Name</label>
                                                   <input type="text" class="form-control" name="name" id="name" value="{{ $services->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon</label>
                                                     <input type="text" class="form-control" name="icon" id="icon" value="{{ $services->icon }}">
                                                </div>
                                            </div>
                                           

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Image</label>
                                              <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="readURL(this);">

                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                    <div class="card-body text-center">
                                        @if(empty($services->image))
                                        <img src="{{ asset('public/uploads/default/cat_image.png') }}" class="avatar avatar-xxl brround" alt="" id="one">
                                         @else
                                         <img src="{{ asset('public/uploads/service/'.$services->image) }}" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @endif
                                    </div>
                                                </div>
                                            


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $services->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Excerpt</label>
                                                    <textarea class="form-control" name="excerpt" id="excerpt">{{ $services->excerpt }}</textarea>
                                                </div>
                                            </div>

                                            

                                        </div>









                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn  btn-success">Update</button>
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
        

