@extends('admin.includes.admin_design')


@section('title') Add Room - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Room</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('room.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Room </button></a>


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


                       
                               <form action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Add Room </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Details:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                   <div class="form-group">
                                                    <label class="form-label">Under Category<span class="text-danger">*</span></label>
                                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="category_id" name="category_id">
                                                        <optgroup label="BlogCategory">
                                                             @php echo  $categories_dropdown @endphp
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                    
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Room Name <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="post_title" name="post_title" value="{{ old('post_title') }}">
                                              </div>
                                            </div>


                                             <div class="col-sm-6 col-md-4">
                                    <div class="form-group" style="margin-top: 10px">
                                             <div class="form-group">
                                                <label class="form-label">Profile Picture</label>
                                                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="readURL(this);">
                                            </div>
                                            </div>
                                        </div>


                                             <div class="col-sm-6 col-md-8">
                                                    <div class="card-body text-center">
                                        <img src="https://via.placeholder.com/300x200?text=Thumbnail+Image" alt="" id="one" class="avatar avatar-xxl brround" alt="" >
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
                                                <label class="btn btn-outline-primary" for="btnradio2">In Active</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Content <span class="text-danger">*</span></label>
                                               <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control">{{ old('post_content') }}</textarea>
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Ammeties</label>
                                                    <textarea name="ammeties" id="ammeties" cols="30" rows="10" class="form-control">{{ old('ammeties') }}</textarea>
                                                </div>
                                                </div>


                                                <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Previous Price <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="cp" name="cp" value="{{ old('cp') }}">
                                              </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Current Price <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="sp" name="sp" value="{{ old('sp') }}">
                                              </div>
                                            </div>




                                                 <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Room Type <span class="text-danger">*</span></label>
                                              <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="type" name="type">
                                                        <optgroup >
                                                             <option value="Hot">Hot</option>
                                                             <option value="New">New</option>
                                                             <option value="Featured">Featured</option>
                                                        </optgroup>
                                                    </select>
                                              </div>
                                            </div>


                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Rating <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating') }}">
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
        CKEDITOR.replace('post_content', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>



      <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ammeties', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>




    @endsection
        

