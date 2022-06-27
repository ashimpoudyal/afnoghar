<head>

        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="Global Studio-Dashboard" name="description">
        <meta content="Spruko Private Limited" name="Roopesh Ghimire">
        <meta name="keywords" content="This is a multipurpose tempate made with bootstrap 5 by Roopesg Ghimire">
         <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>@yield('title')</title>

        <!--Favicon -->
        <link rel="icon" href="{{ asset('public/uploads/theme'.$theme->favicon) }}" type="image/x-icon"/>

        <!--Bootstrap css -->
        <link href="{{ asset('public/assets/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Style css -->
        <link href="{{ asset('public/assets/admin/assets/css/style.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/assets/admin/assets/css/dark.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/assets/admin/assets/css/skin-modes.css')}}" rel="stylesheet" />

        <!-- Animate css -->
        <link href="{{ asset('public/assets/admin/assets/css/animated.css')}}" rel="stylesheet" />

        <!--Sidemenu css -->
       <link href="{{ asset('public/assets/admin/assets/css/sidemenu.css')}}" rel="stylesheet">

        <!-- P-scroll bar css-->
        <link href="{{ asset('public/assets/admin/assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

        <!---Icons css-->
        <link href="{{ asset('public/assets/admin/assets/plugins/icons/icons.css')}}" rel="stylesheet" />

        
        <!-- Simplebar css -->
        <link rel="{{ asset('public/assets/admin/stylesheet" href="assets/plugins/simplebar/css/simplebar.css')}}">

        <!-- INTERNAL Morris Charts css -->
        <link href="{{ asset('public/assets/admin/assets/plugins/morris/morris.css')}}" rel="stylesheet" />

        <!-- INTERNAL Select2 css -->
        <link href="{{ asset('public/assets/admin/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

        <!-- Data table css -->
        <link href="{{ asset('public/assets/admin/assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
        <link href="{{ asset('public/assets/admin/assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')}}"  rel="stylesheet">
        <link href="{{ asset('public/assets/admin/assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />

        <!-- Sweet Alert -->
         <link href="{{ asset('public/assets/admin/assets/css/sweetalert.css')}}" rel="stylesheet" />

          <!-- multiple select tag css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


        <!-- multiple image upload css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/basic.css" />



        <!-- INTERNAL File Uploads css -->
        <link href="{{ asset('public/assets/admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />







  @yield('cs')


        <!-- Color Skin css -->
        <link id="theme" href="{{ asset('public/assets/admin/assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>

        <!-- INTERNAL Switcher css -->
        <link href="{{ asset('public/assets/admin/assets/switcher/css/switcher.css')}}" rel="stylesheet"/>
        <link href="{{ asset('public/assets/admin/assets/switcher/demo.css')}}" rel="stylesheet"/>


          @yield('share')



      
    </head>