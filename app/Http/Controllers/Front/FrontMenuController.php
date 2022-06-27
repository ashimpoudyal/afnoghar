<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Menu;
use Illuminate\Support\Str;
use DB;
use App\Models\Coupon;
use App\Models\Cart;
use App\Models\MenuCategory;

use stdClass;
class FrontMenuController extends Controller
{
       public function foodmenuByCategory($cat){

            // if($cat == 'beverages'){
            //     Session::put('front_page', 'beverages');

            //     $beverages = Menu::where('category_id', 1)->latest()->get();
            //     $hotbeverages = Menu::where('category_id', 16)->latest()->get();
            //     $coldbeverages = Menu::where('category_id', 17)->latest()->get();

            //     return view('front.beverage-menu',compact('hotbeverages','coldbeverages','beverages'));
            // }

            if($cat == 'breakfast'){
                Session::put('front_page', 'breakfast');

                $breakfast = Menu::where('category_id', 2)->latest()->get();

                $hotbeverages = Menu::where('category_id', 16)->latest()->get();
                
                $kidsBreakfast = Menu::where('category_id', 25)->latest()->get();

                return view('front.breakfast-menu',compact('breakfast','hotbeverages','kidsBreakfast'));
            }

            if($cat == 'dinner'){
                Session::put('front_page', 'dinner');

                $dinner = Menu::where('category_id', 3)->latest()->get();
                $sides = Menu::where('category_id', 10)->latest()->get();
                $chefs = Menu::where('category_id', 9)->latest()->get();
                $entree = Menu::where('category_id', 8)->latest()->get();
                $bread = Menu::where('category_id', 7)->latest()->get();
                $main = Menu::where('category_id', 12)->latest()->get();
                
                $kidsDinner = Menu::where('category_id', 27)->latest()->get();
                

                return view('front.dinner-menu',compact('dinner','sides','chefs','entree','bread','main','kidsDinner'));
            }

            if($cat == 'wine'){
                Session::put('front_page', 'wine');

                $wine = Menu::where('category_id', 4)->latest()->get();
                $sparkling = Menu::where('category_id', 14)->latest()->get();
                $white = Menu::where('category_id', 15)->latest()->get();
                 $rose = Menu::where('category_id', 18)->latest()->get();
                 $medium = Menu::where('category_id', 19)->latest()->get();
                 $full = Menu::where('category_id', 20)->latest()->get();
                  $soft = Menu::where('category_id', 21)->latest()->get();

                  return view('front.wine-menu',compact('wine','sparkling','white','rose','medium','full','soft'));

            }

            if($cat == 'lunch'){
                Session::put('front_page', 'lunch');
                
                $lunch = Menu::where('category_id', 11)->latest()->get();
                 $seefood = Menu::where('category_id', 22)->latest()->get();
                 $old = Menu::where('category_id', 23)->latest()->get();
                 
                 $lunchSpecial = Menu::where('category_id', 13)->latest()->get();

                 return view('front.lunch-menu',compact('lunch','seefood','old','lunchSpecial'));
            }

        }


        public function foodmenuTest(){

            Session::put('front_page', 'menu');


            //Beverages
             $beverages = Menu::where('category_id', 1)->latest()->get();
            $hotbeverages = Menu::where('category_id', 16)->latest()->get();
            $coldbeverages = Menu::where('category_id', 17)->latest()->get();

            //Breakfast
            $breakfast = Menu::where('category_id', 2)->latest()->get();

            //Dinner 
             $dinner = Menu::where('category_id', 3)->latest()->get();
            $sides = Menu::where('category_id', 10)->latest()->get();
            $chefs = Menu::where('category_id', 9)->latest()->get();
            $entree = Menu::where('category_id', 8)->latest()->get();
            $bread = Menu::where('category_id', 7)->latest()->get();
            $main = Menu::where('category_id', 12)->latest()->get();


              //Wine
            $wine = Menu::where('category_id', 4)->latest()->get();
            $sparkling = Menu::where('category_id', 14)->latest()->get();
            $white = Menu::where('category_id', 15)->latest()->get();
             $rose = Menu::where('category_id', 18)->latest()->get();
             $medium = Menu::where('category_id', 19)->latest()->get();
             $full = Menu::where('category_id', 20)->latest()->get();
              $soft = Menu::where('category_id', 21)->latest()->get();





            //Lunch Items
             $lunch = Menu::where('category_id', 11)->latest()->get();
            $starter = Menu::where('category_id', 5)->latest()->get();
            $sandwitches = Menu::where('category_id', 6)->latest()->get();
            $salad = Menu::where('category_id', 13)->latest()->get();
             $seefood = Menu::where('category_id', 22)->latest()->get();
             $old = Menu::where('category_id', 23)->latest()->get();

                //Extra field not required
             //Breads
            $breads = Menu::where('category_id', 7)->latest()->get();


            //Entrees
            $entrees = Menu::where('category_id', 8)->latest()->get();


             //Chef speaciality
            // $speaciality = Menu::where('category_id', 9)->latest()->get();


            //ALl Menu
            $all = Menu::latest()->get();

            $category_all =MenuCategory::where('status', 1)->where('parent_id', 0)->latest()->take(2)->orderBy('order','DESC')->get();

            // $menu = Menu::latest()->take(10)->get();
            $menucontent = Menu::latest()->get();
         


         return view('front.foodmenu-test',compact('category_all','menucontent','hotbeverages','breakfast','sides','sandwitches','bread','entrees','speaciality','lunch','all','coldbeverages','sparkling','white','chefs','entree','main','starter','salad','seefood','old','rose','medium','full','soft','beverages','dinner','wine'));

        }


