@extends('admin.includes.admin_design')


@section('title') Order Details - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



<!--app-content open-->
        <div class="app-content main-content">
          <div class="side-app">

                        
            <!--Page header-->
            <div class="page-header">
              <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Order Detials</h4>
              </div>
              <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('order.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View All Orders </button></a>


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

            <!-- Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <div class="invoice-header text-end d-block mb-5">
                      <h1 class="invoice-title font-weight-bold text-uppercase mb-1 text-primary">Invoice</h1>

                    </div><!-- invoice-header -->
                    <div class="row mt-4">
                      <div class="col-md">
                        <label class="font-weight-bold">Billed To</label>
                        <div class="billed-to">
                          <h6>{{$orders->users->name}}</h6>
                          <p> Tracking Number : {{$orders->tracking_no}}<br>
                          Phone No: {{$orders->users->phone}}<br>
                          Email: {{$orders->users->email}}<br>
                          Booked From Table : {{$orders->table_no}}

                            <form action="{{route('order.update',$orders->id)}}" method="post" enctype="multipart/form-data" >
                                    @csrf

                                     <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="btn-list">


                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="order_status" id="btnradio1" autocomplete="off"  value="1" @if($orders->order_status == 1) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio1">Delevered</label>

                                                <input type="radio" class="btn-check" name="order_status" id="btnradio2" autocomplete="off" value="0"  @if($orders->order_status == 0) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio2">Orderd</label>
                                              </div>
                                        </div>
                                                </div>

                                               




                                            </div>




                          <!--  @if($orders->order_status == 1)
                                                           <span class="badge bg-success" style="color: white;">Delevered</span>
                                                       @else
                                                           <span class="badge bg-danger" style="color: white;">Ordered</span>
                                                       @endif
 -->



                                

                        </p>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="billed-from text-md-right">
                          <label class="font-weight-bold">Billed From</label>
                          <h6>Spruko Pvt Ltd.</h6>
                          <p>201 Something St., Something Town, YT 242, Country 6546<br>
                          Tel No: 324 445-4544<br>
                          Email: info@spruko.com</p>
                        </div><!-- billed-from -->
                      </div>
                    </div>
                    <div class="table-responsive mt-4">
                      <table class="table table-bordered border text-nowrap mb-0">
                        <thead>
                          <tr>
                            <th class="wd-20p">SN</th>
                            <th class="wd-20p">Product</th>
                            <th class="tx-center">QNTY</th>
                            <th class="tx-right">Unit Price</th>
                            <th class="tx-right">Amount</th>
                          </tr>
                        </thead>
                        <tbody>

                          @php $total="0";  @endphp

                          @foreach($orders->orderitems as $order)
                          <tr>
                            <td class="tx-center">{{ $loop->index + 1 }}</td>
                            <td class="font-weight-bold">{{$order->menu->name }}</td>
                            <td class="tx-center">{{$order->order_quantity }}</td>
                            <td class="tx-right">Rs. {{$order->price , 0 }}</td>
                            <td class="tx-right">Rs. {{$order->order_quantity *$order->price }}</td>
                          </tr>

                           @php $total = $total + ($order->price * $order->order_quantity) @endphp
                          @endforeach
                          
                          <tr>
                            <td class="valign-middle" colspan="2" rowspan="4">
                              <div class="invoice-notes">
                                <label class="main-content-label tx-13 font-weight-semibold">Notes</label>
                                <p> voluptatum deleniti atque corrupti explicabo.</p>
                              </div><!-- invoice-notes -->
                            </td>
                            <td class="text-uppercase font-weight-semibold">Sub-Total</td>
                            <td class="tx-right font-weight-semibold">Rs. {{$total}} 
                             


                            </td>
                          </tr>
                         <!--  <tr>
                            <td class="tx-right font-weight-semibold">Tax (5%)</td>
                            <td class="tx-right font-weight-semibold">$235.50</td>
                          </tr>
                          <tr>
                            <td class="tx-right font-weight-semibold">Discount</td>
                            <td class="tx-right font-weight-semibold">-$50.00</td>
                          </tr>
                          <tr class="text-danger">
                            <td class="text-uppercase font-weight-semibold">Total Due</td>
                            <td class="tx-right">
                              <h4 class="font-weight-bold">$4,885.50</h4>
                            </td>
                          </tr> -->

                        </tbody>
                      </table>
                    </div>
                    <div class="float-end">
                     <!--  <button type="button" class="btn btn-primary mt-4" onClick="javascript:window.print();"><i class="si si-wallet"></i> Pay Invoice</button>
                      <button type="button" class="btn btn-success mt-4" onClick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button> -->
                        <button class="btn btn-success mt-4">Change Status</button>
                      <button type="button" class="btn btn-secondary mt-4" onClick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End row-->


          </div>
        </div>
        <!-- CONTAINER END -->

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