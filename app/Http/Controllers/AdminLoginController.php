<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminLoginController extends Controller
{
   
    // Admin Login
    public function adminLogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // Validation
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customMessage = [
                'email.required' => 'Email Address is required',
                'email.email' => 'Email Address is not valid email address',
                'email.max' => 'You are not allowed to enter more than 255 characters',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessage);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
                return redirect()->route('adminDashboard');
            } else {
                Session::flash('error_message', 'Invalid Username or Email');
                return redirect()->route('adminLogin');
            }

        }

        if (Auth::guard('admin')->check()){
            return redirect()->route('adminDashboard');
        } else {
            return view ('admin.auth.login');
        }

    }

    // Admin Dashboard
    public function dashboard(){
        Session::put('admin_page', 'dashboard');
        return view ('admin.dashboard');
    }


    // Admin Logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}