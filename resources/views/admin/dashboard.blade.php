@extends('admin.includes.admin_design')

@section('title') Admin Dashboard - {{ config('app.name', 'Laravel') }}   @endsection


@section('content')

<!-- content here -->



 @php
        $current_user = Auth::guard('admin')->user();
    @endphp


                <!--app-content open-->
				<div class="app-content main-content">
					<div class="side-app">

                        
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0 text-primary">Welcome {{ $current_user->fname }} {{ $current_user->lname }}</h4>
							</div>
							
						</div>
						<!--End Page header-->


						<!-- Row-1 -->
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash1">
									<div class="card-body">
										<div class="row">

											<div class="col-md-6 col-sm-6 col-6">
												<div class="">
													<span class="fs-14 font-weight-normal">Bookings</span>
													<h2 class="mb-2 number-font carn1 font-weight-bold">{{\App\Models\Booking::count()}}</h2>
												</div>
											</div>

											<!-- <div class="col-md-6 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark1"></div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash2">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-6">
												<div class="">
													<span class="fs-14">Events</span>
													<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold">{{\App\Models\Event::count()}}</h2>
												</div>
											</div>
											<!-- <div class="col-md-6 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark2"></div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash3">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-6">
												<div class="">
													<span class="fs-14">Post</span>
													<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold">{{\App\Models\Post::count()}}</h2>
												</div>
											</div>
											<!-- <div class="col-md-6 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark3"></div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
								<div class="card overflow-hidden dash1-card border-0 dash4">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-6">
												<div class="text-justify">
													<span>Rooms</span>
													<h2 class="mb-2 mt-1 number-font carn2 font-weight-bold">{{\App\Models\Room::count()}}</h2>
												</div>
											</div>
											<!-- <div class="col-md-6 col-sm-6 col-6 my-auto mx-auto">
												<div class="mx-auto text-right">
													<div id="spark4"></div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row-1 -->

					

						<!-- Row-3 -->
						<div class="row row-deck">



							<div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">
											Recent News
										</h3>
										<div class="card-options">
											<a href="{{route('post.index')}}" class="btn btn-sm btn-primary">View All</a>
										</div>
									</div>
									<div class="card-body">

										@php $latest_posts = \App\Models\Post::where(['status' => '1'])->latest()->take(5)->get(); @endphp
                                             @foreach($latest_posts as $latest)
										<div class="mb-3">
											<div class="d-flex">
												<div class="Recent-transactions-img brround bg-primary text-white font-weight-normal1">AL</div>
												<div class="">
													<a href="javascript:void(0);" class="font-weight-normal1 mb-1 fs-13">{{$latest->post_title}}</a>
													<p class="text-muted fs-11">{{ $latest->created_at }}</p>
												</div>
											</div>
										</div>
										@endforeach
										
										
									</div>
								</div>
							</div>
							



							<div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">
											Recent Bookings
										</h3>
										<div class="card-options">
											<a href="javascript:void(0);" class="btn btn-sm btn-primary">View All</a>
										</div>
									</div>
									<div class="card-body">

										@php $bookings = \App\Models\Booking::latest()->take(5)->get(); @endphp
                                             @foreach($bookings as $bookings)

										<div class="mb-3">
											<div class="d-flex">
												<div class="Recent-transactions-img brround bg-primary text-white font-weight-normal1">AL</div>
												<div class="">
													<a href="javascript:void(0);" class="font-weight-normal1 mb-1 fs-13">{{$bookings->name}}</a>
													<p class="text-muted fs-11">{{ $bookings->created_at }}</p>
												</div>
												<span class="text-success font-weight-normal fs-12 ms-auto">&plus;$543.98</span>
											</div>
										</div>
										@endforeach
										
									
									</div>
								</div>
							</div>
							
						</div>
						<!-- End Row-3 -->


					</div>
				</div>
				<!-- CONTAINER END -->
            </div>

      
		</div>

     




@endsection