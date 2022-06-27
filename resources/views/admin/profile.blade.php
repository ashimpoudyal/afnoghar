@extends('admin.includes.admin_design')


@section('title') Profile - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



                <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Profile Details</h4>
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
                            <div class="col-xl-3 col-lg-3 col-md-12">
                                <div class="card box-widget widget-user">
                                    <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="{{ asset('public/uploads/admin/'.$admin->image) }}"></div>
                                    <div class="card-body text-center">
                                        <div class="pro-user">
                                            <h4 class="pro-user-username mb-1 font-weight-bold">{{$admin->fname}}</h4>
                                            <h6 class="pro-user-desc text-muted">{{$admin->lname}}</h6>
                                            <div class="wideget-user-rating">
                                                <!-- <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a> -->
                                                <!-- <a href="javascript:void(0);"><i class="fa fa-star-o text-warning me-1"></i></a> <span>5 (3876 Reviews)</span> -->
                                            </div>
                                            <a href="{{route('editprofile')}}" class="btn btn-success mt-3"><i class="fa fa-rss me-2"></i>Edit Profile</a>
                                            <!-- <a href="javascript:void(0);" class="btn btn-primary mt-3"><i class="fa fa-pencil me-2"></i> Follow</a> -->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Details</h3>
                                   </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="">
                                                            <span class="font-weight-semibold w-50">Name </span>
                                                        </td>
                                                        <td class="">{{$admin->fname}} {{$admin->lname}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="">
                                                            <span class="font-weight-semibold w-50">Location </span>
                                                        </td>
                                                        <td class="">{{$admin->country}}</td>
                                                    </tr>
                                                   
                                                   
                                                    <tr>
                                                        <td class="">
                                                            <span class="font-weight-semibold w-50">Email </span>
                                                        </td>
                                                        <td class="">{{$admin->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="">
                                                            <span class="font-weight-semibold w-50">Phone </span>
                                                        </td>
                                                        <td class="">{{$admin->phone}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-12">
                                <div class="main-content-body main-content-body-profile card">
                                    <div class="card-header">
                                        <h3 class="card-title">Biography</h3>
                                    </div>
                                    <div class="main-profile-body">
                                        <div class="card-body">
                                            <div class="main-profile-bio mb-5">
                                                <p>{{$admin->about}}<a href="#">More</a></p>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                               
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Contact</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="main-profile-contact-list d-lg-flex">
                                            <div class="media me-4">
                                                <div class="media-icon bg-danger-transparent text-danger  me-3 mt-1">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted">Mobile</small>
                                                    <div class="font-weight-normal1">
                                                        {{$admin->phone}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media me-4">
                                                <div class="media-icon bg-warning-transparent text-warning me-3 mt-1">
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted">Facebook</small>
                                                    <div class="font-weight-normal1">
                                                        <a>www.facebook.com/{{$admin->fname}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info me-3 mt-1">
                                                    <i class="fa fa-map"></i>
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted">Current Address</small>
                                                    <div class="font-weight-normal1">
                                                        {{$admin->address}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- main-profile-contact-list -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- CONTAINER END -->
            </div>

           

@endsection