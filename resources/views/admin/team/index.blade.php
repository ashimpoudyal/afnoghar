@extends('admin.includes.admin_design')


@section('title') Our Team - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



<div class="app-content main-content">
                    <div class="side-app">

                        
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">All Team</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('team.add') }}"><button class="btn btn-outline-primary"><i class="fe fe-download"></i>
                                       Add Team  </button></a>
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
                                                        <th class="wd-10p border-bottom-0">Designation</th>
                                                        <th>Introduction</th>
                                                        <th>Department</th>
                                                        
                                                        
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($teams as $team)

                                                   
                                                    <tr>
                                                      <td>{{ $loop->index + 1 }}</td>
                                                       <td>
                                                <img src="{{ asset('public/uploads/team/'.$team->image) }}" alt="" width="50">
                                            </td>
                                                        <td>{{$team->name}}</td>
                                                        <td>
                                                          {{$team->post}}
                                                        </td>
                                                         <td>{{ $team->intro }}</td>



                                                          <td>
                                                           @if($team->depart1 == 1)
                                                           <span class="badge bg-success" style="color: white;">Department 1</span>
                                                       @else
                                                       @endif
                                                       

                                                       @if($team->depart2 == 1)
                                                           <span class="badge bg-success" style="color: white;">Department 2</span>
                                                       @else
                                                       @endif

                                                      

                                                       @if($team->depart3 == 1)
                                                           <span class="badge bg-success" style="color: white;">Department 3</span>
                                                       @else
                                                       @endif

                                                      

                                                       @if($team->depart4 == 1)
                                                           <span class="badge bg-success" style="color: white;">Department 4</span>
                                                       @else
                                                       @endif


                                                        </td>
                                                        


                                                  


                                                        <td>


                                                            <!-- <a href="">
                                           <button class="btn btn-warning btn-sm" >
                                               <i class="fa fa-eye"></i>
                                           </button>
                                           </a> -->
                                                            
                                                        <a href="{{ route('editTeam', $team->id) }}">
                                           <button class="btn btn-success btn-sm">
                                               <i class="fa fa-pencil"></i>
                                           </button>
                                           </a>


                                          

                                               
                                               
                                               <a class="btn btn-danger btn-sm deleteRecord" style="color: white" href="javascript:" rel="{{ $team->id }}" rel1="delete-team">
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