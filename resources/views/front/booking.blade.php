
 @extends('front.includes.front_design')


		
 @section('content')

<body data-ng-app="" background="{{asset('public/assets/front/assets/img/slide2.jpg')}}" style="background-repeat: none;">
	<!--MOBILE MENU-->
	<section>
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="main.html"><img src="images/logo.png" alt="">
					</a>
				</div>
				
			</div>
		</div>
	</section>
	<!--HEADER SECTION-->
	<section>
	
		<!--TOP SECTION-->
		<div class="inn-body-section inn-booking">
			
			<div class="container">
				<div class="row">
					<!--TYPOGRAPHY SECTION-->
					<div class="col-md-6">
						<div class="book-title">
							<h2>Hotel Booking</h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="book-form inn-com-form">
							<form class="col s12" action="{{route('front.booking.store')}}" method="POST">
                                @csrf
								<input type="hidden" name="room_id" value="{{ $room->id }}">

								@if(session()->has('message'))
								<div class="alert alert-success">
									{{ session()->get('message') }}
								</div>
							@endif


                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="row">
									<div class="input-field col s6">
										<input type="text" id="name" name="name" class="validate">
										<label>Full Name</label>
									</div>
									<div class="input-field col s6">
										<input type="text" id="email" name="email" class="validate">
										<label>Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="text" id="phone" name="phone" class="validate">
										<label>Phone</label>
									</div>
									<div class="input-field col s6">
										<input type="text" id="mobile" name="mobile" class="validate">
										<label>Mobile</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="text" id="city" name="city" class="validate">
										<label>City</label>
									</div>
									<div class="input-field col s6">
										<input type="text" id="country" name="country" class="validate">
										<label>Country</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<select id="total_adults" name="total_adults">
											<option value="" disabled selected>No of adults</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="1">4</option>
										</select>
									</div>
									<div class="input-field col s6">
										<select id="total_childrens" name="total_childrens">
											<option value="" disabled selected>No of childrens</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="1">4</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="text" id="arrival_date" name="arrival_date">
										<label for="from">Arrival Date</label>
									</div>
									<div class="input-field col s6">
										<input type="text" id="departure_date" id="to" name="departure_date">
										<label for="to">Departure Date</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<textarea id="textarea1" id="message" class="materialize-textarea" data-length="120"></textarea>
										<label>Message</label>
									</div>
								</div>
                               
                                    
                               
                                    
                               
                        
                              
								<div class="row">
									<div class="input-field col s12">
										<input type="submit" value="submit" class="form-btn"></div>
								</div>
                               
                            </div>
							</form>
						</div>
					</div>
					<!--END TYPOGRAPHY SECTION-->
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
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
						<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="booking.html">room reservation</a> </div>
					<div class="foot-com foot-4">
						<a href="#"><img src="images/card.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END HEADER SECTION-->

	
	<section>
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
				<div>
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
					</a>
					<h4>Login</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					
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
					<form>
						<div class="form-row">
						  <div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
						  </div>
						  <div class="form-group col-md-6">
							<label for="inputPassword4">Password</label>
							<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputAddress">Address</label>
						  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
						</div>
						<div class="form-group">
						  <label for="inputAddress2">Address 2</label>
						  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
						</div>
						<div class="form-row">
						  <div class="form-group col-md-6">
							<label for="inputCity">City</label>
							<input type="text" class="form-control" id="inputCity">
						  </div>
						  <div class="form-group col-md-4">
							<label for="inputState">State</label>
							<select id="inputState" class="form-control">
							  <option selected>Choose...</option>
							  <option>...</option>
							</select>
						  </div>
						  <div class="form-group col-md-2">
							<label for="inputZip">Zip</label>
							<input type="text" class="form-control" id="inputZip">
						  </div>
						</div>
						<div class="form-group">
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
							  Check me out
							</label>
						  </div>
						</div>
						<button type="submit" class="btn btn-primary">Sign in</button>
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
	
@endsection


