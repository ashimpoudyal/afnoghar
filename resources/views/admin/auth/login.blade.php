<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="Azea – Laravel Admin & Dashboard Template" name="description">
        <meta content="Spruko Private Limited" name="author">
        <meta name="keywords" content="laravel ui admin template, laravel admin template, laravel dashboard template,laravel ui template, laravel ui, livewire, laravel, laravel admin panel, laravel admin panel template, laravel blade, laravel bootstrap5, bootstrap admin template, admin, dashboard, admin template">

        <!-- Title -->
        <title>Admin Login -{{ config('app.name', 'Laravel') }}</title>

        <!--Favicon -->
        <link rel="icon" href="{{ asset('public/assets/admin/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

        <!--Bootstrap css -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

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

    
        <div class="register1">


        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('public/assets/admin/assets/images/svgs/loader.svg')}}" alt="loader">
        </div>
        <!-- End GLOBAL-LOADER -->



 @include('admin.includes.message')
            
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-xl-7 col-lg-12">
                                    <div class="row p-0 m-0">
                                        <div class="col-lg-6 p-0">
                                            <div class="text-justified text-white p-5 register-1 overflow-hidden">
                                                <div class="custom-content">
                                                    <div class="mb-5 br-7">
                                                        <img src="{{ asset('public/assets/admin/assets/images/brand/logo1.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                                    </div>
                                                    <div class="ms-5">
                                                        <div class="fs-18 mb-6 font-weight-bold text-white">Welcome Back To Azea !</div>
                                                        <div class="mb-6 text-white-50">
                                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem et esse in velit deleniti facilis quo!
                                                        </div>
                                                        <h6 class="text-white-50">Don't Have an Account?</h6>
                                                        <a href="register1.html" class="btn btn-white text-primary text-transparent font-weight-bold ">Create Here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                                        <div class="bg-white text-dark br-7 br-tl-0 br-bl-0">
                                            <div class="card-body">
                                                <div class="text-center mb-3">
                                                    <h1 class="mb-2">Log In</h1>
                                                    <a href="javascript:void(0);" class="">Hello There !</a>
                                                </div>

                                               

                                                <form class="mt-5" action="{{route('adminLogin')}}" method="post">
                                                    @csrf

                                                    <div class="input-group mb-4">
                                                            <div class="input-group-text">
                                                                <i class="fe fe-user"></i>
                                                            </div>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                                    </div>

                                                    <div class="input-group mb-4">
                                                        <div class="input-group" id="Password-toggle">
                                                            <a href="#" class="input-group-text">
                                                            <i class="fe fe-eye" aria-hidden="true"></i>
                                                            </a>
                                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" />
                                                            <span class="custom-control-label">Remember Me</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group text-center mb-3">
                                                        <button class="btn btn-primary btn-lg w-100 br-7">Log In</button>
                                                    </div>
                                                    <div class="form-group fs-13 text-center">
                                                        Forget Password ?
                                                    </div>
                                                    <div class="form-group fs-14 text-center font-weight-bold">
                                                        <a href="javascript:void(0);">Click Here To Backup Mail</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
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


</html>
