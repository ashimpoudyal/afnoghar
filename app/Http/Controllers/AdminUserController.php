<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class AdminUserController extends Controller
{
   // Index Page
    public function index(){
    	 Session::put('admin_page', 'admin');
         $admin = Admin::latest()->get();

        

//for displaying only for admin
         $current_user=Auth::guard('admin') ->user();
       $user_id=$current_user->id;
       $admins=Admin::where('id', $user_id)->first();

       if($admins->role_id==1) {

         return view ('admin.admin.index', compact('admin'));


       }


       else{
         Session::flash('error_message', 'You dont have enough Permission');
            return redirect()->back();

       }


        
    }


    //add admin


    public function add(){

      //for adding only for admin

       $current_user=Auth::guard('admin') ->user();
       $user_id=$current_user->id;
       $admin=Admin::where('id', $user_id)->first();


       if($admin->role_id==1) {

        return view('admin.admin.add');

       }

       else{
         Session::flash('error_message', 'You dont have enough Permission');
            return redirect()->back();

       }

                                                




    	return view('admin.admin.add');
    }



    public function store(Request $request){
    	 $data = $request->all();
    	 $admin = new Admin();

         $validateData = $request->validate([
            'fname' => 'required|max:255',
           'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
           'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

         $adminCount = Admin::where('email', $data['email'])->count();
        if($adminCount > 0){
            Session::flash('error_message', 'User Email Already Exists in our Database');
            return redirect()->back();
        }

         

          $admin->fname = $data['fname'];
        $admin->lname = $data['lname'];
        $admin->email = $data['email'];
        $admin->phone = $data['phone'];
        $admin->address = $data['address'];
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


        $admin->password = bcrypt($data['password']);


         // Post ACL
        if (empty($data['post_c'])) {
            $admin->post_c = 0;
        } else {
            $admin->post_c = 1;
        }
        if (empty($data['post_r'])) {
            $admin->post_r = 0;
        } else {
            $admin->post_r = 1;
        }
        if (empty($data['post_u'])) {
            $admin->post_u = 0;
        } else {
            $admin->post_u = 1;
        }
        if (empty($data['post_d'])) {
            $admin->post_d = 0;
        } else {
            $admin->post_d = 1;
        }






        $admin->save();
        Session::flash('success_message', 'Admin Profile Has Been Updated Successfully');
        return redirect()->back();



    }


     public function edit($id){
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }














     public function update(Request $request , $id){
    	 $data = $request->all();
    	 $admin = Admin::findOrFail($id);

         $validateData = $request->validate([
            'fname' => 'required|max:255',
           'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

         
         

          $admin->fname = $data['fname'];
        $admin->lname = $data['lname'];
        $admin->email = $data['email'];
        $admin->phone = $data['phone'];
        $admin->address = $data['address'];
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


        if (!empty($data['password'])){
          if ($data['confirm_password'] != $data['password']){
              Session::flash('error_message', 'Your Confirm Password Must match');
              return redirect()->back();
          }
      }



        $admin->password = bcrypt($data['password']);


           // Post ACL
        if (empty($data['post_c'])) {
            $admin->post_c = 0;
        } else {
            $admin->post_c = 1;
        }
        if (empty($data['post_r'])) {
            $admin->post_r = 0;
        } else {
            $admin->post_r = 1;
        }
        if (empty($data['post_u'])) {
            $admin->post_u = 0;
        } else {
            $admin->post_u = 1;
        }
        if (empty($data['post_d'])) {
            $admin->post_d = 0;
        } else {
            $admin->post_d = 1;
        }






        $admin->save();
        Session::flash('success_message', 'Admin Profile Has Been Updated Successfully');
        return redirect()->back();



    }



     // Delete Category
    public function delete($id){
         $admin = Admin::findOrFail($id);
         $admin->delete();


           $image_path = 'public/uploads/banner/admin';
         if(!empty($admin->image)){
             if(file_exists($image_path.$admin->image)){
                 unlink($image_path.$admin->image);
             }
         }
        Session::flash('success_message', 'Admin Has Been deleted Successfully');
        return redirect()->back();
    }









}
