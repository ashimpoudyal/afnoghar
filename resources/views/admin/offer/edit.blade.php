@extends('admin.includes.admin_design')


@section('title') Edit Offer - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Edit Offer</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('offer.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Offer </button></a>


                                    <!-- <a href="javascript:void(0);"  class="btn btn-primary btn-pill" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 5px;">
                                        <i class="fa fa-calendar me-2 fs-14"></i> Search By Date</a>
                                    <div class="dropdown-menu border-0">
                                            <a class="dropdown-item" href="javascript:void(0);">Today</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Yesterday</a>
                                            <a class="dropdown-item active bg-primary text-white" href="javascript:void(0);">Last 7 days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last 30 days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last 6 months</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last year</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                               <form action="{{ route('updatOffer', $offers->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Edit Offer</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Basic info:</div>
                                        <div class="row">



                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                               <textarea name="title" id="title" cols="30" rows="10" class="form-control">{{ $offers->title }}</textarea>
                                              </div>
                                            </div>



                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Price <span class="text-danger">*</span></label>
                                               <input type="number" class="form-control" id="price" name="price" value="{{ $offers->price }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service 1 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="service1" name="service1" value="{{ $offers->service1 }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon 1 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="icon1" name="icon1"value="{{ $offers->icon1 }}">
                                              </div>
                                            </div>



                                             


                                               <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service 2 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="service2" name="service2" value="{{ $offers->service2 }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon 2 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="icon2" name="icon2" value="{{ $offers->icon2 }}">
                                              </div>
                                            </div>





                                               <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service 3 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="service3" name="service3" value="{{ $offers->service3 }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon 3 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="icon3" name="icon3" value="{{ $offers->icon3 }}">
                                              </div>
                                            </div>




                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service 4 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="service4" name="service4" value="{{ $offers->service4 }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon 4 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="icon4" name="icon4" value="{{ $offers->icon4 }}">
                                              </div>
                                            </div>




                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service 5 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="service5" name="service5" value="{{ $offers->service5 }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon 5 <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="icon5" name="icon5" value="{{ $offers->icon5 }}">
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
                                        @if(empty($offers->image))
                                        <img src="{{ asset('public/uploads/default/cat_image.png') }}" class="avatar avatar-xxl brround" alt="" id="one">
                                         @else
                                         <img src="{{ asset('public/uploads/offer/'.$offers->image) }}" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @endif
                                    </div>
                                                </div>
                                        


                                          
                                            </div>

                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="btn-list">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="status" id="btnradio1" autocomplete="off" checked="" value="1" @if($offers->status == 1) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio1">Active</label>

                                                <input type="radio" class="btn-check" name="status" id="btnradio2" autocomplete="off" value="0"  @if($offers->status == 0) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio2">In- Active</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div>




                                                 <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Featured</label>
                                                    <div class="btn-list">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="featured" id="btnradio3" autocomplete="off" checked="" value="1" @if($offers->featured == 1) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio3">Yes</label>

                                                <input type="radio" class="btn-check" name="featured" id="btnradio4" autocomplete="off" value="0"  @if($offers->featured == 0) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio4">No</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Field 1 <span class="text-danger">*</span></label>
                                               <textarea name="field1" id="field1" cols="30" rows="10" class="form-control">{{ $offers->field1 }}</textarea>
                                                </div>
                                            </div>



                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Field 2 <span class="text-danger">*</span></label>
                                               <textarea name="field2" id="field2" cols="30" rows="10" class="form-control">{{ $offers->field2 }}</textarea>
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



 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('title', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


    <script type="text/javascript">
        CKEDITOR.replace('field1', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


    <script type="text/javascript">
        CKEDITOR.replace('field2', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>





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
        

