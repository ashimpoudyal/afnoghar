@extends('front.includes.front_design')


		
@section('content')

<!--TOP SECTION-->
<div class="hp-banner"> <img style="width: 1349px; height: 380.72px;" src="{{asset('public/uploads/event/'.$event->image)}}" alt=""> </div>
<!--END HOTEL ROOMS-->
<!--CHECK AVAILABILITY FORM-->
{{-- <div class="check-available">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="inn-com-form">
					<form class="col s12">
						<div class="row">
							<div class="col s12 avail-title">
								<h4>Check Availability</h4> </div>
						</div>
						<div class="row">
							<div class="input-field col s12 m4 l2">
								<select>
									<option value="" disabled selected>Select Room</option>
									<option value="1">Master Suite</option>
									<option value="2">Mini-Suite</option>
									<option value="3">Ultra Deluxe</option>
									<option value="4">Luxury</option>
									<option value="5">Premium </option>
									<option value="6">Normal</option>
								</select>
							</div>
							<div class="input-field col s12 m4 l2">
								<select>
									<option value="" disabled selected>No of adults</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="1">4</option>
								</select>
							</div>
							<div class="input-field col s12 m4 l2">
								<select>
									<option value="" disabled selected>No of childrens</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="1">4</option>
								</select>
							</div>
							<div class="input-field col s12 m4 l2">
								<input type="text" id="from" name="from">
								<label for="from">Arrival Date</label>
							</div>
							<div class="input-field col s12 m4 l2">
								<input type="text" id="to" name="to">
								<label for="to">Departure Date</label>
							</div>
							<div class="input-field col s12 m4 l2">
								<input type="submit" value="submit" class="form-btn"> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> --}}
<!--END CHECK AVAILABILITY FORM-->

	
		<div class="hom-com" style="padding-top: 90px;">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="hp-section">
                             
                                    
                             
								<div class="hp-sub-tit">
									<h4>{{$event->name}}</h4>

								
									
								</div>
								<div class="hp-amini">
									<p>{!!$event->description!!}</p>
									
								</div>
							</div>
							<div class="hp-section">
								<div class="hp-sub-tit">
									<h4>Map</h4>
								
								</div>
                                {!!$event->map!!}
							</div>
							


							

							<div class="hp-section">
								<div class="hp-sub-tit">
									<h4><span>Photo Gallery</span> Master Suite</h4>
								</div>
								<div class="">
									<div class="h-gal">
										<ul>
											@foreach($eventgalleries as $eventgalleries)
                                                
                                          
											<li><img class="materialboxed" style="width: 251.66px; height: 175.34px;" data-caption="Hotel Captions" src="{{asset('public/uploads/event/gallery/'.$eventgalleries->image)}}" alt="">
											</li>
                                            @endforeach
										</ul>
									</div>
								</div>
							</div>


						
							
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
								<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="booking.html">room reservation</a> </div>
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
	
	<section>
		<!-- REGISTER SECTION -->
		<div id="commend" class="modal fade" role="dialog">
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
					<h4>Write Your Review</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12" id="ratingsForm">
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
								<textarea class="materialize-textarea"></textarea>
								<label>Type your commends</label>
							</div>
						</div>
						<div class="stars">
							<input type="radio" name="star" class="star-1" id="star-1" />
							<label class="star-1" for="star-1">1</label>
							<input type="radio" name="star" class="star-2" id="star-2" />
							<label class="star-2" for="star-2">2</label>
							<input type="radio" name="star" class="star-3" id="star-3" />
							<label class="star-3" for="star-3">3</label>
							<input type="radio" name="star" class="star-4" id="star-4" />
							<label class="star-4" for="star-4">4</label>
							<input type="radio" name="star" class="star-5" id="star-5" />
							<label class="star-5" for="star-5">5</label> <span></span> </div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Submit Your Review" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
						</div>
					</form>
					<div>
						<div> </div>
					</div>
				</div>
			</div>
		</div>
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
@endsection