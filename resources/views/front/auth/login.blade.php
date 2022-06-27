
<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<!-- Mirrored from laravel.spruko.com/azea/ltr/login2 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Sep 2021 02:09:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="Azea – Laravel Admin & Dashboard Template" name="description">
        <meta content="Spruko Private Limited" name="author">
        <meta name="keywords" content="laravel ui admin template, laravel admin template, laravel dashboard template,laravel ui template, laravel ui, livewire, laravel, laravel admin panel, laravel admin panel template, laravel blade, laravel bootstrap5, bootstrap admin template, admin, dashboard, admin template">

        <!-- Title -->
        <title> Login -{{$theme->site_title}}</title>

        <!--Favicon -->
        <link rel="icon" href="{{ asset('public/assets/admin/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

        <!--Bootstrap css -->
        <link href="{{ asset('public/assets/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Style css -->
        <link href="{{ asset('public/assets/admin/assets/css/style.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/assets/admin/assets/css/dark.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/assets/admin/assets/css/skin-modes.css')}}" rel="stylesheet" />

        <!-- Animate css -->
        <link href="{{ asset('public/assets/admin/assets/css/animated.css')}}" rel="stylesheet" />

        <!---Icons css-->
        <link href="{{ asset('public/assets/admin/assets/plugins/icons/icons.css')}}" rel="stylesheet" />

        

        <!-- Color Skin css -->
        <link id="theme" href="{{ asset('public/assets/admin/assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>



    </head>

   <body class="h-100vh error-bg">

    
        <div class="register-2">


        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('public/assets/admin/assets/images/svgs/loader.svg')}}" alt="loader">
        </div>
        <!-- End GLOBAL-LOADER -->


         @include('admin.includes.message')



       

            
        <div class="page">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-xl-4">
                                    <div class="text-center mb-6">
                                        <img src="{{ asset('public/assets/admin/assets/images/brand/logo1.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <h1 class="mb-2">Login</h1>
                                                <a href="javascript:void(0);" class="">Welcome Back!</a>
                                            </div>
                                            <form class="mt-5" action="{{route('loginUser')}}" method="post">
                                                @if(Session::get('fail'))
                                                    <div class="alert alert-danger">
                                                        {{Session::get('fail')}}
                                                    </div>
                                                
                                                @endif
                                                @csrf

                                                <!-- <div class="input-group mb-4">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div> -->

                                                <div class="input-group mb-4">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-mail"></i>
                                                        </div>
                                                    <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                                                </div>

                                                <div class="input-group mb-4">
                                                    <div class="input-group" id="Password-toggle">
                                                         <a href="#" class="input-group-text">
                                                        <i class="fe fe-eye" aria-hidden="true"></i>
                                                    </a>
                                                        <input class="form-control" type="password" placeholder="Password" id="password" name="password">
                                                    </div>
                                                </div>

                                               <!--  <div class="input-group mb-4">
                                                    <div class="input-group" id="Password-toggle1">
                                                        <a href="#" class="input-group-text">
                                                        <i class="fe fe-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="form-control" type="password" placeholder="Confirm Password">
                                                    </div>
                                                </div> -->

                                                <!-- <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">I Agree For<a href="javascript:void(0);" class="font-weight-bold">  Terms & Conditions.</a></span>
                                                    </label>
                                                </div> -->

                                                <div class="form-group text-center mb-3">
                                                    <button class="btn btn-primary btn-lg w-100 br-7">Sign In</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="text-center register-icons">
                                        <div class="small text-white mb-4">Register using with</div>



                                       <a href="{{route('login.google')}}"><button class="btn bg-white-50  text-white-50 font-weight-semibold w-12 google me-2" type="button"><i class="fa fa-google"></i></button></a> 

                                        <a href="{{route('login.facebook')}}"><button class="btn bg-white-50  text-white-50 font-weight-semibold  w-12 facebook me-2" type="button"><i class="fa fa-facebook-f"></i></button></a>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Jquery js-->
        <script src="{{ asset('public/assets/admin/assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap5 js-->
        <script src="{{ asset('public/assets/admin/assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('public/assets/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!--Othercharts js-->
        <script src="{{ asset('public/assets/admin/assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

        <!-- Circle-progress js-->
        <script src="{{ asset('public/assets/admin/assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

        <!-- Jquery-rating js-->
        <script src="{{ asset('public/assets/admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

        <!-- Show Password -->
        <script src="{{ asset('public/assets/admin/assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js')}}"></script>

        

        <!-- Custom js-->
        <script src="{{ asset('public/assets/admin/assets/js/custom.js')}}"></script>
    </div>

    </body>

<!-- Mirrored from laravel.spruko.com/azea/ltr/login2 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Sep 2021 02:09:26 GMT -->
</html>
