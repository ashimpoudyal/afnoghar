@extends('admin.includes.admin_design')


@section('title') Frontend Setting - {{ config('app.name', 'Laravel') }}   @endsection


<!-- from website website the code is available there
https://www.tutorialrepublic.com/codelab.php?topic=faq&file=bootstrap-keep-last-selected-tab-active-on-page-refresh -->



<!-- code -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Keep Last Selected Bootstrap Tab Active on Page Refresh</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
<style>
    .bs-example{
        margin: 20px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a href="#sectionA" class="nav-link active" data-toggle="tab">Section A</a>
        </li>
        <li class="nav-item">
            <a href="#sectionB" class="nav-link" data-toggle="tab">Section B</a>
        </li>
        <li class="nav-item">
            <a href="#sectionC" class="nav-link" data-toggle="tab">Section C</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade show active">
            <h3>Section A</h3>
            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
        </div>
        <div id="sectionB" class="tab-pane fade">
            <h3>Section B</h3>
            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
        </div>
        <div id="sectionC" class="tab-pane fade">
            <h3>Section C</h3>
            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
        </div>
    </div>
</div>
</body>
</html>
 -->


@section('js')

   <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('about', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
<style>
    .bs-example{
        margin: 20px;
    }
</style>

@endsection

<br>




@section('content')

 <div class="app-content main-content">
                    <div class="side-app">

                        


                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">
                                @include('admin.includes.message')


                                



                        




                                <div class="card" >
                                    <div class="card-header">
                                        <h3 class="card-title">Frontend Setting</h3>
                                    </div>







    <div class="container">
        <div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a href="#sectionA" class="nav-link active" data-toggle="tab">Basic Setting</a>
        </li>
        <li class="nav-item">
            <a href="#sectionB" class="nav-link" data-toggle="tab">About Us</a>
        </li>
        <li class="nav-item">
            <a href="#sectionC" class="nav-link" data-toggle="tab">Contact Us</a>
        </li>
        <!--  <li class="nav-item">
            <a href="#sectionD" class="nav-link" data-toggle="tab">Section D</a>
        </li> -->
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade show active">
            <br>

            <form method="post" action="{{ route('themeUpdate', $theme->id) }}" enctype="multipart/form-data">
                                                         @csrf

                                                            <div class="card">
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Details</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Company Name</label>
                                                    <input type="text" name="site_title" id="site_title" class="form-control" placeholder="Company Name" value="{{ $theme->site_title }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Site Subtitle</label>
                                                    <input type="text" id="site_subtitle" name="site_subtitle" class="form-control" placeholder="Enter Subtitle" value="{{ $theme->site_subtitle }}">
                                                </div>
                                            </div>
                                            
                                            
                                            

                                            

                                            <div class="form-group row">
                            <label class="form-label">Logo</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="file" id="logo" name="logo" accept="image/*" onchange="readURL(this);">
                            </div>
                            <div class="col-lg-2">
                                <div class="img-thumbnail float-right">
                                    <img src="{{ asset('public/uploads/theme'.$theme->logo) }}" alt="" width="100" height="40" id="one">
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="form-label">Favicon</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="file" id="favicon" name="favicon" accept="image/*" onchange="readURL2(this);">

                            </div>
                            <div class="col-lg-2">
                                <div class="settings-image img-thumbnail float-right"><img src="{{ asset('public/uploads/theme'.$theme->favicon) }}" class="img-fluid" width="16" height="16" alt="" id="two"></div>
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
        <div id="sectionB" class="tab-pane fade">
            <br>

            <form method="post" action="{{ route('aboutus', $theme->id) }}" enctype="multipart/form-data">
                                                         @csrf

                                                            <div class="card">
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Details</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About Us Section</label>

                                                    <textarea rows="5" class="form-control" placeholder="Enter About your description" id="about" name="about">{{$theme->about}}</textarea>
                                                </div>


                                                <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Video URL</label>
                                                    <input type="text" name="video" id="video" class="form-control" placeholder="Your Video URL Here" value="{{ $theme->video }}">
                                                </div>
                                            </div>







                                            </div>
                                            
                                            
                                            

                                            

                                            <div class="form-group row">
                            <label class="form-label">About Us Image</label>
                            <div class="col-lg-7">
                                <input class="form-control" type="file" id="aboutimage" name="aboutimage" accept="image/*" onchange="readURL3(this);">
                            </div>
                            <div class="col-lg-2">
                                <div class="img-thumbnail float-right">
                                    <img src="{{ asset('public/uploads/theme'.$theme->aboutimage) }}" alt="" width="100" height="40" id="three">
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




        <div id="sectionC" class="tab-pane fade">

            <br>

            <form method="post" action="{{ route('contactus', $theme->id) }}" enctype="multipart/form-data">
                                                         @csrf

                                                            <div class="card">
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Details</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>

                                                   <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter Phone Numner" value="{{$theme->phone}}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>

                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{$theme->email}}">
                                                </div>
                                            </div>

                                             <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>

                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Company Address" value="{{$theme->address}}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Facebook</label>

                                                    <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Your Facebook Name" value="{{$theme->facebook}}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Instagram</label>

                                                    <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Your Instagram Name" value="{{$theme->instagram}}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Youtube</label>

                                                    <input type="text" id="youtube" name="youtube" class="form-control" placeholder="Your Youtube Channel Name" value="{{$theme->youtube}}">
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
        <!-- <div id="sectionD" class="tab-pane fade">
            <h3>Section C</h3>
            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
        </div> -->
    </div>
</div>
    </div>
</div>
</div>
</div>
</div>
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

    <script>
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


     <script>
        function readURL3(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



   





@endsection












