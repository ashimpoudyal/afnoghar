<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;
use DataTables;
use DB;


class RoomController extends Controller
{
    // Index Page
    public function room(){
         $rooms = Room::latest()->get();
         return view ('admin.room.index', compact('rooms'));
    }




     // Add Post
    public function add(){
        $categories = RoomCategory::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Select Category </option>";
        foreach ($categories as $cat){
            $categories_dropdown .= "<option value=' ". $cat->id ." '> ". $cat->category_name ." </option>";
            $sub_categories = RoomCategory::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value='". $sub_cat->id ."'>  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
            }
        }

        // $tags = Tag::all();
        return view ('admin.room.add', compact('categories_dropdown'));
    }






    //Store Post

     public function store(Request $request){
        $data = $request->all();
        $rules = [
            'post_title' => 'required|max:255',
            'category_id'=>'required',
            'post_content'=>'required',
        ];
        $customMessages = [
            'post_title.required' => 'Post Title is required',
            'post_title.max' => 'You are not allowed to enter more than 255 characters',
            'category_id.required'=>'Please Select Category',
            'tag_id.required'=>'Tag is required',
            'post_content.required'=>'Content can not be empty',
        ];
        $this->validate($request, $rules, $customMessages);
        $room = new Room();
        $room->post_title = $data['post_title'];
        $room->slug = Str::slug($data['post_title']);
        $room->category_id = $data['category_id'];


        $room->ammeties = $data['ammeties'];
        $room->rating = $data['rating'];
        $room->type = $data['type'];
        $room->cp = $data['cp'];
        $room->sp = $data['sp'];




        if(!empty($data['post_content'])){
            $room->post_content = $data['post_content'];
        } else {
            $room->post_content = "";
        }

        $slug = Str::slug($data['post_title']);
        $random = rand(111, 9999999999);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug.'.'.$random.'.'.$extension;
                $image_path = 'public/uploads/room/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $room->image = $filename;
            }
        }
         if (empty($data['status'])){
            $room->status = 0;
        } else {
            $room->status = 1;
        
        }

        $room->view_count = 0;
    

        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;

        $room->save();
     
        Session::flash('success_message', 'Room Has Been Added Successfully');
        return redirect()->back();

    }





    // Edit Room
     public function edit($id){
        $room = Room::findOrFail($id);

        $categories = RoomCategory::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Select Category </option>";
        foreach ($categories as $cat){

            if($cat->id == $room->category_id){
                $selected = "selected";
            } else {
                $selected = "";
            }

            $categories_dropdown .= "<option value=' ". $cat->id ."' ".$selected."> ". $cat->category_name ." </option>";
            $sub_categories = RoomCategory::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id == $room->category_id){
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $categories_dropdown .= "<option value='". $sub_cat->id ."' ".$selected.">  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
            }
        }
       


        return view ('admin.room.edit', compact('room', 'categories', 'categories_dropdown'));
    }







    //Update Post

     public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'post_title' => 'required|max:255',
            // 'category_id'=>'required',
            // 'post_content'=>'required',
        ];
        $customMessages = [
            'post_title.required' => 'Post Title is required',
            'post_title.max' => 'You are not allowed to enter more than 255 characters',
            // 'category_id.required'=>'Please Select Category',
            // 'tag_id.required'=>'Tag is required',
            // 'post_content.required'=>'Content can not be empty',
        ];
        $this->validate($request, $rules, $customMessages);
       $room = Room::findOrFail($id);
        $room->post_title = $data['post_title'];
        $room->slug = Str::slug($data['post_title']);
        $room->category_id = $data['category_id'];


        $room->ammeties = $data['ammeties'];
        $room->rating = $data['rating'];
        $room->type = $data['type'];
        $room->cp = $data['cp'];
        $room->sp = $data['sp'];



        if(!empty($data['post_content'])){
            $room->post_content = $data['post_content'];
        } else {
            $room->post_content = "";
        }

        $slug = Str::slug($data['post_title']);
        $random = rand(111, 9999999999);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug.'.'.$random.'.'.$extension;
                $image_path = 'public/uploads/room/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $room->image = $filename;
            }
        }
         if (empty($data['status'])){
            $room->status = 0;
        } else {
            $room->status = 1;
        
        }

        $room->view_count = 0;
        
      
        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;

        $room->save();
     
        Session::flash('success_message', 'Room Has Been Updated Successfully');
        return redirect()->back();

    }






     // Delete Category
    public function delete($id){
         $room = Room::findOrFail($id);
         $room->delete();
         DB::table('blog_categories')->where('parent_id', $id)->delete();
        

         $image_path = 'public/uploads/room/';
         if(!empty($room->image)){
             if(file_exists($image_path.$room->image)){
                 unlink($image_path.$room->image);
             }
         }
        Session::flash('success_message', 'Room Has Been deleted Successfully');
        return redirect()->back();
    }









}
