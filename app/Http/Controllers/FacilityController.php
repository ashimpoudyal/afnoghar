<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FacilityController extends Controller
{
     // Facility Index
    public function facility(){
        $facilities = Facility::latest()->get();
        return view ('admin.facility.index', compact('facilities'));
    }





     // Add Facility 
    public function add(){
       $facilities = Facility::latest()->get();
        return view ('admin.facility.add', compact('facilities'));
    }






    // Store Facility
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'image' => 'required',
            'description' => 'required',
            // 'file' => 'required|mimes:xls,xlsx.,pdf,jpg,png',

        ];
        $customMessages = [
            'name.required' => 'Title is required',
            'image.required' => 'Image is required',
            'description.required' => 'Description is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $facilities = new Facility();
        $facilities->name = $data['name'];
        $facilities->slug = Str::slug($data['name']);

         $facilities->excerpt = $data['excerpt'];
        $facilities->description = $data['description'];




         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/facility/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $facilities->image = $filename;
            }
        }
        

        $facilities->save();
        Session::flash('success_message', 'Facility Has Been Added Successfully');
        return redirect()->back();

    }






     // Edit Facility
    public function edit($id){
        $facilities = Facility::findOrFail($id);
        return view ('admin.facility.edit', compact('facilities'));
    }






      // Update Facility
    public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
            // 'file' => 'required|mimes:xls,xlsx.,pdf,jpg,png',

        ];
        $customMessages = [
            'name.required' => 'Title is required',
            'description.required' => 'Description is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $facilities = Facility::findOrFail($id);
        $facilities->name = $data['name'];
        $facilities->slug = Str::slug($data['name']);

         $facilities->excerpt = $data['excerpt'];
        $facilities->description = $data['description'];




         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/facility/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $facilities->image = $filename;
            }
        }
        

        $facilities->save();
        Session::flash('success_message', 'Facility Has Been Updated Successfully');
        return redirect()->back();

    }




     // delete Facility

    public function delete($id){
        $facilities = Facility::findOrFail($id);
        $facilities->delete();
        $image_path = 'public/uploads/facility/';
        if(!empty($services->image)){
            if(file_exists($image_path.$services->image)){
                unlink($image_path.$facilities->image);
            }
        }
        Session::flash('success_message', 'Facility Has Been deleted Successfully');
        return redirect()->back();
    }









}
