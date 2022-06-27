<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   // Login Page
    public function frontLogin(){
        return view ('front.auth.login');
    }




   




    //login page redirection
     public function loginUser(Request $request){
        $ids = getUserCartMenuIds();
     
        //     $data = $request->all();
    //     // Validation
        $request->validate ([
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        $userInfo = User::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','we donot recognize your mail');
        }else{

            $credentials = [
                "email" => $request->email,
                "password" => $request->password
            ];
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                if (session()->has('cart')) {
                    foreach (session()->get('cart') as $key => $sessionCart) {
                        if (in_array($sessionCart->menu_id, $ids)) {
                            Cart::where('user_email', auth()->user()->email)->where('menu_id', $sessionCart->menu_id)->increment('quantity', $sessionCart->quantity);
                        } else {
                            $cart = new Cart();
                            $cart->user_email = auth()->user()->email ?? 'None';
                            $cart->menu_id = $sessionCart->menu_id;
                            $cart->menu_name = $sessionCart->menu_name;
                            $cart->menu_name = $sessionCart->menu_name;
                            $cart->quantity = $sessionCart->quantity;
                            $cart->price = $sessionCart->price;
                            $cart->save();
                        }
                    }
    
                    session()->forget('cart');
                }
                $request->session()->put('loggedUser',$userInfo->id);
                return redirect('cartdetails');
            }else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }


   
         // Logout
    public function frontUserLogout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/user/login');
    }








    // Register Page
    public function register(){
        Session::put('front_page', 'register');
        return view ('front.auth.register');
    }



 // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }




    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();



        $this->_registerOrLoginUser($user);

        // Return index after login
        return redirect()->route('cart');
    }






    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $this->_registerOrLoginUser($user);

        // Return index after login
        return redirect()->route('cart');
    }
























     protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }









    // Register User
    public function registerUser(Request $request){
        $data = $request->all();
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];
        $customMessages = [
            'email.required' => 'Email address cannot be left empty',
            'email.email' => 'You must provide a valid email address',
            'email.max' => 'You are not allowed to enter more than 255 characters for email',
            'password.required' => 'Password cannot be left empty',
        ];
        $this->validate($request, $rules, $customMessages);

        $userCount = User::where('email', $data['email'])->count();
        if($userCount > 0){
            Session::flash('error_message', 'Email Address already exists in our database');
            return redirect()->back();
        } 
        else {

           $user = new User();
           $user->email = $data['email'];
           $user->password = bcrypt($data['password']);
           $user->save();


           
          //sending mail code
           $email = $data['email'];
           $messageData = [
               'email' => strtolower($data['email']),
               'code' => base64_encode($data['email'])
           ];
           Mail::send('emails.verify', $messageData, function ($message) use ($email){
               $message->to($email)->subject('Email Verification Message');
           });



           Session::flash('success_message', 'New User Has Added Successfully');
           return redirect()->back();
        }
    }










    public function confirmAccount($email){
        $email = base64_decode($email);
        $userCount = User::where('email', $email)->count();
        if($userCount > 0){
            $userDetails = User::where('email', $email)->first();
            if($userDetails->verified == 1){
                Session::flash('error_message', 'Email Address already verified');
                return redirect()->back();
            } else {
                User::where('email', $email)->update(['verified' => 1]);
                // Send Welcome Email
                $messageData = [
                    'email' => $email,
                ];
                Mail::send('emails.welcome', $messageData, function ($message) use ($email){
                    $message->to($email)->subject('Welcome To our Site');
                });

                return redirect('login')->with('success_message', 'Your email has  been verified successfully');
            }
        } else {
            abort(404);
        }


    }
}










