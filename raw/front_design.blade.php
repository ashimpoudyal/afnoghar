{{-- @extends('front.includes.front_design') --}}


<!DOCTYPE html>
<html lang="en">

@extends('front.includes.head')

<body>
	<div class="main-content">
	
		@extends('front.includes.header')
		
		@yield('content')
		<div class="content-panel">
		<footer>
			<div class="container">
				<div class="footer-wrapper">
					<div class="row">
	
						<div class="col-lg-3 col-md-6">
						  <div class="footer-info">
							<h3>Logo</h3>
							<p>
							  25 Anamnagar <br>
							  Kathmandu, Nepal<br><br>
							  <strong>Phone:</strong> +977 9810-000-000<br>
							  <strong>Email:</strong> info@gmail.com<br>
							</p>
							<div class="social-links mt-3">
							  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
							  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
							  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
							  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
							  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
							</div>
						  </div>
						</div>
			  
						<div class="col-lg-2 col-md-6 footer-links">
						  <h4>Useful Links</h4>
						  <ul>
							<li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="event.html">Events</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="gallery.html">Gallery</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#book-a-table">Book Now</a></li>
						  </ul>
						</div>
			  
						<div class="col-lg-3 col-md-6 footer-links">
						  <h4>Our Services</h4>
						  <ul>
							<li><i class="bx bx-chevron-right"></i> <a href="event.html">Parties</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="event.html">Ceremonies</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="event.html">Meetings &amp; Conference</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="event.html">Meet Up</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="event.html">Tourist Package</a></li>
						  </ul>
						</div>
			  
						<div class="col-lg-4 col-md-6 footer-newsletter">
						  <h4>Book A Table Now </h4>
						  <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
						  <form action="" method="post">
							<input type="email" name="email" class="email-newsletter" placeholder="Your Email"><input type="submit" value="Book Now" class="subscribe-newsletter">
						  </form>
			  
						</div>
			  
					  </div>
				</div>
			</div>
		</footer>
	</div>	
{{-- {{asset('public/assets/front/assets/js/jquery.googlemap.js')}} --}}
    @extends('front.includes.js')
</body>
</html>