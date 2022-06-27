<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class OfferController extends Controller
{
    // Offer Index 
     public function offer(){
         $offers = Offer::latest()->get();
         return view ('admin.offer.index', compact('offers'));
     }





      // Add Offer 
    public function add(){
       $offers = Offer::latest()->get();
        return view ('admin.offer.add', compact('offers'));
    }





     // Store Offer
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'field1' => 'required|max:255',
            'field2' => 'required|max:255',
        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
             'image.required' => 'Image is required',
             'price.required' => 'Price is required',
             'field1.required' => 'Field1 is required',
            'field1.max' => 'You are not allowed to enter more than 255 characters',
            'field2.required' => 'Field2 is required',
            'field2.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $offers = new Offer();
        $offers->title = $data['title'];
      

         $offers->price = $data['price'];
        $offers->field1 = $data['field1'];
        $offers->field2 = $data['field2'];
        $offers->service1 = $data['service1'];
        $offers->icon1 = $data['icon1'];
        $offers->service2 = $data['service2'];
        $offers->icon2 = $data['icon2'];
        $offers->service3 = $data['service3'];
        $offers->icon3 = $data['icon3'];
        $offers->service4 = $data['service4'];
        $offers->icon4 = $data['icon4'];
        $offers->service5 = $data['service5'];
        $offers->icon5 = $data['icon5'];



         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/offer/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $offers->image = $filename;
            }


            if (empty($data['status'])){
            $offers->status = 0;
        } else {
            $offers->status = 1;
        
        }




            if (empty($data['featured'])){
            $offers->featured = 0;
        } else {
            $offers->featured = 1;
        
        }






        }
        




        $offers->save();
        Session::flash('success_message', 'Offer Has Been Added Successfully');
        return redirect()->back();

    }





      // Edit Offer
    public function edit($id){
        $offers = Offer::findOrFail($id);
        return view ('admin.offer.edit', compact('offers'));
    }






      // Update Offer
     public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'price' => 'required',
            'field1' => 'required|max:255',
            'field2' => 'required|max:255',
        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
             'price.required' => 'Price is required',
             'field1.required' => 'Field1 is required',
            'field1.max' => 'You are not allowed to enter more than 255 characters',
            'field2.required' => 'Field2 is required',
            'field2.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $offers = Offer::findOrFail($id);
        $offers->title = $data['title'];
      

         $offers->price = $data['price'];
        $offers->field1 = $data['field1'];
        $offers->field2 = $data['field2'];
        $offers->service1 = $data['service1'];
        $offers->icon1 = $data['icon1'];
        $offers->service2 = $data['service2'];
        $offers->icon2 = $data['icon2'];
        $offers->service3 = $data['service3'];
        $offers->icon3 = $data['icon3'];
        $offers->service4 = $data['service4'];
        $offers->icon4 = $data['icon4'];
        $offers->service5 = $data['service5'];
        $offers->icon5 = $data['icon5'];



         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/offer/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $offers->image = $filename;
            }


            if (empty($data['status'])){
            $offers->status = 0;
        } else {
            $offers->status = 1;
        
        }




            if (empty($data['featured'])){
            $offers->featured = 0;
        } else {
            $offers->featured = 1;
        
        }






        }
        




        $offers->save();
        Session::flash('success_message', 'Offer Has Been Updated Successfully');
        return redirect()->back();

    }





     // Delete Offer
    public function delete($id){
         $offers = Offer::findOrFail($id);
         $offers->delete();


           $image_path = 'public/uploads/offer/';
         if(!empty($offers->image)){
             if(file_exists($image_path.$offers->image)){
                 unlink($image_path.$offers->image);
             }
         }
        Session::flash('success_message', 'Offer Has Been deleted Successfully');
        return redirect()->back();
    }







}
