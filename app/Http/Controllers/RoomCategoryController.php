<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\RoomCategoryGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use DataTables;


class RoomCategoryController extends Controller
{
    // Room Category Index
     public function roomcategory(){
         $roomcategories = RoomCategory::latest()->get();
         return view ('admin.roomcategory.index', compact('roomcategories'));
     }




      // Add Room Categories
    public function add(){
        $roomcategories = RoomCategory::where('parent_id', 0)->get();
        return view ('admin.roomcategory.add',compact('roomcategories'));
    }





    // Store Room Category
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
            // 'image' => 'required',
            
        ];
        $customMessages = [
            'category_name.required' => 'Category name is required',
            'category_name.max' => 'You are not allowed to enter more than 255 characters',
            'parent_id.required' => 'Please Select One Under Category',
             // 'image.required' => 'Please Upload One Image',
        ];
        $this->validate($request, $rules, $customMessages);

        $slug = Str::slug($data['category_name']);
        $categoryCount = RoomCategory::where('slug', $slug)->count();

        if($categoryCount > 0){
            Session::flash('error_message', 'Room Category name already exists in our database');
            return redirect()->back();
        }

        $roomcategories = new RoomCategory();
        $roomcategories->category_name = ucwords(strtolower($data['category_name']));
        $roomcategories->slug = Str::slug($data['category_name']);
        $roomcategories->description = $data['description'];
        $roomcategories->sp = $data['sp'];
        $roomcategories->cp = $data['cp'];
        $roomcategories->no_of_room = $data['no_of_room'];

        $roomcategories->parent_id = $data['parent_id'];




         if(!empty($data['status'])){
            $roomcategories->status = 1;
        } else {
            $roomcategories->status = 0;
        }





         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/roomcategory/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $roomcategories->image = $filename;
            }
        }
       
        $roomcategories->save();
        Session::flash('success_message', 'Room Category Has Been Added Successfully');
        return redirect()->back();
    }




    // Edit Category
    public function edit($id){
        Session::put('admin_page', 'category');
        $myCategory = RoomCategory::findOrFail($id);
        $roomcategories = RoomCategory::where('parent_id', 0)->orderBy('category_name', 'ASC')->get();
        return view ('admin.roomcategory.edit', compact('roomcategories', 'myCategory'));
    }






     // Update Room Category
       public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            // 'category_name' => 'required|max:255',
            // 'parent_id' => 'required',
            // 'image' => 'required',
            
        ];
        $customMessages = [
            // 'category_name.required' => 'Category name is required',
            // 'category_name.max' => 'You are not allowed to enter more than 255 characters',
            // 'parent_id.required' => 'Please Select One Under Category',
            // 'image.required' => 'Please Upload One Image',
        ];
        $this->validate($request, $rules, $customMessages);

        $slug = Str::slug($data['category_name']);
        // $categoryCount = RoomCategory::where('slug', $slug)->count();

        // if($categoryCount > 0){
        //     Session::flash('error_message', 'Room Category name already exists in our database');
        //     return redirect()->back();
        // }

        $roomcategories = RoomCategory::findOrFail($id);
        $roomcategories->category_name = ucwords(strtolower($data['category_name']));
        $roomcategories->slug = Str::slug($data['category_name']);
        $roomcategories->description = $data['description'];
         $roomcategories->sp = $data['sp'];
        $roomcategories->cp = $data['cp'];
        $roomcategories->no_of_room = $data['no_of_room'];

        $roomcategories->parent_id = $data['parent_id'];



         if(!empty($data['status'])){
            $roomcategories->status = 1;
        } else {
            $roomcategories->status = 0;
        }





         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/roomcategory/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $roomcategories->image = $filename;
            }
        }


       
        $roomcategories->save();
        Session::flash('success_message', 'Room Category Has Been Updated Successfully');
        return redirect()->back();
    }




 // Delete Category
    public function delete($id){
         $category = RoomCategory::findOrFail($id);
         $category->delete();
         DB::table('room_categories')->where('parent_id', $id)->delete();
        Session::flash('success_message', 'Room Category Has Been deleted Successfully');
        return redirect()->back();
    }




//Event Gallery
    public function roomGallery (Request $request , $id){
        $category = RoomCategory::findOrFail($id);
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach ($files as $file){
                    $image = new RoomCategoryGallery();
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(11,99999).'.'.$extension;
                    $image_path = 'public/uploads/roomcategory/gallery/' . $filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->category_id = $data['category_id'];
                    $image->save();
                }
            }
            Session::flash('success_message', 'Gallery  Has Been Added Successfully');
            return redirect()->back();
        }
        $gallery = RoomCategoryGallery::where('category_id', $id)->latest()->get();
        return view ('admin.roomcategory.gallery', compact('category', 'gallery'));

    }




    public function deleteImage($id){
         $image = RoomCategoryGallery::findOrFail($id);
        $image->delete();
         DB::table('room_categories')->where('parent_id', $id)->delete();


        $image_path = 'public/uploads/roomcategory/gallery';
        if(!empty($image->image)){
            if(file_exists($image_path.$image->image)){
                unlink($image_path.$image->image);
            }
        }
        Session::flash('success_message', 'Image Has Been deleted Successfully');
        return redirect()->back();


    }








}
