@extends('admin.includes.admin_design')


@section('title') Add Tag - {{ config('app.name', 'Laravel') }}   @endsection

@section('content')



    

  <!--app-content open-->
                <div class="app-content main-content">
                    <div class="side-app">

                        

                       <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title mb-0 text-primary">Edit Post</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="{{route('post.index')}}"><button class="btn btn-outline-primary"><i class="fe fe-eye"></i>
                                       View  Post </button></a>


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


                       
                               <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">Edit Profile</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title font-weight-bold">Basic info:</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                   <div class="form-group">
                                                    <label class="form-label">Under Category<span class="text-danger">*</span></label>
                                                    <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="category_id" name="category_id">
                                                        <optgroup label="BlogCategory">
                                                             @php echo  $categories_dropdown @endphp
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                    
                                                </div>
                                            </div>


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Post Title <span class="text-danger">*</span></label>
                                               <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $post->post_title }}">
                                              </div>
                                            </div>


                                             <div class="col-sm-6 col-md-4">
                                    <div class="form-group" style="margin-top: 10px">
                                             <div class="form-group">
                                                <label class="form-label">Profile Picture</label>
                                                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="readURL(this);">
                                            </div>
                                            </div>
                                        </div>


                                             <div class="col-sm-6 col-md-8">
                                                    <div class="card-body text-center">
                                                         @if(empty($myCategory->image))
                                         <img src="{{ asset('public/uploads/posts/'.$post->image) }}" alt="" id="one" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @else
                                         <img src="https://via.placeholder.com/300x200?text=Thumbnail+Image" class="avatar avatar-xxl brround" alt="" id="one" >
                                         @endif
                                    </div>
                                    </div>

                                        


                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Tags <span class="text-danger">*</span></label>
                                               <select name="tag_id[]" id="tag_id" class="form-control tags" multiple>
                                            @foreach($tags as $tag)
                                               <option value="{{ $tag->id }}" {{ in_array($tag->id, $post_tag) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                            @endforeach
                                            </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="btn-list">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="status" id="btnradio1" autocomplete="off" checked="" value="1" @if($post->status == 1) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio1">Published</label>

                                                <input type="radio" class="btn-check" name="status" id="btnradio2" autocomplete="off" value="0"  @if($post->status == 0) checked @endif>
                                                <label class="btn btn-outline-primary" for="btnradio2">Draft</label>
                                              </div>
                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Content <span class="text-danger">*</span></label>
                                               <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control">{{ $post->post_content }}</textarea>
                                                </div>
                                            </div>

                                            
                                          




                                        </div>
                                        <div class="card-title font-weight-bold mt-5">SEO Details</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">SEO Title</label>
                                                   <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">SEO Sub Title</label>
                                                     <input type="text" class="form-control" id="seo_subtitle" name="seo_subtitle" value="{{ old('seo_subtitle') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">SEO Keywords</label>
                                                     <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="{{ old('seo_keywords') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">SEO Description</label>
                                                    <input type="text" class="form-control" id="seo_description" name="seo_description" value="{{ old('seo_description') }}">
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



<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('post_content', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>




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



    <!-- multiple tag selectr js -->
    <script>
        $(document).ready(function() {
    $('.tags').select2();
});
    </script>
    @endsection
        

