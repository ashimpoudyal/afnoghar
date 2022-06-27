@extends('admin.includes.admin_design')


@section('title') Add New Event  - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Add Event </h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{ route('event.index') }}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View Event  </button></a>
                                </div>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                           

                            <div class="col-xl-12 col-lg-12">

                              @include('admin.includes.message')


                       
                                <form action="{{ route('event.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Event Details</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Infos:</div>
                                        <div class="row">

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"> Name</label>
                                                   <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                                </div>
                                            </div>


                                              <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                   <div class="form-group">
                                                    <label class="form-label">Under Category<span class="text-danger">*</span></label>
                                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="category_id" name="category_id">
                                                        <optgroup>
                                                             @php echo  $categories_dropdown @endphp
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                    
                                                </div>
                                            </div>



                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Image</label>
                                              <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="readURL(this);">

                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                    <div class="card-body text-center">
                                        <img src="" class="avatar avatar-xxl brround" alt="" id="one" >
                                    </div>
                                                </div>





                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" name="address" id="address" cols="30" rows="10" class="form-control">{{ old('address') }}
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="btn-list">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="status" id="btnradio1" autocomplete="off" checked="" value="1">
                                                <label class="btn btn-outline-primary" for="btnradio1">Active</label>

                                                <input type="radio" class="btn-check" name="status" id="btnradio2" autocomplete="off" value="0">
                                                <label class="btn btn-outline-primary" for="btnradio2">Inactive</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date </label>
                                                     <input type="text" class="form-control" name="date" id="date" value="{{ old('date') }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Time </label>
                                                     <input type="text" class="form-control" name="time" id="time" value="{{ old('time') }}">
                                                </div>
                                            </div>


                                             <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description </label>
                                                    <textarea class="form-control" name="description" id="description"> </textarea>{{ old('description') }}
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Excerpt </label>
                                                    <textarea class="form-control" name="excerpt" id="excerpt"> </textarea>{{ old('excerpt') }}
                                                </div>
                                            </div>


                                             <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Map </label>
                                                    <textarea class="form-control" name="map" id="map"> </textarea>{{ old('map') }}
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
    <script>
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


     <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>


    <script>
        $(function(){
            $( "#date" ).datepicker({
                minDate: 0,
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>


     <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

     <script type="text/javascript">
        CKEDITOR.replace('map', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


    @endsection
        

