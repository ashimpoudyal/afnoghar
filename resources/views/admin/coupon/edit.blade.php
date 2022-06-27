@extends('admin.includes.admin_design')


@section('title') Add Coupon - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Coupon</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('coupon.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View Coupon </button></a>


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

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                              <form action="{{ route('coupon.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Coupon Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Coupon Code</label>
                                                   <input type="text" class="form-control" name="coupon_code" id="coupon_code" value="{{ $coupon->coupon_code  }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Coupon Type</label>
                                                        <select name="amount_type" id="amount_type" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                        <option value="Percentage" @if($coupon->amount_type == "Percantage") selected @endif>Percentage</option>
                                                    <option value="Fixed" @if($coupon->amount_type == "Fixed") selected @endif>Fixed</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Coupon Amount</label>
                                                    <input type="text" class="form-control" name="amount" id="amount" value="{{ $coupon->amount }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Expiry Date</label>
                                                  <input type="text" class="form-control" name="expiry_date" id="expiry_date" value="{{ $coupon->expiry_date }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="btn-list">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                 <input type="radio" class="btn-check" name="status" id="btnradio1" autocomplete="off" checked="" value="1" @if($coupon->status == 1) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio1">Active</label>

                                                <input type="radio" class="btn-check" name="status" id="btnradio2" autocomplete="off" value="0"  @if($coupon->status == 0) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio2">Inactive</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div>
                                            </div>


                                         
                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn  btn-success">Save</button>
                                        <a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- End Row-->


                    </div>
                </div>
                <!-- CONTAINER END -->
            </div>

          
@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>


    <script>
        $(function(){
            $( "#expiry_date" ).datepicker({
                minDate: 0,
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>

    
    @endsection
        

