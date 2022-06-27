@extends('admin.includes.admin_design')

@section('title') Edit Profile - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')


                <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Edit Profile</h4>
                            </div>
                          
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="card box-widget widget-user">
                                    <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="{{ asset('public/uploads/admin/'.$admin->image) }}"  id="one"></div>
                                    <div class="card-body text-center pt-2">
                                        <br>
                                        <div class="pro-user">
                                            <h3 class="pro-user-username  mb-1 fs-22">{{$admin->fname}}</h3>
                                            <h6 class="pro-user-desc text-muted">{{$admin->lname}}</h6>
                                           
                                        </div>
                                    </div>
                                  
                                </div>


                                <form method="post" action="{{ route('updatePassword', $admin->id ) }}" enctype="multipart/form-data">
                                 @csrf

                                    <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Edit Password</div>
                                    </div>
                                    <div class="card-body">
                                      

                                         <div class="form-group">
                                            <label class="form-label">Old Password</label>
                                             <input class="form-control" type="password" id="current_password" name="current_password">
                                         <p id="correct_password"></p>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password">
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="pass" name="confirm_password">
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-success">Updated</button>
                                    </div>
                                </div>
                                    
                                </form>
                                
                            </div>

                            <div class="col-xl-9 col-lg-8">

@include('admin.includes.message')


                       


                                <form action="{{route('updateProfile',$admin->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Edit Profile</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Basic info:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="{{$admin->fname}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="{{$admin->lname}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email address</label>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$admin->email}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Number" value="{{$admin->phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Home Address" value="{{$admin->address}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">City</label>
                                                    <input type="text" id="city" name="city" class="form-control" placeholder="City" value="{{$admin->city}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="number" id="zip" name="zip" class="form-control" placeholder="{{$admin->zip}}">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" id="country" name="country" class="form-control" placeholder="{{$admin->country}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Profile Picture</label>
                                                <input class="form-control" type="file" name="image" id="image"accept="image/*" onchange="readURL(this);">

                                            </div>



                                        </div>
                                        <div class="card-title font-weight-bold mt-5">External Links:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Facebook</label>
                                                    <input type="text" id="facebook" name="facebook" class="form-control" placeholder="https://www.facebook.com/" value="{{$admin->facebook}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Instagram</label>
                                                    <input type="text" id="instagram" name="instagram" class="form-control" placeholder="https://www.instagram.com/" value="{{$admin->instagram}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Twitter</label>
                                                    <input type="text" id="twitter" name="twitter" class="form-control" placeholder="https://twitter.com/" value="{{$admin->twitter}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Linkedin</label>
                                                    <input type="text" class="form-control" placeholder="https://in.pinterest.com/" id="linkedin" name="linkedin" value="{{$admin->linkedin}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title font-weight-bold mt-5">About:</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About Me</label>
                                                    <textarea rows="5" class="form-control" placeholder="Enter About your description" id="about" name="about">{{$admin->about}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn  btn-success">Updated</button>
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



    @section('js')
    <script>
          $("#current_password").keyup(function (){
              var current_password = $("#current_password").val();
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                  },
                  type: 'post',
                  url: '{{ route('chkUserPassword') }}',
                  data: {
                      current_password:current_password
                  },
                  success: function (resp){
                      if(resp=="true"){
                          $("#correct_password").text("Current password matches").css("color", "green");
                      } else if (resp == "false"){
                          $("#correct_password").text("Password does not matches").css("color", "red");

                      }
                  }, error: function (resp){
                      alert("Error");
                  }

              });
          });
    </script>
@endsection



 