<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class CategoryController extends Controller
{
   // Category Index
     public function category(){
         Session::put('admin_page', 'category');
         $categories = Category::latest()->get();
         return view ('admin.category.index', compact('categories'));
     }


     // Add Categories
    public function add(){
        $categories = Category::where('parent_id', 0)->get();
        return view ('admin.category.add',compact('categories'));
    }




     // Store Category
    public function store(Request $request){
         $data = $request->all();

        $rules = [
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
        ];
        $customMessages = [
            'category_name.required' => 'Category name is required',
            'category_name.max' => 'You are not allowed to enter more than 255 characters',
            'parent_id.required' => 'Please Select One Under Category',
        ];
        $this->validate($request, $rules, $customMessages);

        $slug = Str::slug($data['category_name']);
        $categoryCount = Category::where('slug', $slug)->count();

        if($categoryCount > 0){
            Session::flash('error_message', 'Category name already exists in our database');
            return redirect()->back();
        }


        $category = new Category();
        $category->category_name = ucwords(strtolower($data['category_name']));
        $category->slug = Str::slug($data['category_name']);
        $category->parent_id = $data['parent_id'];
        $category->description = $data['description'];
        $category->icon = $data['icon'];
        $category->order = $data['order'];
    

        if (empty($data['status'])){
            $category->status = 0;
        } else {
            $category->status = 1;
        }

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/category/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $category->image = $filename;
            }
        }
        $category->save();
        Session::flash('success_message', 'Category Has Been Added Successfully');
        return redirect()->back();
    }



    // Edit Category
    public function editCategory($id){
        Session::put('admin_page', 'category');
        $myCategory = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)->orderBy('category_name', 'ASC')->get();
        return view ('admin.category.edit', compact('categories', 'myCategory'));
    }




     // Update Category
    public function update(Request $request , $id){
         $data = $request->all();
       $rules = [
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
        ];
        $customMessages = [
            'category_name.required' => 'Category name is required',
            'category_name.max' => 'You are not allowed to enter more than 255 characters',
            'parent_id.required' => 'Please Select One Under Category',
        ];
        $this->validate($request, $rules, $customMessages);

        $category = Category::findOrFail($id);
        $category->category_name = ucwords(strtolower($data['category_name']));
        $category->slug = Str::slug($data['category_name']);
        $category->parent_id = $data['parent_id'];
        $category->description = $data['description'];
        $category->icon = $data['icon'];
        $category->order = $data['order'];
    

        if (empty($data['status'])){
            $category->status = 0;
        } else {
            $category->status = 1;
        }

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/category/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $category->image = $filename;
            }
        }
        $category->save();
        Session::flash('success_message', 'Category Has Been Updated Successfully');
        return redirect()->back();
    }



    // Delete Category
    public function deleteCategory($id){
         $category = Category::findOrFail($id);
         $category->delete();
         DB::table('categories')->where('parent_id', $id)->delete();
         DB::table('products')->where('category_id', $id)->delete();
        

         $image_path = 'public/uploads/category/';
         if(!empty($category->image)){
             if(file_exists($image_path.$category->image)){
                 unlink($image_path.$category->image);
             }
         }
        Session::flash('success_message', 'Category Has Been deleted Successfully');
        return redirect()->back();
    }







}
