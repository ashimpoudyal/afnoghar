@extends('admin.includes.admin_design')


@section('title') Add Booking - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Booking</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('booking.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Booking </button></a>


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


                       
                               <form action="{{ route('booking.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Add Booking </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Details:</div>
                                        <div class="row">






                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                              </div>
                                            </div>




                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                              </div>
                                            </div>





                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                               <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                              </div>
                                            </div>





                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                                              </div>
                                            </div>




                                    

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Check-in Date <span class="text-danger">*</span></label>
                                               <input type="date" class="form-control checkin-date" id="checkin_date" name="checkin_date" value="{{ old('checkin_date') }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Check-out Date <span class="text-danger">*</span></label>
                                               <input type="date" class="form-control" id="checkout_date" name="checkout_date" value="{{ old('checkout_date') }}">
                                              </div>
                                            </div>



                                             <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Available Rooms</label>

                                                    <select class="form-control select2 select2-hidden-accessible room-list" tabindex="-1" aria-hidden="true" name="room_id">

                                                </select>
                                                </div>
                                            </div>



                                         


                                         











                                              <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Number Of Adults <span class="text-danger">*</span></label>
                                               <input type="number" class="form-control" id="total_adults" name="total_adults" value="{{ old('total_adults') }}">
                                              </div>
                                            </div>



                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Number Of Childrens <span class="text-danger">*</span></label>
                                               <input type="number" class="form-control" id="total_children" name="total_children" value="{{ old('total_children') }}">
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




<script>
    //Booking Availability
    
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){

            var _checkindate=$(this).val();


           //Ajax
           $.ajax({
            url:"{{url('admin/booking')}}/available-rooms/"+_checkindate,
            dataType:'json',

            beforeSend:function(){

                 $(".room-list").html('<option>--Loading</option>');



            },


            success:function(res){
                var _html='';
                $.each(res.data,function(index,row){

                    _html+='<option value="'+row.room.id+'">'+row.room.post_title+'-'+row.roomtype.category_name+'</option>';
                });

                $(".room-list").html(_html);



                // console.log(res);
            }



           });


        });


    });
</script>





    <!-- <script>
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                .attr('src', e.target.result)
                .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('post_content', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
 -->







    @endsection
        

