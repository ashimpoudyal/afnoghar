<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomCategory;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    // Booking Index
    public function booking(){
        Session::put('admin_page', 'booking');
        $bookings = Booking::latest()->get();
        return view ('admin.booking.index', compact('bookings'));
    }




     // Add Booking
    public function add(){
        return view ('admin.booking.add');
    }






    // Store Booking
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'email'=>'required',
            'phone'=>'required',
            'mobile'=>'required',
            'total_adults'=>'required',
            'total_children'=>'required',
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
            'total_children.required'=>'Childrens ',
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
        $bookings->total_childrens = $data['total_children'];
        $bookings->room_id = $data['room_id'];
        $bookings->arrival_date = $data['checkin_date'];
        $bookings->departure_date = $data['checkout_date'];
        
        $bookings->message = "-";


        
        
         if (empty($data['status'])){
            $bookings->status = 0;
        } else {
            $bookings->status = 1;
        
        }

        

        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;


       
        $bookings->save();

        $email = $data['email'];

         $messageData = [
               'email' => strtolower($data['email']),
               'name' => ucwords(strtolower($data['name'])),
              'address' => $data['address'],
                'phone' => $data['phone'],
                'room_id' => $data['room_id'],
                'checkin_date' => $data['checkin_date'],
               'checkout_date' => $data['checkout_date'],
               'total_adults' => $data['total_adults'],
               'total_children' => $data['total_children'],
               
              

            ];

            Mail::send('emails.booking-mail', $messageData, function ($message) use ($email){
                $message->to($email)->subject('Booking Confirmation Mail');
            });
       
        Session::flash('success_message', 'Booking Has Been Added Successfully Please See Your Mail for Confirmation');
        return redirect()->back();

    }






    //Check Available Roomms
    public function available_rooms(Request $request , $checkin_date){
    	$arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");


      $data=[];
        foreach($arooms as $room){
            $roomTypes=RoomCategory::find($room->category_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }
    	

    	return response()->json(['data'=>$data]);
    }








    //Front Booking Controller

    // public function frontbooking(){
    //     return view('front.frontbooking');
    // }



     public function frontbooking(){
        $rooms = Room::latest()->get();

        return view('front.booking',compact('rooms'));
    }

}
