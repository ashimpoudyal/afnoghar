@extends('admin.includes.admin_design')


@section('title') Add Partner - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Partner</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('partner.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Partners </button></a>


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


                       
                                <form action="{{route('updatePartner',$partners->id)}}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Partner Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Partner Name <span class="text-danger">*</span></label>
                                                 <input type="text" class="form-control" id="name" name="name" value="{{$partners->name}}">
                                                </div>
                                            </div>


                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Image</label>
                                                <input class="form-control" type="file" name="image" id="image"accept="image/*" onchange="readURL(this);">

                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                    <div class="card-body text-center">
                                         @if(empty($partners->image))
                                        <img src="{{ asset('public/uploads/default/cat_image.png') }}" class="avatar avatar-xxl brround" alt="" id="one">
                                         @else
                                         <img src="{{ asset('public/uploads/partner/'.$partners->image) }}" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @endif
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
        

