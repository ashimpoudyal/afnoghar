
 @extends('front.includes.front_design')


		
 @section('content')
<!--TOP SECTION-->
<div class="inn-banner">
	<div class="container">
		<div class="row">
			<h4>Our Menu</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
				<p>
					<ul>
						<li><a href="#">Home</a>
						</li>
						<li><a href="#">Menu</a>
						</li>
					</ul>
		</div>
	</div>
</div>
		<div class="inn-body-section pad-bot-65">
			<div class="container">
				<div class="row inn-page-com">
					<div class="page-head">
						<h2>{{ $menucategory->category_name }}
						</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						
					</div>



					<!--SERVICES SECTION-->

					

				@foreach ($menu as $menu)
					
				
					<div class="col-md-6">
						
							
							<div class="res-menu"> <img src="{{asset('public/uploads/menu/'.$menu->image)}}" alt="" />
								<h3>{{$menu->name}} <span style="height: 25px;width:43px; font-size:16px;"  align="center">Rs.{{$menu->sellingprice}}</span> <i class="bi bi-cart"></i></h3> 
								<div class="col-9">
									<br>
									<span class="menu-item">ajddb subdb uef uudb uhdu &nbsp;
										<button style="height: 30px;width:44px; float:right;" class="btn btn-primary" onclick="addToCart({{ $menu->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
											<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
											</svg>
										</button></span>

										
								</div>
								
								
								
								
								
							</div>
							
						</div>
						@endforeach
					<!--END SERVICES SECTION-->
					<!--SERVICES SECTION-->
					
					<!--END SERVICES SECTION-->
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

	<!--ALL SCRIPT FILES-->
<script>
	function addToCart(id){
		alert(id);
		$.post("{{ route('addToCart') }}", {_token: '{{ csrf_token() }}',
	    'id':id
	    }, function (data) {
	          alert('Items added to cart successfully.');
	          window.location.reload();
			
	  });
	}
</script>

	
@endsection



