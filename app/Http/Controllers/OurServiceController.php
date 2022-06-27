<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class OurServiceController extends Controller
{
    // Service Index
    public function service(){
        $services = OurService::latest()->get();
        return view ('admin.service.index', compact('services'));
    }



     // Add Service 
    public function add(){
       $services = OurService::latest()->get();
        return view ('admin.service.add', compact('services'));
    }




     // Store Service
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            // 'file' => 'required|mimes:xls,xlsx.,pdf,jpg,png',

        ];
        $customMessages = [
            'name.required' => 'Title is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $services = new OurService();
        $services->name = $data['name'];
        $services->slug = Str::slug($data['name']);

         $services->excerpt = $data['excerpt'];
         $services->icon = $data['icon'];
        $services->description = $data['description'];




         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/service/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $services->image = $filename;
            }
        }
        

        $services->save();
        Session::flash('success_message', 'Service Has Been Added Successfully');
        return redirect()->back();

    }


     // Edit Service
    public function edit($id){
        $services = OurService::findOrFail($id);
        return view ('admin.service.edit', compact('services'));
    }




    // Update Service
    public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            // 'file' => 'required|mimes:xls,xlsx.,pdf,jpg,png',

        ];
        $customMessages = [
            'name.required' => 'Title is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $services = OurService::findOrFail($id);
        $services->name = $data['name'];
        $services->slug = Str::slug($data['name']);

         $services->excerpt = $data['excerpt'];
         $services->icon = $data['icon'];
        $services->description = $data['description'];




         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/service/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $services->image = $filename;
            }
        }
        

        $services->save();
        Session::flash('success_message', 'Service Has Been Updated Successfully');
        return redirect()->back();

    }


    // delete Service

    public function delete($id){
        $services = OurService::findOrFail($id);
        $services->delete();
        $image_path = 'public/uploads/notice/';
        if(!empty($services->image)){
            if(file_exists($image_path.$services->image)){
                unlink($image_path.$services->image);
            }
        }
        Session::flash('success_message', 'Service Has Been deleted Successfully');
        return redirect()->back();
    }




}