         public function foodmenu(){




            Session::put('front_page', 'menu');


            //Beverages
             $beverages = Menu::where('category_id', 1)->latest()->get();
            $hotbeverages = Menu::where('category_id', 16)->latest()->get();
            $coldbeverages = Menu::where('category_id', 17)->latest()->get();


            //Breakfast
            $breakfast = Menu::where('category_id', 2)->latest()->get();



            //Dinner 
             $dinner = Menu::where('category_id', 3)->latest()->get();
            $sides = Menu::where('category_id', 10)->latest()->get();
            $chefs = Menu::where('category_id', 9)->latest()->get();
            $entree = Menu::where('category_id', 8)->latest()->get();
            $bread = Menu::where('category_id', 7)->latest()->get();
            $main = Menu::where('category_id', 12)->latest()->get();




              //Wine
            $wine = Menu::where('category_id', 4)->latest()->get();
            $sparkling = Menu::where('category_id', 14)->latest()->get();
            $white = Menu::where('category_id', 15)->latest()->get();
             $rose = Menu::where('category_id', 18)->latest()->get();
             $medium = Menu::where('category_id', 19)->latest()->get();
             $full = Menu::where('category_id', 20)->latest()->get();
              $soft = Menu::where('category_id', 21)->latest()->get();





            //Lunch Items
             $lunch = Menu::where('category_id', 11)->latest()->get();
            $starter = Menu::where('category_id', 5)->latest()->get();
            $sandwitches = Menu::where('category_id', 6)->latest()->get();
            $salad = Menu::where('category_id', 13)->latest()->get();
             $seefood = Menu::where('category_id', 22)->latest()->get();
             $old = Menu::where('category_id', 23)->latest()->get();





           





//Extra field not required
             //Breads
            $breads = Menu::where('category_id', 7)->latest()->get();


            //Entrees
            $entrees = Menu::where('category_id', 8)->latest()->get();


             //Chef speaciality
            $speaciality = Menu::where('category_id', 9)->latest()->get();


            //ALl Menu
            $all = Menu::latest()->get();







            $category_all =MenuCategory::where('status', 1)->where('parent_id', 0)->latest()->take(2)->orderBy('order','DESC')->get();

            // $menu = Menu::latest()->take(10)->get();
            $menucontent = Menu::latest()->get();
         


         return view('front.foodmenu',compact('category_all','menucontent','hotbeverages','breakfast','sides','sandwitches','bread','entrees','speaciality','lunch','all','coldbeverages','sparkling','white','chefs','entree','main','starter','salad','seefood','old','rose','medium','full','soft','beverages','dinner','wine'));

     }

