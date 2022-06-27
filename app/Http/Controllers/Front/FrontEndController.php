<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\OurService;
use App\Models\Room;
use App\Models\Amenities;
use App\Models\Menu;
use App\Models\Booking;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\MenuCategory;
use App\Models\EventCategory;
use App\Models\EventGallery;
use App\Models\RoomCategory;
use App\Models\RoomCategoryGallery;
use App\Models\Category;

class FrontEndController extends Controller
{
    public function room(){
        $rooms = Room::latest()->get();

        return view('front.rooms',compact('rooms'));
    }
    public function service(){
        $services = OurService::latest()->get();

        return view('front.services',compact('services'));
    }
    public function about(){
        return view('front.about');
    }
    public function menu(){
        $categories = Category::where('parent', null)->where('is_deleted', 0)->with('children')->get();

        return view('front.menu',compact('categories'));

    }
    public function event(){
        $events = Event::latest()->get();
        return view('front.event',compact('events'));
    }
    public function amenities(){
        $amenities = Amenities::latest()->get();

        return view('front.amenities',compact('amenities'));
    }

    //Service Detail Controller
    public function serviceDetail($slug)
    {

        $service = OurService::where('slug',$slug)->first();

    
       return view('front.servicedetail',compact('service'));
    }

    
    //Room Detail Controller
    public function roomDetail($slug)
    {

        $room = Room::where('slug',$slug)->first();

        $roomcategory = RoomCategory::first();

       $roomgalleries = RoomCategoryGallery::where('category_id',$room->category_id)->latest()->get();
    
       return view('front.roomdetail',compact('room','roomgalleries','roomcategory'));
    }

    public function eventDetail($slug)
    {

        $event = Event::where('slug',$slug)->first();


    

       $eventgalleries = EventGallery::where('event_id',$event->id)->latest()->get();
    
       return view('front.eventdetails',compact('event','eventgalleries'));
    }


    
   
    

    public function menuSingle($slug){
        $menucategory=MenuCategory::where('slug',$slug)->first();
        $menu=Menu::where('category_id',$menucategory->id)->latest()->get();

        return view('front.menuSingle',compact('menucategory','menu'));


    }
    public function cartDetails(){
        // session()->forget('cart');
        $carts = Cart::latest()->get();
       
        return view('front.cartdetails',compact('carts'));
    }
    

    public function checkout(){
     
        $checkout = Cart::latest()->get();
        return view('front.checkout',compact('checkout'));
    
    }


    public function addRoom($id)
    {
        $room = Room::where('id',$id)->first();
        return view('front.booking',compact('room'));

    }
  


    public function storeRoom(Request $request){
        $data = $request->all();
        
        $rules = [
            'name' => 'required|max:255',
            'email'=>'required',
            'phone'=>'required',
            'mobile'=>'required',
            'total_adults'=>'required',
            
            'room_id'=>'required',
            'arrival_date'=>'required',
            'departure_date'=>'required',
            
        ];
        $customMessages = [
            'name.required' => ' Your Name  is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
            'email.required'=>'Please Enter Your Email',
            'phone.required'=>'Please Add Your Phone ',
            'mobile.required'=>'Please Add Your Mobile',
            'total_adults.required'=>'Adults ',
            
            'room_id.required'=>'Select Your Room ',
            'arrival_date.required'=>'Your Checkin Date ',
            'departure_date.required'=>'Your Checkout Date ',
            

            
        ];
        $this->validate($request, $rules, $customMessages);
        $bookings = new Booking();
        $bookings->name = $data['name'];
        $bookings->email = $data['email'];
        $bookings->phone = $data['phone'];
        $bookings->mobile = $data['mobile'];
        $bookings->city = $data['city'];
        $bookings->country = $data['country'];
        $bookings->total_adults = $data['total_adults'];
        $bookings->total_childrens = $data['total_childrens'];
        $bookings->room_id = $data['room_id'];
        $bookings->arrival_date = $data['arrival_date'];
        $bookings->departure_date = $data['departure_date'];
        
        $bookings->message = "-";


        
        
         if (empty($data['status'])){
            $bookings->status = 0;
        } else {
            $bookings->status = 1;
        
        }

        

        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;


       
        $bookings->save();

        // $email = $data['email'];

        //  $messageData = [
        //        'email' => strtolower($data['email']),
        //        'name' => ucwords(strtolower($data['name'])),
        //       'address' => $data['address'],
        //         'phone' => $data['phone'],
        //         'room_id' => $data['room_id'],
        //         'checkin_date' => $data['checkin_date'],
        //        'checkout_date' => $data['checkout_date'],
        //        'total_adults' => $data['total_adults'],
        //        'total_children' => $data['total_children'],
               
              

        //     ];

        //     Mail::send('emails.booking-mail', $messageData, function ($message) use ($email){
        //         $message->to($email)->subject('Booking Confirmation Mail');
        //     });
       
       
        return redirect()->back()->with('message', 'Booking is complete check mail for confirmation');
    }


    public function test(){
        dd('here');
    }

    public function checkoutStore(Request $request){
        dd('here');
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required',

            
        ];
        $customMessages = [
            'name.required' => ' Your Name  is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
            'email.required'=>'Please Enter Your Email',
            'phone.required'=>'Please Add Your Phone ',
            'address.required'=>'Address',
            
            'city.required'=>'Enter Your city ',
            'state.required'=>'Enter Your state ',
            'pincode.required'=>'Enter Your pincode ',

            
        ];
        $this->validate($request, $rules, $customMessages);
        $orders = new OrderItem();
        $orders->name = $data['name'];
        $orders->email = $data['email'];
        $orders->phone = $data['phone'];
        $orders->address = $data['address'];
        $orders->city = $data['city'];
        $orders->state = $data['state'];
        $orders->pincode = $data['pincode'];
        $orders->total_amount = $data['total_amount'];
        
        
        

        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;


       
        $orders->save();

        // $email = $data['email'];

        //  $messageData = [
        //        'email' => strtolower($data['email']),
        //        'name' => ucwords(strtolower($data['name'])),
        //       'address' => $data['address'],
        //         'phone' => $data['phone'],
        //         'room_id' => $data['room_id'],
        //         'checkin_date' => $data['checkin_date'],
        //        'checkout_date' => $data['checkout_date'],
        //        'total_adults' => $data['total_adults'],
        //        'total_children' => $data['total_children'],
               
              

        //     ];

        //     Mail::send('emails.booking-mail', $messageData, function ($message) use ($email){
        //         $message->to($email)->subject('Booking Confirmation Mail');
        //     });
       
        return redirect()->back()->with('message', 'Order has proceded to checkout');
    }
    }

