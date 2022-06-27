@extends('admin.includes.admin_design')


@section('title') Menu Categories - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



<div class="app-content main-content">
                    <div class="side-app">

                        
                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">All Menu Categories</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('menucategory.add')}}"><button class="btn btn-outline-primary"><i class="fe fe-download"></i>
                                       Add Category </button></a>


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
                                                        <th class="wd-15p border-bottom-0">Category Name</th>
                                                        <th class="wd-10p border-bottom-0">Under Category</th>
                                                        <th class="wd-10p border-bottom-0">Status</th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($menucategories as $category)

                                                   
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{$category->category_name}}</td>


                                                        <td>
                                                           @if($category->parent_id == 0)
                                               Main Category
                                           @else
                                               {{ $category->subCategory->category_name }}
                                           @endif
                                                        </td>



                                                        <td>
                                                           @if($category->status == 1)
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
                                                            
                                                        
                                           <a href="{{ route('menueditCategory', $category->id) }}">
                                           <button class="btn btn-success btn-sm">
                                               <i class="fa fa-pencil"></i>
                                           </button>
                                           </a>
                                          


                                          

                                               <a class="btn btn-danger btn-sm deleteRecord" style="color: white" href="javascript:" rel="{{ $category->id }}" rel1="delete-menucategory">
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