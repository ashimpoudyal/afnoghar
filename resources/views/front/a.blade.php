@extends('front.includes.front_design')
<style>

</style>

		
 @section('content')
 <div class="container" style="margin-top:140px;">
    <table class="table" border="3px;">
        <thead>
          <tr>
            <th scope="col" style=" text-align: center;">Image</th>
            <th scope="col" style=" text-align: center;">Menu Name</th>
            <th scope="col" style=" text-align: center;">Quantity</th>
            <th scope="col" style=" text-align: center;">Price</th>
            <th scope="col" style=" text-align: center;">Total Price</th>
          </tr>
        </thead>
          
        
        <tbody>
          

          @if (session()->has('cart'))
            @foreach (session()->get('cart') as $key => $cartItem)
            <input type="hidden" name="id" id="{{ $cartItem->menu_id }}">
            <tr align="center">
              <td style=" text-align: center;"><img src="" alt=""></td>
              <td style=" text-align: center;">{{ $cartItem->menu_name }}</td>
              <td style=" text-align: center;">{{$cartItem->quantity}}></td>
              <td style=" text-align: center;">{{ $cartItem->price }}</td>
            </tr>


            

            @endforeach
            
          @endif
         @php $total = 0; @endphp
          @if(auth()->user()) 
          @foreach ($checkout as $checkout)
            @php
            
            $grandtotal = $checkout->price * $checkout->quantity;
            @endphp
          
          <input type="hidden" name="id" id="{{ $checkout->menu_id }}">
          <tr>
            <td><img src="" alt=""></td>
            
            <td style=" text-align: center;">{{ $checkout->menu_name }}</td>
            <td style=" text-align: center;">{{$checkout->quantity}}</td>
            <td style=" text-align: center;">{{ $checkout->price }}</td>
            <td style=" text-align: center;">{{$grandtotal}}</td>
          </tr>
            @php $total = intVal($grandtotal)+ intVal($total); @endphp
          @endforeach
          @endif
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style=" text-align: center;"><span><b>Grand Total:</b></span> {{$total }}</td>
          </tr>
        
           
        </tbody>
      </table>
      
       
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
		alert(menuId);
    var inputValue = $('#'+id).val();

		$.post("{{ route('updateCart') }}", {_token: '{{ csrf_token() }}',
	    'menu_id':menuId,'quantity':inputValue
	    }, function (data) {
	          alert('Items added to cart successfully.');
	          window.location.reload();
			
	  });
	}

</script>

 @endsection
 