     public function addToCart(Request $request)
    {
        Session::forget('cart');
        $menu = Menu::where('id',$request->id)->first();

            $quantity = 1;

        if (auth()->user()) {
            $id = auth()->user()->id;
          

            $existUserProductCart = Cart::where('user_email', auth()->user()->email)->where('menu_id', $request->id)->first();
            
            if ($existUserProductCart) {
               
                    Cart::where('user_email', auth()->user()->email)->where('menu_id', $request->id)->increment(
                        'quantity',
                        1
                    );

                    Session::flash('success_message', 'Item Has Been Updated Successfully');                
            } else {
                $cart = new Cart();
                $cart->user_email = auth()->user()->email;
                $cart->menu_id = $request->id;
                $cart->image = $menu->image;
                $cart->menu_name = $menu->name;
                $cart->price = $menu->sellingprice;
                $cart->quantity = 1;
                $cart->save();

                Session::flash('success_message', 'Item Has Been Added Successfully');            }
        } else {
            $data = new stdClass;
            $data->quantity = 1;
            $data->price = $menu->sellingprice;
            $data->menu_name = $menu->name;
            $data->menu_id = $request->id;

            if (session()->has('cart')) {
                $foundInCart = false;
                $cart = collect();

                foreach (session()->get('cart') as $key => $cartItem) {
                    if ($cartItem->menu_id == $request->id) {
                        $foundInCart  = true;
                        $cartItem->quantity = $cartItem->quantity + 1;
                        $cart->push($cartItem);
                    } else {
                        $cart->push($cartItem);
                    }
                }

                


                if (!$foundInCart) {
                    $cart->push($data);
                }
                session()->put('cart', $cart);
            } else {
                $cart = collect([$data]);
                $request->session()->put('cart', $cart);
            }

            Session::flash('success_message', 'Item Has Been Added Successfully');  
        }

        $value = $request->session()->get('key');
        

    }

    public function updateCart(Request $request){
       

            if(auth()->user()){
                Cart::where('user_email', auth()->user()->email)->where('menu_id', $request->menu_id)->update([
                    'quantity' => $request->quantity
                    
                ]);
            }

            if (session()->get('cart')) {
            $cart = collect();
            foreach (session()->get('cart') as $key => $cartItem) {
                if ($cartItem->menu_id == $request->menu_id) {
                    $foundInCart  = true;
                    $cartItem->quantity = $request->quantity;
                    $cart->push($cartItem);
                } else {
                    $cart->push($cartItem);
                }
            }




            if (!$foundInCart) {
                $cart->push($data);
            }
            session()->put('cart', $cart);
            } else {
            $cart = collect([$data]);
            $request->session()->put('cart', $cart);
            }

            Session::flash('success_message', 'Item Has Been Added Successfully');  


            $value = $request->session()->get('key');
            }



    

    

      // Add to Cart
    public function addToCartOld(Request $request){

        return $request;


         Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $veg = Menu::orderby('order','ASC')->where('type','Veg')->get();
         $nonveg = Menu::orderby('order','ASC')->where('type','Non-Veg')->get();

    	if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);


            if (empty($data['user_email'])){
                $data['user_email'] = "";
            }



            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Str::random(40);
                Session::put('session_id', $session_id);
            }



              $countMenuss = DB::table('carts')->where(['menu_id' => $data['menu_id'], 'session_id' => $session_id])->count();
            if($countMenuss > 0){
                return redirect()->back()->with('success_message', 'Item already exist in cart');
            } else {


                $cart = new Cart();
                $cart->menu_id = $data['menu_id'];
                $cart->menu_name = $data['menu_name'];
                $cart->price = $data['price'];
                $cart->quantity = $data['quantity'];
                $cart->user_email = $data['user_email'];
                $cart->session_id = $session_id;
                $cart->save();

                Session::flash('success_message', 'Item Has Been Added Successfully');

               

        }

         return view('front.foodmenu',compact('veg','nonveg'));

    }

}





     //View Cart
    public function cart(){
    	$session_id = Session::get('session_id');
        $userCart = DB::table('carts')->where(['session_id' => $session_id])->get();
    	foreach($userCart as $key => $menu){
            $menuDetails = Menu::where('id', $menu->menu_id)->first();
            $userCart[$key]->image = $menuDetails->image;
        }
         $page_name="cart";

        return view ('front.cart', compact('userCart','page_name'));

    
    }







    // Delete Cart Items
    public function deleteCart($id){
        $menu = Menu::first();
        Cart::where('id', $menu->id)->delete();

        if (auth()->user()) {
            $menu = Menu::first();
            Cart::where('user_email', auth()->user()->email)->where('id', $id)->delete();
           return redirect()->back();
        }
        

        if (session()->get('cart')) {
            
            $cart = session()->get('cart', collect([]));
            $cart->forget($id);
            session()->put('cart', $cart);
            return redirect()->back();
        }
        }
        
    
    



    //     if (session()->has('carts')) {
            
    //         session()->delete('carts');
    //     }else{

    //         DB::table('carts')->where('id',$id)->delete();

    //     }
        
    //   return redirect()->back();
    

   
    





     //Update Cart Quantity
    public function updateCartQuantity($id = null, $quantity = null){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $getCartDetails = DB::table('carts')->where('id', $id)->first();
        $updated_quantity = $getCartDetails->quantity + $quantity;

        // if($getAttributeStock->stock >= $updated_quantity){
            DB::table('carts')->where('id', $id)->increment('quantity', $quantity);
            return redirect()->back()->with('success_message', 'Item Has Been Updated in the Cart');
        // } else {
        //     return redirect()->back()->with('flash_message_error', 'Product Required Quantity is out of stock');

        // }


    }


