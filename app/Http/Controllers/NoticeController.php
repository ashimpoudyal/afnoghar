<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NoticeController extends Controller
{
    // Notice Category 
     public function notice(){
         $notices = Notice::latest()->get();
         return view ('admin.notice.index', compact('notices'));
     }


      // Add Notice 
    public function add(){
       $notices = Notice::latest()->get();
        return view ('admin.notice.add', compact('notices'));
    }





    // Store Notice
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'file' => 'nullable|mimes:xls,xlsx.,pdf,jpg,png',

        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $notices = new Notice();
        $notices->title = $data['title'];
        $notices->slug = Str::slug($data['title']);

         $notices->excerpt = $data['excerpt'];
        $notices->description = $data['description'];


        // pdf upload
       $random = Str::random(10);
       if($request->hasFile('file')){
            $file = $request->file('file');
            if($file->isValid()){

        $filename = $random . '.' . $file->getClientOriginalExtension();
        $request->file->move('public/uploads/notice/document/',$filename);
        $notices->file=$filename;

    }}


         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/notice/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $notices->image = $filename;
            }
        }



             if (empty($data['status'])){
            $notices->status = 0;
        } else {
            $notices->status = 1;
        
      


        }
        

        $notices->save();
        Session::flash('success_message', 'Notice Has Been Added Successfully');
        return redirect()->back();

    }



    // Edit Notice
    public function editnotice($id){
        $notices = Notice::findOrFail($id);
        return view ('admin.notice.edit', compact('notices'));
    }




      // Update Notice
      public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'file' => 'nullable|mimes:xls,xlsx.,pdf,jpg,png|nullable',
            
           

        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'title.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
         $notices = Notice::findOrFail($id);
        $notices->title = $data['title'];
        $notices->slug = Str::slug($data['title']);

         $notices->excerpt = $data['excerpt'];
        $notices->description = $data['description'];


        // pdf upload
       $random = Str::random(10);
       if($request->hasFile('file')){
            $file = $request->file('file');
            if($file->isValid()){

        $filename = $random . '.' . $file->getClientOriginalExtension();
        $request->file->move('public/uploads/notice/document/',$filename);
        $notices->file=$filename;

    }}



         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/notice/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $notices->image = $filename;
            }

        }



             if (empty($data['status'])){
            $notices->status = 0;
        } else {
            $notices->status = 1;
        
        }


   
        

        $notices->save();
        Session::flash('success_message', 'Notice Has Been Updated Successfully');
        return redirect()->back();

    }




    // delete Notice

    public function deleteNotice($id){
        $notices = Notice::findOrFail($id);
        $notices->delete();
        $image_path = 'public/uploads/notice/';
        if(!empty($notices->image)){
            if(file_exists($image_path.$notices->image)){
                unlink($image_path.$notices->image);
            }
        }
        Session::flash('success_message', 'Product Has Been deleted Successfully');
        return redirect()->back();
    }





}
