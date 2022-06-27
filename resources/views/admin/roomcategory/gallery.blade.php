@extends('admin.includes.admin_design')


@section('title') Add  Room Category Gallery  - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                         <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Room Category Gallery</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('roomcategory.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Room Category Gallery </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <div class="row">
                            @include('admin.includes.message')
                            <div class="col-xl-3 col-lg-4">
                                <div class="card box-widget widget-user">
                                    <div class=""><img alt="User Avatar" src="{{ asset('public/uploads/roomcategory/'.$category->image) }}"></div>
                                    <div class="card-body text-center pt-2">
                                        <div class="pro-user">
                                            <h3 class="pro-user-username  mb-1 fs-22">{{$category->name}}</h3>

                                             <a href="{{ route('roomcategory.edit', $category->id) }}" class="btn btn-success mt-3"><i class="fa fa-pencil"></i>Edit</a>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Edit Profile</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="control-group">
                                   <div class="field_wrapper">
                                        <div>


                                            <form action="{{ route('roomGallery', $category->id) }}" method="post" enctype="multipart/form-data">
                                              @csrf

                                            <input type="hidden" name="category_id" value="{{ $category->id }}">


<!-- 
                                            <div class="form-group mb-0">
                                            <input id="demo" type="file" name="image[]" accept=".jpg, .png, image/jpeg, image/png" multiple="" class="ff_fileupload_hidden"><table class="ff_fileupload_uploads"></table>
                                        </div> -->



                                <div class="control-group">
                                    <label for="image">Upload Images</label>
                                    <div class="controls">
                                        <input type="file" name="image[]" id="image" class="form-control" multiple="multiple">
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
                            </div>

                            </form>






                            <!-- Row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Gallery Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">SN</th>
                                                        <th class="wd-10p border-bottom-0">Images</th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                   @foreach($gallery as $image)

                                                   
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        
                                                            <td>
                                                  <img src="{{ asset('public/uploads/roomcategory/gallery/'.$image->image) }}" alt="" width="100">
                                              </td>
                                                        


                                                        <td>


                                                        

                                          

                                              <a class="btn btn-danger btn-sm deleteRecord" style="color: white" href="javascript:"  rel="{{ $image->id }}" rel1="delete-image">
                                               <i class="fa fa-trash"></i>
                                           </a>
                                          
                                           <!-- <button class="btn btn-alert btn-sm">
                                               <i class="fa fa-times"></i>
                                           </button> -->
                                          


                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                                



                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--/div-->

                               
                               


                                
                            </div>
                        </div>
                        <!-- /Row -->


                        



                    



























                        </div>


                    </div>
                </div>
                <!-- CONTAINER END -->
            </div>

          
@endsection

@section('js')
    

    <!-- Sweetalert js -->
         <script src="{{ asset('public/assets/admin/assets/js/sweetalert.min.js')}}"></script>
        <script src="{{ asset('public/assets/admin/assets/js/jquery.sweet-alert.custom.js')}}"></script>


     <script>
        $(".deleteRecord").click(function () {
            var SITEURL = '{{ URL::to('') }}';
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure? ",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!"
                },
                function () {
                    window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
                });
        });
    </script>






    @endsection
        

