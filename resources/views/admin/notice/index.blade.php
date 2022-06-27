@extends('admin.includes.admin_design')


@section('title') Notices - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



<div class="app-content main-content">
                    <div class="side-app">

                        
                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">All Notices</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('notice.add')}}"><button class="btn btn-outline-primary"><i class="fe fe-download"></i>
                                       Add Notice </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->





 @include('admin.includes.message')

<!-- Row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Basic DataTable</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">SN</th>
                                                        <th class="wd-15p border-bottom-0">Title</th>
                                                        <th class="wd-10p border-bottom-0">Status</th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($notices as $notice)

                                                   
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{$notice->title}}</td>


                                                        <td>
                                                           @if($notice->status == 1)
                                                           <span class="badge bg-success" style="color: white;">Active</span>
                                                       @else
                                                           <span class="badge bg-danger" style="color: white;">In Active</span>
                                                       @endif
                                                        </td>



                                                        <td>


                                                            <!-- <a href="">
                                           <button class="btn btn-warning btn-sm" >
                                               <i class="fa fa-eye"></i>
                                           </button>
                                           </a> -->
                                                            
                                                        
                                           <a href="{{ route('editNotice', $notice->id) }}">
                                           <button class="btn btn-success btn-sm">
                                               <i class="fa fa-pencil"></i>
                                           </button>
                                           </a>
                                          


                                          

                                               <a class="btn btn-danger btn-sm deleteRecord" style="color: white" href="javascript:" rel="{{ $notice->id }}" rel1="delete-notice">
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