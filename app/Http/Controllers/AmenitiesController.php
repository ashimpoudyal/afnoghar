<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AmenitiesController extends Controller
{
   // Amenities Category 
     public function amenities(){
         $amenities = Amenities::latest()->get();
         return view ('admin.amenities.index', compact('amenities'));
     }




      // Add Amenities 
    public function add(){
       $amenities = Amenities::latest()->get();
        return view ('admin.amenities.add', compact('amenities'));
    }





    // Store Amenities
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'image' => 'required',

        ];
        $customMessages = [
            'name.required' => 'Name is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $amenities = new Amenities();
        $amenities->name = $data['name'];
        $amenities->order = $data['order'];
        $amenities->description = $data['description'];

        

        

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/amenities/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $amenities->image = $filename;
            }
        }


        $amenities->save();
        Session::flash('success_message', 'Amenities Has Been Added Successfully');
        return redirect()->back();

    }






    // Edit Amenities
    public function edit($id){
        $amenities = Amenities::findOrFail($id);
        return view ('admin.amenities.edit', compact('amenities'));
    }






    // Update Amenities
       public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',

        ];
        $customMessages = [
            'name.required' => 'Name is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $amenities = Amenities::findOrFail($id);
        $amenities->name = $data['name'];
        $amenities->order = $data['order'];
        $amenities->description = $data['description'];

        

        

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/amenities/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $amenities->image = $filename;
            }
        }


        $amenities->save();
        Session::flash('success_message', 'Amenities Has Been Updated Successfully');
        return redirect()->back();

    }




    // Delete Amenities
    public function delete($id){
         $amenities = Amenities::findOrFail($id);
         $amenities->delete();


           $image_path = 'public/uploads/amenities/';
         if(!empty($amenities->image)){
             if(file_exists($image_path.$amenities->image)){
                 unlink($image_path.$amenities->image);
             }
         }
        Session::flash('success_message', 'Amenities Has Been deleted Successfully');
        return redirect()->back();
    }









}
