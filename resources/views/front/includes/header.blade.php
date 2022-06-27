<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section>
  <div class="mm">
    <div class="mm-inn">
      <div class="mm-logo">
        <a href="main.html"><img src="images/logo.png" alt="">
        </a>
      </div>
      <div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
      </div>
      <div class="mm-menu">
        <div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
        </div>
        <ul>
          <li><a href="{{route('index')}}">Home</a>
          </li>
          <li><a href="{{route('room')}}">Rooms</a>
          </li>
          <li><a href="{{route('service')}}">Services</a>
          </li>
          <li><a href="#" class="dropdown-button" data-activates="drop-home">Menu <i class="fa fa-angle-down"></i></a><ul id="drop-home" class="dropdown-content drop-con-man">
          @php $menu= \App\Models\MenuCategory::where('parent_id',0)->get(); @endphp
          @foreach($menu as $menu)
            <li><a href="{{route('menuSingle',$menu->slug)}}">{{ $menu->category_name }}</a>
          </li>
          @endforeach
          
        </ul>
          </li>
          <li><a href="{{route('event')}}">Events</a>
          </li>
          <li><a href="{{route('amenities')}}">Amenities</a>
          </li>
          <li><a href="{{route('cartDetails')}}"><i class="fa fa-shopping-cart"></i> My Cart<sup>({{ countCartItems() }})</sup></a>
        </li>
        @if(auth()->user()) 
        <li><a href="{{route('frontUserLogout')}}">Logout</a>
        </li>
    @endif
        
          <br>
        </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>



<div class="menu-section" style="height: 11%">
  <div class="container">
 
    <div class="row">
      <div class="logo">
       
        <a href="{{route('index')}}"><img src="{{asset('public/assets/front/assets/img/logo1.png')}}" style="padding-top: 14px;" alt="">
        </a>
      </div>
      <div class="menu-bar">
        <ul>
          <li><a href="{{route('index')}}">Home</a>
          </li>
          <li><a href="{{route('room')}}">Rooms</a>
          </li>
          <li><a href="{{route('service')}}">Services</a>
          </li>
          <li><a href="#" class="dropdown-button" data-activates="drop-home">Menu <i class="fa fa-angle-down"></i></a><ul id="drop-home" class="dropdown-content drop-con-man">
          @php $menu= \App\Models\MenuCategory::where('parent_id',0)->get(); @endphp
          @foreach($menu as $menu)
            <li><a href="{{route('menuSingle',$menu->slug)}}">{{ $menu->category_name }}</a>
          </li>
          @endforeach
          
        </ul>
          </li>
          <li><a href="{{route('event')}}">Events</a>
          </li>
          <li><a href="{{route('amenities')}}">Amenities</a>
          </li>
          <li><a href="{{route('cartDetails')}}"><i class="fa fa-shopping-cart"></i> My Cart<sup>({{ countCartItems() }})</sup></a>
        </li>
        @if(auth()->user()) 
        <li><a href="{{route('frontUserLogout')}}">Logout</a>
        </li>
    @endif
        
          <br>
        </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>