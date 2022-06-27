@extends('admin.includes.admin_design')


@section('title') Add Blog Category - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Blog Category</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('blogcategory.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Blog Category </button></a>


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


                       
                                <form action="{{route('blogcategory.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Blog Category Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Category Name</label>
                                                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name" value="{{ old('category_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Under Category</label>
                                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="parent_id" name="parent_id">
                                                        <option selected disabled>Select Category</option>
                                                    <option value="0">Main Category</option>
                                                    @foreach($blogcategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Priority Order</label>
                                                    <input type="number" id="order" name="order" class="form-control" placeholder="Priority Order" value="{{ old('order') }}">
                                                </div>
                                            </div>
                                           

                                            <div class="col-sm-6 col-md-6">
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
                                            </div>

                                        

                                            
                                            </div>


                                           
                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn  btn-success">Updated</button>
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
        

