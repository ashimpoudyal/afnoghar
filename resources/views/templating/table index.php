@extends('admin.includes.admin_design')


@section('title') Profile - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



<div class="app-content main-content">
                    <div class="side-app">

                        
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Data Tables</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <button class="btn btn-outline-primary"><i class="fe fe-download"></i>
                                        Import</button>
                                    <a href="javascript:void(0);"  class="btn btn-primary btn-pill" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-calendar me-2 fs-14"></i> Search By Date</a>
                                    <div class="dropdown-menu border-0">
                                            <a class="dropdown-item" href="javascript:void(0);">Today</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Yesterday</a>
                                            <a class="dropdown-item active bg-primary text-white" href="javascript:void(0);">Last 7 days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last 30 days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last 6 months</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last year</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->


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
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-10p border-bottom-0">E-mail</th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                   
                                                    <tr>
                                                        <td>Nepal</td>
                                                        <td>Email</td>


                                                        <td>


                                                            <a href="">
                                           <button class="btn btn-warning btn-sm">
                                               <i class="fa fa-eye"></i>
                                           </button>
                                           </a>
                                                            
                                                        <a href="">
                                           <button class="btn btn-success btn-sm">
                                               <i class="fa fa-pencil"></i>
                                           </button>
                                           </a>


                                          

                                              <a href="">
                                           <button class="btn btn-danger btn-sm">
                                               <i class="fa fa-trash"></i>
                                           </button>
                                           </a>
                                          
                                           <!-- <button class="btn btn-alert btn-sm">
                                               <i class="fa fa-times"></i>
                                           </button> -->
                                          


                                                        </td>
                                                    </tr>
                                                   
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