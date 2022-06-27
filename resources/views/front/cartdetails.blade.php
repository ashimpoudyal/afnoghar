@extends('front.includes.front_design')


		
 @section('content')
 <div class="container" style="margin-top:140px;">
    <table class="table" border="3px;">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Menu Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total Price</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
          
        
        <tbody>
          

          @if (session()->has('cart'))
            @foreach (session()->get('cart') as $key => $cartItem)
            <input type="hidden" name="id" id="{{ $cartItem->menu_id }}">
            <tr>

           @php   $menu = App\Models\Menu::where('id',$cartItem->menu_id)->first();@endphp
           session()->all();
          

              <td><img style="height:55px;width:80px;" src="{{(asset('public/uploads/menu/'.$menu->image))}}" alt=""></td>
              <td>{{ $cartItem->menu_name }}</td>
              <td><input type="number" style="border: none;" id="cart_{{ $cartItem->menu_id }}" value="{{ $cartItem->quantity }}">
                <button class="changeQuantity" onclick="increment(this,'cart_{{ $cartItem->menu_id }}','cart_price_{{ $cartItem->menu_id }}','cart_inc_{{ $cartItem->menu_id }}')">+</button>
                <button class="changeQuantity" onclick="decrement(this,'cart_{{ $cartItem->menu_id }}','cart_price_{{ $cartItem->menu_id }}','cart_inc_{{ $cartItem->menu_id }}')">-</button>

              </td>
              <td><div id="cart_price_{{ $cartItem->menu_id }}">{{ $cartItem->price }}</div></td>
              <td><div id="cart_inc_{{ $cartItem->menu_id }}">{{ $cartItem->price * $cartItem->quantity}}</div></td>
              <td><button class="btn btn-primary" onclick="updateCart('{{$cartItem->menu_id}}','cart_{{ $cartItem->menu_id }}')">Update</button></td>
              <td><a class="btn btn-danger" href="{{route('deleteCart',$cartItem->menu_id)}}">Delete</a></td>
            </tr>


            

            @endforeach
            
          @endif

          @if(auth()->user()) 
          @foreach ($carts as $cart)
            
          
          <input type="hidden" name="id" id="{{ $cart->menu_id }}">
          @php   $menu = App\Models\Menu::where('id',$cart->menu_id)->first();@endphp
          <tr>
            <td><img style="height:55px;width:80px;" src="{{asset('public/uploads/menu/'.$menu->image)}}" alt=""></td>
            
            <td>{{ $cart->menu_name }}</td>
            <td><input type="number" style="border: none; width:30px;" align="center" id="cart_{{ $cart->menu_id }}" value="{{ $cart->quantity }}"><br>
              <button class="changeQuantity" onclick="increment(this,'cart_{{ $cart->menu_id }}','cart_price_{{ $cart->menu_id }}','cart_inc_{{ $cart->menu_id }}')">+</button>
              <button class="changeQuantity" onclick="decrement(this,'cart_{{ $cart->menu_id }}','cart_price_{{ $cart->menu_id }}','cart_inc_{{ $cart->menu_id }}')">-</button>

            </td>
            <td><div id="cart_price_{{ $cart->menu_id }}">{{ $cart->price }}</div></td>
            <td><div id="cart_inc_{{ $cart->menu_id }}">{{ $cart->price * $cart->quantity}}</div></td>
            <td><button class="btn btn-primary" onclick="updateCart('{{$cart->menu_id}}','cart_{{ $cart->menu_id }}')">Update</button></td>
           
            <td>
              <a class="btn btn-danger" href="{{route('deleteCart',$cart->id)}}">Delete</a>
              </td>
          </tr>
          @endforeach
          @endif
        
        </tbody>
      </table>
  <hr>
  <td><button class="btn btn-primary pull-right outer-right-xs" style="width:20%;" onclick="window.location='{{route('checkout')}}'">proceed to checkout</button></td>
</div>
<br>
<script>
  function increment(e,id,priceId,totalId) {
    var inputValue = $('#'+id).val();

   
    var increment = parseInt(inputValue) + 1;
    $('#'+id).val(parseInt(inputValue) + 1);
    var price = $('#'+priceId).text();
    
    $('#'+totalId).text(increment * parseInt(price));
    //  document.getElementById('#'+id).stepUp();
  }
  

  function decrement(e,id,priceId,totalId) {
    var inputValue = $('#'+id).val();

    var decrement = parseInt(inputValue) - 1;
    $('#'+id).val(parseInt(inputValue) - 1);
    
    


    var price = $('#'+priceId).text();

    $('#'+totalId).text(decrement*parseInt(price));
    
  }
  

		
    function updateCart(menuId,id){
		alert('Items updated to cart successfully.');
    var inputValue = $('#'+id).val();

		$.post("{{ route('updateCart') }}", {_token: '{{ csrf_token() }}',
	    'menu_id':menuId,'quantity':inputValue
	    }, function (data) {
	          alert('Items updated to cart successfully.');
	          window.location.reload();
			
	  });
	}
  
</script>

 @endsection
 