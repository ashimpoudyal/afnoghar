@extends('admin.includes.admin_design')


@section('title') Our Services - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



<div class="app-content main-content">
                    <div class="side-app">

                        
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">All Service</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('service.add') }}"><button class="btn btn-outline-primary"><i class="fe fe-download"></i>
                                       Add Service  </button></a>
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
                                        <div class="card-title">Team Table</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                      <th class="wd-15p border-bottom-0">SN</th>
                                                      <th class="wd-15p border-bottom-0">Image</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-10p border-bottom-0">Description</th>
                                                        <th>Icon</th>
                                                        
                                                        
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($services as $service)

                                                   
                                                    <tr>
                                                      <td>{{ $loop->index + 1 }}</td>
                                                       <td>
                                                <img src="{{ asset('public/uploads/service/'.$service->image) }}" alt="" width="50">
                                            </td>
                                                        <td>{{$service->name}}</td>
                                                        <td>
                                                          {{$service->description}}
                                                        </td>
                                                         <td>{{ $service->icon }}</td>
                                                        


                                                  


                                                        <td>


                                                            <!-- <a href="">
                                           <button class="btn btn-warning btn-sm" >
                                               <i class="fa fa-eye"></i>
                                           </button>
                                           </a> -->
                                                            
                                                        <a href="{{ route('editService', $service->id) }}">
                                           <button class="btn btn-success btn-sm">
                                               <i class="fa fa-pencil"></i>
                                           </button>
                                           </a>


                                          

                                               <a class="btn btn-danger btn-sm deleteRecord" style="color: white" href="javascript:" rel="{{ $service->id }}" rel1="delete-service">
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