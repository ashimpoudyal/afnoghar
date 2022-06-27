<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ThemeController extends Controller
{
    // Theme
    public function theme(){
        Session::put('admin_page', 'theme');
        $theme = Theme::first();
        return view ('admin.theme.theme', compact('theme'));
    }

    public function themeUpdate(Request $request, $id){
        $data = $request->all();
        $theme = Theme::findOrFail($id);
        $theme->site_title = $data['site_title'];
        $theme->site_subtitle = $data['site_subtitle'];
        // $theme->about = $data['about'];
        // $theme->phone = $data['phone'];
        // $theme->address = $data['address'];
        // $theme->facebook = $data['facebook'];
        // $theme->instagram = $data['instagram'];
        // $theme->youtube = $data['youtube'];

        $random = Str::random(10);
        if($request->hasFile('logo')){
            $image_tmp = $request->file('logo');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/theme' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->logo = $filename;
            }
        }

        $currentDate = Carbon::now()->toDateString();

        $slug2 = "favicon";
        if($request->hasFile('favicon')){
            $image_tmp = $request->file('favicon');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug2 . '-' . $currentDate .  '.' . $extension;
                $image_path = 'public/uploads/theme' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->favicon = $filename;
            }
        }

        $theme->save();
        Session::flash('success_message', 'Theme Settings Has Been Updated Successfully');
        return redirect()->back();
    }


     public function aboutus(Request $request, $id){
        $data = $request->all();
        $theme = Theme::findOrFail($id);
        // $theme->site_title = $data['site_title'];
        // $theme->site_subtitle = $data['site_subtitle'];
        $theme->about = $data['about'];
        $theme->video = $data['video'];
        // $theme->aboutimage = $data['aboutimage'];

        // $theme->phone = $data['phone'];
        // $theme->address = $data['address'];
        // $theme->facebook = $data['facebook'];
        // $theme->instagram = $data['instagram'];
        // $theme->youtube = $data['youtube'];

        $random = Str::random(10);
        if($request->hasFile('aboutimage')){
            $image_tmp = $request->file('aboutimage');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/theme' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->aboutimage = $filename;
            }
        }

       
        $theme->save();
        Session::flash('success_message', 'About Us  Has Been Updated Successfully');
        return redirect()->back();
    }




    public function contactus(Request $request, $id){
        $data = $request->all();
        $theme = Theme::findOrFail($id);
       

        $theme->phone = $data['phone'];
        $theme->address = $data['address'];
        $theme->facebook = $data['facebook'];
        $theme->instagram = $data['instagram'];
        $theme->youtube = $data['youtube'];
        $theme->email = $data['email'];


       
        $theme->save();
        Session::flash('success_message', 'Contact Us  Has Been Updated Successfully');
        return redirect()->back();
    }





}
