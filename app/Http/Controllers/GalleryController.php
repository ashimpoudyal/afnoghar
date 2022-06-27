<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
     // Gallery Index 
     public function gallery(){
         $gallerys = Gallery::latest()->get();
         return view ('admin.gallery.index', compact('gallerys'));
     }



       // Add Gallery 
    public function add(){
       $gallerys = Gallery::get();
        return view ('admin.gallery.add', compact('gallerys'));
    }





    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Name is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
             'image.required' => 'Image is required',
        ];
        $this->validate($request, $rules, $customMessages);
        $gallerys = new Gallery();
        $gallerys->title = $data['title'];
  

   

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/gallery/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $gallerys->image = $filename;
            }
        }
        




        $gallerys->save();
        Session::flash('success_message', 'Gallery Has Been Added Successfully');
        return redirect()->back();

    }



     // Edit Gallery
    public function edit($id){
        Session::put('admin_page', 'banner');
        $gallerys = Gallery::findOrFail($id);
        return view ('admin.gallery.edit', compact('gallerys'));
    }




     // Update Gallery
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
        $gallerys = Gallery::findOrFail($id);
        $gallerys->title = $data['title'];
        
         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/gallery/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $gallerys->image = $filename;
            }
        }
        




        $gallerys->save();

        Session::flash('success_message', 'Gallery Has Been Updated Successfully');
        return redirect()->back();

    }


     // Delete Category
    public function delete($id){
         $gallerys = Gallery::findOrFail($id);
         $gallerys->delete();


           $image_path = 'public/uploads/gallery/';
         if(!empty($banners->image)){
             if(file_exists($image_path.$banners->image)){
                 unlink($image_path.$banners->image);
             }
         }
        Session::flash('success_message', 'Gallery Has Been deleted Successfully');
        return redirect()->back();
    }










}
