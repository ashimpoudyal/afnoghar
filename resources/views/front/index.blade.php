
 @extends('front.includes.front_design')


		
@section('content')


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Oct 2021 16:05:18 GMT -->


<body data-ng-app="">
	<!--MOBILE MENU-->
	
	<!--HEADER SECTION-->
	<section class="home-block">
		
		<!--Check Availability SECTION-->
		<div>
			<div class="slider fullscreen">
				<ul class="slides">
					@foreach($banners as $banner)
					<li> <img src="{{asset('public/uploads/banner/'.$banner->image)}}" alt="">
						<!-- random image -->
						<div class="caption center-align slid-cap">
							<h5 class="light grey-text text-lighten-3">{{$banner->title}}</h5>
							<h2>{{$banner->sub_title}}</h2>
							<p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a><a href="#">Booking</a> </div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!--End Check Availability SECTION-->
		<!--HOTEL ROOMS SECTION-->
		<div class="hom1 hom-com pad-bot-40" style="background-color: white;">
			<div class="container">
				<div class="row">
					<div class="hom1-title">
						<h2>Our Hotel Rooms</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
					</div>
				</div>
				<div class="row">
					<div class="to-ho-hotel">
						<!-- HOTEL GRID -->
						@foreach ($rooms as $room)
							
					
						<div class="col-md-4" >
							<div class="to-ho-hotel-con">
								<div class="to-ho-hotel-con-1">
									<div class="hom-hot-av-tic"> Available Tickets: 42 </div> <img style="height:353px; width:241.52px;" src="{{asset('public/uploads/room/'.$room->image)}}" alt=""> </div>
								<div class="to-ho-hotel-con-23">
									<div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Master Room</h4></a> </div>
									<div class="to-ho-hotel-con-3">
										<ul>
											<li>City: illunois,united states
												<div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
											</li>
											<li><span class="ho-hot-pri-dis">$720</span><span class="ho-hot-pri">$420</span> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!--END HOTEL ROOMS-->
		<!--TOP SECTION-->
		<div class="offer offer-block">
			<div class="container">
				<div class="row">
					@foreach ($discounts as $discount)
						
				
					<div class="col-md-6">
						<div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">{{$discount->name}}</span> <span class="ol-3"></span> <span class="ol-5">${{$discount->price}}/-</span>
							<ul>
								<li>
									<a href="" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis1.png" alt="">
									</a><span>{{$discount->facility1}}</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/h2.png" alt=""> </a><span>{{$discount->facility2}}</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis3.png" alt=""> </a><span>{{$discount->facility3}}</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis4.png" alt=""> </a><span>{{$discount->facility4}}</span>
								</li>
								<li>
									<a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="images/icon/dis5.png" alt=""> </a><span>GYM</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="offer-r">
							<div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
							<div class="or-2"> <span class="or-21">Get</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="blog hom-com" style="background-color: white;">
			<div class="container">
				<div class="row">
					<div class="hom1-title">
						<h2 style="color: black">News & Event</h2>
						<div class="head-title">
							<div class="hl-1 hl-1-block"></div>
							<div class="hl-2 hl-2-block"></div>
							<div class="hl-3 hl-3-block"></div>
						</div>
						<p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="bot-gal bot-gal-block h-gal">
							<h4>Photo Gallery</h4>
							<ul>
								@foreach ($galleries as $gallery)
									
							
								<li><img class="materialboxed" data-caption="Hotel Captions" src="{{asset('public/uploads/gallery/'.$gallery->image)}}" alt="">
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="bot-gal bot-gal-block h-vid">
							<h4>Video Gallery</h4>
							@foreach ($videos as $video)
								
							
							<iframe src="{{$video->url}}" allowfullscreen></iframe>
							<h5 align="center">{{$video->name}}</h5>
							@endforeach
						</div>
					</div>
					<div class="col-md-4">
						<div class="bot-gal bot-gal-block h-blog h-blog-block">
							<h4>News & Event</h4>
							<ul>
								@foreach ($events as $event)
									
								
								<li>
									<a href="#!"> <img src="{{asset('public/uploads/event/'.$event->image)}}" alt="">
										<h5>{{$event->name}}</h5> <span>{{$event->date}}</span>
										<p>{!!$event->description!!}</p>
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="">
			<div>
				<!--TOP SECTION-->
				<div class="hom-footer-section">
					<div class="container">
						<div class="row">
							<div class="foot-com foot-1">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									</li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
									</li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									</li>
								</ul>
							</div>
							<div class="foot-com foot-2">
								<h5>Phone: (+404) 142 21 23 78</h5> </div>
							<div class="foot-com foot-3">
								<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="{{route('frontbooking')}}">room reservation</a> </div>
							<div class="foot-com foot-4">
								<a href="#"><img src="images/card.png" alt="" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>				
	</section>
	<!--END HEADER SECTION-->
	
		<!-- LOGIN SECTION -->
		<div id="modal1" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span></span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
					</a>
					<h4>Login</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="s12 log-ch-bx">
								<p>
									<input type="checkbox" id="test5" />
									<label for="test5">Remember me</label>
								</p>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- REGISTER SECTION -->
		<div id="modal2" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span></span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
					</a>
					<h4>Create an Account</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name1" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="email" class="validate">
								<label>Email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Confirm password</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORGOT SECTION -->
		<div id="modal3" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span></span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
					</a>
					<h4>Forgot password</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name3" class="validate">
								<label>User name or email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--ALL SCRIPT FILES-->
	
@endsection