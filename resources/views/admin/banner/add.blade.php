@extends('admin.includes.admin_design')


@section('title') Add New Banner  - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Banner </h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('banner.index') }}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View Banner  </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                                <form action="{{ route('banner.store') ,}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Testinomial Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label"> Title</label>
                                                   <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                                                </div>
                                            </div>


                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Sub Title</label>
                                                    <textarea name="sub_title" id="sub_title" cols="30" rows="10" class="form-control">{{ old('sub_title') }}</textarea>
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Button 1 URL </label>
                                                     <input type="text" class="form-control" name="button1" id="button1" value="{{ old('button1') }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Button 2 URL </label>
                                                     <input type="text" class="form-control" name="button2" id="button2" value="{{ old('button2') }}">
                                                </div>
                                            </div>
                                           <!--  <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Priority Order</label>
                                                    <input type="number" id="order" name="order" class="form-control" placeholder="Priority Order" value="{{ old('order') }}">
                                                </div>
                                            </div> -->
                                           <!--  <div class="col-sm-6 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Icon</label>
                                                    <input type="text" id="icon" name="icon" class="form-control" placeholder="fa fa-icon_name" value="{{ old('icon') }}">
                                                </div>
                                            </div> -->
<!-- 
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="btn-list">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="status" id="btnradio1" autocomplete="off" checked="" value="1">
                                                <label class="btn btn-outline-primary" for="btnradio1">Active</label>

                                                <input type="radio" class="btn-check" name="status" id="btnradio2" autocomplete="off" value="0">
                                                <label class="btn btn-outline-primary" for="btnradio2">Inactive</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div> -->

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Image</label>
                                              <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="readURL(this);">

                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                    <div class="card-body text-center">
                                        <img src="" class="avatar avatar-xxl brround" alt="" id="one" >
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
    @endsection
        

