@extends('admin.includes.admin_design')


@section('title') Add Staffs - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Staffs</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('admin.index') }}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Staffs </button></a>


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

                         @include('admin.includes.message')

                        

                        <!-- Row -->
                       <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">User Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                                           @csrf
                                           
                                           <div class="col-md-4">
                                              <label for="validationCustom01" class="form-label">First name</label>
                                              <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="{{ old('fname') }}">
                                              <div class="valid-feedback">
                                                Looks good!
                                              </div>
                                            </div>


                                           <div class="col-md-4">
                                              <label for="validationCustom02" class="form-label">Last name</label>
                                              <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="{{ old('lname') }}">
                                              <div class="valid-feedback">
                                                Looks good!
                                              </div>
                                            </div>


                                             <div class="col-md-4">
                                              <label for="validationCustom02" class="form-label">Email Address</label>
                                             <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                              <div class="valid-feedback">
                                                Looks good!
                                              </div>
                                            </div>


                                           
                                            <div class="col-md-6">
                                              <label for="validationCustom03" class="form-label">Phone Number</label>
                                              <input type="number" id="phone" name="phone" class="form-control" placeholder="Number" value="">
                                              <div class="invalid-feedback">
                                                Please provide a valid city.
                                              </div>
                                            </div>


                                            <div class="col-md-6">
                                              <label for="validationCustom04" class="form-label">Address</label>
                                              <input type="text" id="address" name="address" class="form-control" placeholder="Home Address" value="{{ old('address') }}">
                                              <div class="invalid-feedback">
                                                Please select a Address
                                              </div>
                                            </div>



                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label class="form-label">Profile Picture</label>
                                                <input class="form-control" type="file" name="image" id="image"accept="image/*" onchange="readURL(this);">

                                                <img src="" width="100px" id="one">

                                            </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About Me</label>
                                                    <textarea rows="5" class="form-control" placeholder="Enter About your description" id="about" name="about">{{ old('about') }}</textarea>
                                                </div>
                                            </div>


                                            <div class="card-header">
                                        <h3 class="card-title">Conform Password</h3>
                                    </div>

                                    <div class="col-md-6">
                                             <label class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                            <div class="col-md-6">
                                              <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                            </div>






                                    <div class="card-header">
                                        <h3 class="card-title">Roles & Permission</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate="">


                                            <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover card-table table-vcenter text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Module Permission</th>
                                                        <th>Create</th>
                                                        <th>Read</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Post</th>

                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input  type="checkbox"  class="colorinput-input" checked=""  name="post_c">
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>


                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input  type="checkbox"  class="colorinput-input" checked="" name="post_r">
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>



                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input type="checkbox"  class="colorinput-input" checked=""  name="post_u">
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>


                                                        <td><div class="col-auto">
                                                            <label class="colorinput">
                                                                <input  type="checkbox"  class="colorinput-input" checked=""  name="post_d">
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div></td>

                                                    </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                

                                           <div class="card-footer text-end">
                                        <button class="btn  btn-success">Updated</button>
                                        <a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
                                    </div>
                                    </div>
                                </div>






                                        </form>

                                           
                                          
                                    </div>
                                </div>
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
        

