<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Video;

class VideoController extends Controller
{
    // Video Index 
     public function video(){
         $videos = Video::latest()->get();
         return view ('admin.video.index', compact('videos'));
     }



      // Add Video 
    public function add(){
       $videos = Video::latest()->get();
        return view ('admin.video.add', compact('videos'));
    }




     // Store Video
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            // 'image' => 'required',
            'url' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Name is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
             // 'image.required' => 'Image is required',
             'url.required' => 'Video URL is required',
        ];
        $this->validate($request, $rules, $customMessages);
        $videos = new Video();
        $videos->name = $data['name'];
        $videos->url = $data['url'];



         if (empty($data['featured'])){
            $videos->featured = 0;
        } else {
            $videos->featured = 1;
        
        }


        
         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/video/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $videos->image = $filename;
            }
        }
        




        $videos->save();
        Session::flash('success_message', 'Video Has Been Added Successfully');
        return redirect()->back();

    }



      // Edit Video
    public function edit($id){
        Session::put('admin_page', 'video');
        $videos = Video::findOrFail($id);
        return view ('admin.video.edit', compact('videos'));
    }





     // Update Video
     public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'url' => 'required',
        ];
        $customMessages = [
            'name.required' => 'Name is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
             'url.required' => 'Video URL is required',
        ];
        $this->validate($request, $rules, $customMessages);
        $videos = Video::findOrFail($id);
        $videos->name = $data['name'];
        $videos->url = $data['url'];



         if (empty($data['featured'])){
            $videos->featured = 0;
        } else {
            $videos->featured = 1;
        
        }


        
         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/video/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $videos->image = $filename;
            }
        }
        




        $videos->save();
        Session::flash('success_message', 'Video Has Been Updated Successfully');
        return redirect()->back();

    }



     public function delete($id){
        $videos = Video::findOrFail($id);
        $videos->delete();

        $image_path = 'public/uploads/video/';
        if(!empty($videos->image)){
            if(file_exists($image_path.$videos->image)){
                unlink($image_path.$videos->image);
            }
        }
        Session::flash('success_message', 'Video Has Been deleted Successfully');
        return redirect()->back();
    }

}
