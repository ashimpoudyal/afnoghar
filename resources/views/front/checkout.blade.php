@extends('front.includes.front_design')


		
@section('content')


<section id="checkout" style="padding-top: 90px">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <div class="checkout-area">
        
         <form action="{{route('test')}}" method="post">
          @csrf
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
             <div class="col-md-8">
               <div class="checkout-left">
                 <div class="panel-group" id="accordion">
                  
                   <!-- Shipping Address -->
                   <div class="panel panel-default aa-checkout-billaddress">
                     <div class="panel-heading">
                       <h4 class="panel-title">
                         <a data-toggle="collapse" data-parent="#accordion">
                           User Details Address
                         </a>
                       </h4>
                     </div>
                     <div id="collapseFour" class="panel-collapse collapse in">
                       <div class="panel-body">
                        <div class="row">
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder=" Name*" value="" name="name" required>
                             </div>                             
                           </div>
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="email" placeholder="Email Address*" value="" name="email" required>
                             </div>                             
                           </div>
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="tel" placeholder="Phone*" value="" name="phone" required>
                             </div>
                           </div>
                         </div> 
                           
                           <br>
                         <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <textarea cols="8" rows="3" placeholder="address" name="address" required></textarea>
                             </div>                             
                           </div>                            
                         </div>   
                         <br>
                         <div class="row">
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder="City / Town*" value="" name="city" required>
                             </div>
                           </div>
             <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder="State*" value="" name="state" required>
                             </div>                             
                           </div>
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder="Postcode / ZIP*" value="" name="pincode" required>
                             </div>
                           </div>
                         </div>   
                                      
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-md-4">
               <div class="checkout-right">
                 <h4>Order Summary</h4>
                 <div class="aa-order-summary-area">
                   <table class="table table-responsive">
                     <thead>
                       <tr>
                        
                         <th>Product</th>
                         <th>Total</th>
                       </tr>
                     </thead>
                     <tbody>
                      
                    @php $total = 0; @endphp
                      @if(auth()->user()) 
                      @foreach ($checkout as $checkout)
                        @php
                        
                        $grandtotal = $checkout->price * $checkout->quantity;
                        @endphp
                       <tr>
                        
                         <td>  <strong>{{ $checkout->menu_name }} x  {{ $checkout->quantity }}</strong>
                         <br/>
                         <span class="cart_color"></span>
                         </td>
                         <td>{{$grandtotal}}</td>
                       </tr>
                       @php $total = intVal($grandtotal)+ intVal($total); @endphp
                   @endforeach
                   @endif
                     </tbody>
                     <tfoot>
                      <tr class="hide show_coupon_box">
                        <th>Coupon Code <a href="javascript:void(0)" onclick="remove_coupon_code()" class="remove_coupon_code_link">Remove</a></th>
                        <td id="coupon_code_str"></td>
                      </tr>
                        <tr>
                         
                         <th>Total</th>
                         <td id="total_price">Rs. {{$total}} </td>
                       </tr>
                     </tfoot>
                   </table>
                 </div>
         <h4>Coupon Code</h4>
                 <div class="aa-payment-method coupon_code">                    
                   <input type="text" placeholder="Coupon Code" class="aa-coupon-code apply_coupon_code_box" name="coupon_code" id="coupon_code">
         <input type="button" value="Apply Coupon" class="aa-browse-btn apply_coupon_code_box" onclick="applyCouponCode()" >           
           <div id="coupon_code_msg"></div>     
        </div>
         <br/>
              <input type="hidden" name="total_amount" value="{{$total}}">
                  <br>
                   {{-- <input type="submit" value="Place Order" class="aa-browse-btn"> --}}
                   <button type="submit" class="aa-browse-btn">Place holder</button>                
                  
                  </div>
               </div>
             </div>
             @csrf
           </div>
          
         </form>
        </div>
      </div>
    </div>
  </div>
</section>
		


<script>
  function applyCouponCode(){
    jQuery('#coupon_code_msg').html('');
    var coupon_code=jQuery('#coupon_code').val();
    if(coupon_code!=''){
      jQuery.ajax({
        type:'post',
        url: "{{url('/apply_coupon_code')}}",
        data: 'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
        success:function(result){
         if(result.status=='success'){
            jQuery('.show_coupon_box').removeClass('hide');
            jQuery('#coupon_code_str').html(coupon_code);
            jQuery('#total_price').html(result.totalprice);
            jQuery('.apply_coupon_code_box').hide();
          }else{
          
         
         }
         jQuery('#coupon_code_msg').html(result.msg);
        }
      });
    }else{
      jQuery('#coupon_code_msg').html('Please enter coupon_code');
    }
}
function remove_coupon_code(){
  jQuery('#coupon_code_msg').html('');
  var coupon_code=jQuery('#coupon_code').val();
  if(coupon_code!=''){
      jQuery.ajax({
        type:'post',
        url: "{{url('/remove_coupon_code')}}",
        data: 'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
        success:function(result){
         if(result.status=='success'){
            jQuery('.show_coupon_box').addClass('hide');
            jQuery('#coupon_code_str').html();
            jQuery('#total_price').html(result.totalprice);
            jQuery('.apply_coupon_code_box').show();
          }else{
          
         
         }
         jQuery('#coupon_code_msg').html(result.msg);
        }
      });
    }else{
      jQuery('#coupon_code_msg').html('Please enter coupon_code');
    }
}
</script>
   
  
 

@endsection
                           
