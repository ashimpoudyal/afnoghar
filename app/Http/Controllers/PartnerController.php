<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    // Partner Category 
     public function partner(){
         $partners = Partner::latest()->get();
         return view ('admin.partner.index', compact('partners'));
     }


       // Add Partner 
    public function add(){
       $partners = Partner::latest()->get();
        return view ('admin.partner.add', compact('partners'));
    }



    // Store Partner
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
        $partners = new Partner();
        $partners->name = $data['name'];
        

        

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/partner/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $partners->image = $filename;
            }
        }


        $partners->save();
        Session::flash('success_message', 'Partner Has Been Added Successfully');
        return redirect()->back();

    }



    // Edit Partner
    public function edit($id){
        $partners = Partner::findOrFail($id);
        return view ('admin.partner.edit', compact('partners'));
    }




      // Update Partner
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
        $partners = Partner::findOrFail($id);
        $partners->name = $data['name'];
        

        

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/partner/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $partners->image = $filename;
            }
        }


        $partners->save();
        Session::flash('success_message', 'Partner Has Been Updated Successfully');
        return redirect()->back();

    }



     // delete Partner

    public function delete($id){
        $partners = Partner::findOrFail($id);
        $partners->delete();
        $image_path = 'public/uploads/partner/';
        if(!empty($notices->image)){
            if(file_exists($image_path.$notices->image)){
                unlink($image_path.$partners->image);
            }
        }
        Session::flash('success_message', 'Partner Has Been deleted Successfully');
        return redirect()->back();
    }






}
