<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use DB;

class EventController extends Controller
{
     // Event Index Page 
     public function event(){
         $events = Event::latest()->get();
         return view ('admin.event.index', compact('events'));
     }


     // Add Event 
    public function add(){
        $categories = EventCategory::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Select Category </option>";
        foreach ($categories as $cat){
            $categories_dropdown .= "<option value=' ". $cat->id ." '> ". $cat->category_name ." </option>";
            $sub_categories = EventCategory::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value='". $sub_cat->id ."'>  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
            }
        }


       $events = Event::latest()->get();
        return view ('admin.event.add', compact('events','categories_dropdown'));
    }



    // Store Event
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'category_id'=>'required',
            
        ];
        $customMessages = [
            'name.required' => 'Name of Event is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
            'category_id.required'=>'Please Select Category',
            
        ];
        $this->validate($request, $rules, $customMessages);
        $events = new Event();
        $events->name = $data['name'];
        $events->slug = Str::slug($data['name']);
        $events->category_id = $data['category_id'];

         $events->address = $data['address'];
        $events->date = $data['date'];
        $events->time = $data['time'];
        $events->description = $data['description'];
         $events->excerpt = $data['excerpt'];
         $events->map = $data['map'];

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/event/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $events->image = $filename;
            }
        }


         if (empty($data['status'])){
            $events->status = 0;
        } else {
            $events->status = 1;
        
        }
        




        $events->save();
        Session::flash('success_message', 'Event Has Been Added Successfully');
        // return redirect()->back();
        return redirect()->route('event.index');

    }


     // Edit Event
    public function edit($id){
        Session::put('admin_page', 'event');
        $events = Event::findOrFail($id);

         $categories = EventCategory::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Select Category </option>";
        foreach ($categories as $cat){

            if($cat->id == $events->category_id){
                $selected = "selected";
            } else {
                $selected = "";
            }

            $categories_dropdown .= "<option value=' ". $cat->id ."' ".$selected."> ". $cat->category_name ." </option>";
            $sub_categories = EventCategory::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id == $events->category_id){
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $categories_dropdown .= "<option value='". $sub_cat->id ."' ".$selected.">  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
            }
        }


        return view ('admin.event.edit', compact('events','categories_dropdown'));
    }



    // Update Event
     public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            
        ];
        $customMessages = [
            'name.required' => 'Name of Event is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
            
        ];
        $this->validate($request, $rules, $customMessages);
        $events = Event::findOrFail($id);
        $events->name = $data['name'];
        $events->slug = Str::slug($data['name']);

         $events->address = $data['address'];
          $events->category_id = $data['category_id'];
        $events->date = $data['date'];
        $events->time = $data['time'];
        $events->description = $data['description'];
         $events->excerpt = $data['excerpt'];
         $events->map = $data['map'];

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/event/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $events->image = $filename;
            }
        }


         if (empty($data['status'])){
            $events->status = 0;
        } else {
            $events->status = 1;
        
        }
        




        $events->save();
        Session::flash('success_message', 'Event Has Been Updated Successfully');
        return redirect()->back();

    }



    // delete Event

    public function deleteEvent($id){
        $events = Event::findOrFail($id);
        $events->delete();
        $image_path = 'public/uploads/event/';
        if(!empty($events->image)){
            if(file_exists($image_path.$events->image)){
                unlink($image_path.$events->image);
            }
        }
        Session::flash('success_message', 'Event Has Been deleted Successfully');
        return redirect()->back();
    }


    //Event Gallery
    public function eventGallery(Request $request , $id){
    	$events = Event::findOrFail($id);
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach ($files as $file){
                    $image = new EventGallery();
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(11,99999).'.'.$extension;
                    $image_path = 'public/uploads/event/gallery/' . $filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->event_id = $data['event_id'];
                    $image->save();
                }
            }
            Session::flash('success_message', 'Gallery  Has Been Added Successfully');
            return redirect()->back();
        }
        $gallery = EventGallery::where('event_id', $id)->get();
        return view ('admin.event.gallery', compact('events', 'gallery'));

    }



    public function deleteImage($id){
    	 $image = EventGallery::findOrFail($id);
        $image->delete();
         DB::table('event_categories')->where('parent_id', $id)->delete();


        $image_path = 'public/uploads/event/gallery';
        if(!empty($image->image)){
            if(file_exists($image_path.$image->image)){
                unlink($image_path.$image->image);
            }
        }
        Session::flash('success_message', 'Image Has Been deleted Successfully');
        return redirect()->back();


    }


}
