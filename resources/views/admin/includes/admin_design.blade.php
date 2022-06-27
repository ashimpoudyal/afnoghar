
 <!DOCTYPE html>
<html lang="en" dir="ltr">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('admin.includes.head')


    <body class="app sidebar-mini">

        <!---Global-loader-->
        <div id="global-loader" >
            <img src="{{ asset('public/assets/admin/assets/images/svgs/loader.svg')}}" alt="loader">
        </div>
        <!--- End Global-loader-->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

            <!--aside open-->
                @include('admin.includes.sidebar')
                <!--aside closed-->


            <!--app header-->
                        @include('admin.includes.header')
                        <!--/app header-->


                <!--app-content open-->
                @yield('content')
                <!-- CONTAINER END -->
            </div>

            <!--Footer-->
            @include('admin.includes.footer')
            <!-- End Footer-->
            
        </div>
@include('admin.includes.js')
        
    </body>


</html>

