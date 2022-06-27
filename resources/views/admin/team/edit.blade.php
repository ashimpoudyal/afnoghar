@extends('admin.includes.admin_design')


@section('title') Edit Team  - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Edit Team </h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('team.index') }}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View Team  </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                                <form action="{{route('updateTeam', $team->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Team Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"> Name</label>
                                                   <input type="text" class="form-control" name="name" id="name" value="{{ $team->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Position</label>
                                                     <input type="text" class="form-control" name="post" id="post" value="{{ $team->post }}">
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
                                        @if(empty($team->image))
                                        <img src="{{ asset('public/uploads/default/cat_image.png') }}" class="avatar avatar-xxl brround" alt="" id="one">
                                         @else
                                         <img src="{{ asset('public/uploads/team/'.$team->image) }}" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @endif
                                    </div>
                                                </div>
                                            


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Introduction</label>
                                                    <textarea name="intro" id="intro" cols="30" rows="10" class="form-control">{{ $team->intro }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label"> Facebook</label>
                                                   <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $team->facebook }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label"> Instagram</label>
                                                   <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $team->instagram }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label"> Linkedin</label>
                                                   <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $team->linkedin }}">
                                                </div>
                                            </div>

                                        </div>


                                          <div class="card-header">
                                        <h3 class="card-title">Select Your Department Branch</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate="">


                                            <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover card-table table-vcenter text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Department Name</th>
                                                        <th>Department-1</th>
                                                        <th>Department-2</th>
                                                        <th>Department-3</th>
                                                        <th>Department-4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Action</th>

                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input  type="checkbox"  class="colorinput-input"  name="depart1" @if($team->depart1 == 1) checked @endif>
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>


                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input  type="checkbox"  class="colorinput-input"  name="depart2" @if($team->depart2 == 1) checked @endif>
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>



                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input type="checkbox"  class="colorinput-input"  name="depart3" @if($team->depart3 == 1) checked @endif>
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>


                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input  type="checkbox"  class="colorinput-input"  name="depart4" @if($team->depart4 == 1) checked @endif>
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>

                                                    </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                

                









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
        CKEDITOR.replace('intro', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


    @endsection
        