public function apply_coupon_code(Request $request){
    $total = 0;
    $result=DB::table('coupons')
        ->where(['coupon_code'=>$request->coupon_code])
        ->get();

        
    
        if(isset($result[0])){
            $value=$result[0]->amount;
            $type=$result[0]->amount_type;
            if($result[0]->status==1){
               
               
                $status="success";
                $msg = "Coupon code applied";
            }else{
                $status="error";
                $msg = "Coupon code deactivated";
            }
            
        }else{
            $status="error";
            $msg = "Valid";
        }
        if (session()->has('cart')) {
                   
            foreach (session()->get('cart') as $key => $cartItem) {
               
                $grandtotal = $cartItem->price * $cartItem->quantity;
                $total = intVal($grandtotal)+ intVal($total);
            
        
        if($status=='success'){
            echo "1";
            if($type=='Fixed'){
               
                        $total=$total-$value; 
                        echo "2";  
                    }if($type=='percentage'){
                        $total=($value/100)*$total;
                        echo "3";
                    }
                    }
            }
        }
        if(auth()->user()){
            $cartItems = Cart::where('user_email', auth()->user()->email)->get();
          
            
        
        if($status=='success'){
            foreach ($cartItems as $key => $cartItem) {
               
                $grandtotal = $cartItem->price * $cartItem->quantity;
                $total = intVal($grandtotal)+ intVal($total);
                
           
            if($type=='Fixed'){
               
                        $total=$total-$value; 
                         
                    }if($type=='percentage'){
                        $newPrice=($value/100)*$total;
                       $total=round($total-$newPrice);
                    }
                    }
            }
        
    }
        return response()->json(['status'=>$status,'msg'=>$msg, 'totalprice'=>$total]);
}

public function remove_coupon_code(Request $request){
    $total = 0;
    $result=DB::table('coupons')
        ->where(['coupon_code'=>$request->coupon_code])
        ->get();

         if (session()->has('cart')) {
                   
            foreach (session()->get('cart') as $key => $cartItem) {
               
                $grandtotal = $cartItem->price * $cartItem->quantity;
                $total = intVal($grandtotal)+ intVal($total);
            }
        }
        if(auth()->user()){
            $cartItems = Cart::where('user_email', auth()->user()->email)->get();
          
            
        
        
            foreach ($cartItems as $key => $cartItem) {
               
                $grandtotal = $cartItem->price * $cartItem->quantity;
                $total = intVal($grandtotal)+ intVal($total);
            }
        }
    
        
            
        return response()->json(['status'=>'Success','msg'=>'coupon code removed', 'totalprice'=>$total]);
            }
    }








    // Coupons
    // public function applyCoupon(Request $request){
    //     $data = $request->all();
    //     $couponCount = Coupon::where('coupon_code', $data['coupon_code'])->count();
    //     if($couponCount == 0){
    //         return redirect()->back()->with('success_message', 'Invalid Coupon Code');
    //     } else {

    //         // echo "Success"; die;

       
    //         $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first();
    //         // If Coupon is InActive
    //         if($couponDetails->status == 0){
    //             return redirect()->back()->with('success_message', 'Coupon is Not Active Right Now');
    //         }

    //         // If Coupon Is Expired
    //         $expiry_date = $couponDetails->expiry_date;
    //         $current_date = date('Y-m-d');
    //         if($expiry_date < $current_date){
    //             return redirect()->back()->with('success_message', 'Coupon has been Expired');

    //         }

    //         $session_id = Session::get('session_id');
    //         // Getting Total Amount for Cart
    //         $userCart = DB::table('carts')->where(['session_id' => $session_id])->get();
    //         $total_amount = 0;
    //         foreach ($userCart as $item){
    //             $total_amount = $total_amount + ($item->price * $item->quantity);
    //         }

    //         if($couponDetails->amount_type == "Fixed"){
    //             $couponAmount = $couponDetails->amount;
    //         } else {
    //             $couponAmount = $total_amount * ($couponDetails->amount / 100);
    //         }

    //         Session::put('CouponAmount', $couponAmount);
    //         Session::put('CouponCode', $data['coupon_code']);
    //         return redirect()->back()->with('success_message', 'Coupon has been applied');


    


    //     }

        
    // }



















