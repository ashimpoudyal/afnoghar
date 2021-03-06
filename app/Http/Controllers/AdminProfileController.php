<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    // Admin Profile
    public function profile(){
        $admin = Auth::guard('admin')->user();
        return view ('admin.profile', compact('admin'));
    }


    // Admin Edit Profile
    public function editprofile(){
        $admin = Auth::guard('admin')->user();
        return view ('admin.editprofile', compact('admin'));
    }



    // Update Profile
    public function updateProfile(Request $request, $id){
        $data = $request->all();
        $rule = [
           'fname' => 'required|max:255',
           'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required',
            

        ];
        $customMessages = [
           'fname.required'  => 'Please enter the  First Name',
           'fname.max'  => 'You are not allowed to enter more than 255 characters',
           'lname.required'  => 'Please enter the Last Name',
           'lname.max'  => 'You are not allowed to enter more than 255 characters',
           'email.required'  => 'Please enter email address',
           'email.max'  => 'You are not allowed to enter more than 255 characters',
           'email.email'  => 'Please enter a valid email address',
            'phone.required'  => 'Please enter phone',
            'address.required'  => 'Please enter address',
        ];
        $this->validate($request, $rule, $customMessages);
        $admin_id = Auth::guard('admin')->user()->id;
        $admin = Admin::findOrFail($admin_id);
        $admin->fname = $data['fname'];
        $admin->lname = $data['lname'];
        $admin->email = $data['email'];
        $admin->phone = $data['phone'];
        $admin->address = $data['address'];
        $admin->city = $data['city'];
        $admin->zip = $data['zip'];
        $admin->country = $data['country'];
        $admin->facebook = $data['facebook'];
        $admin->instagram = $data['instagram'];
        
        $admin->twitter = $data['twitter'];
        $admin->linkedin = $data['linkedin'];
         $admin->about = $data['about'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/admin/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $admin->image = $filename;
            }
        }

        $admin->save();
        Session::flash('success_message', 'Admin Profile Has Been Updated Successfully');
        return redirect()->back();

    
    }

// Checking Current Password
    public function chkUserPassword(Request  $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id', $user_id)->first();
        if(Hash::check($current_password, $check_password->password)){
            return "true"; die;
        } else {
            return "false"; die;
        }
    }

    // Change Admin Password
    public function updatePassword(Request $request, $id){
        $validateData = $request->validate([
           'current_password' => 'required|max:255|min:6',
           'password' => 'required|min:6',
           'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $current_user_password = $user->password;
        $data = $request->all();
        if(Hash::check($data['current_password'], $current_user_password)){
            $user->password = bcrypt($data['password']);
            $user->save();
            Session::flash('success_message', 'Admin Password Has Been Updated Successfully');
            return redirect()->back();
        } else {
            Session::flash('error_message', 'Your Current Password Does not Match with our database');
            return redirect()->back();
        }
    }
}
