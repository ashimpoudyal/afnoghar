{{-- @extends('front.includes.front_design') --}}

<!DOCTYPE html>
<html lang="en">

<body>
	<body data-ng-app="">
	
    @include('front.includes.header')

	

		@yield('content')

		@include('front.includes.footer')
	</div>	
{{-- {{asset('public/assets/front/assets/js/jquery.googlemap.js')}} --}}
    @include('front.includes.js')
</body>
</html>