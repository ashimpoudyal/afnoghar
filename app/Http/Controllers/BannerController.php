<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
     // Banner Category 
     public function banner(){
         $banners = Banner::latest()->get();
         return view ('admin.banner.index', compact('banners'));
     }


      // Add Banner 
    public function add(){
       $banners = Banner::latest()->get();
        return view ('admin.banner.add', compact('banners'));
    }





    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
             'image.required' => 'Image is required',
        ];
        $this->validate($request, $rules, $customMessages);
        $banners = new Banner();
        $banners->title = $data['title'];
        $banners->slug = Str::slug($data['title']);

         $banners->button1 = $data['button1'];
        $banners->button2 = $data['button2'];
        $banners->sub_title = $data['sub_title'];

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/banner/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $banners->image = $filename;
            }
        }
        




        $banners->save();
        Session::flash('success_message', 'Banner Has Been Added Successfully');
        return redirect()->back();

    }



    // Edit Banner
    public function edit($id){
        Session::put('admin_page', 'banner');
        $banners = Banner::findOrFail($id);
        return view ('admin.banner.edit', compact('banners'));
    }




     // Update
   public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
             
        ];
        $this->validate($request, $rules, $customMessages);
        $banners = Banner::findOrFail($id);
        $banners->title = $data['title'];
        $banners->slug = Str::slug($data['title']);

         $banners->button1 = $data['button1'];
        $banners->button2 = $data['button2'];
        $banners->sub_title = $data['sub_title'];

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/banner/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $banners->image = $filename;
            }
        }
        




        $banners->save();

        Session::flash('success_message', 'Banner Has Been Updated Successfully');
        return redirect()->back();

    }


     // Delete Category
    public function deleteCategory($id){
         $banners = Banner::findOrFail($id);
         $banners->delete();


           $image_path = 'public/uploads/banner/';
         if(!empty($banners->image)){
             if(file_exists($image_path.$banners->image)){
                 unlink($image_path.$banners->image);
             }
         }
        Session::flash('success_message', 'Banner Has Been deleted Successfully');
        return redirect()->back();
    }













}
