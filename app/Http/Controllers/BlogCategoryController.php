<?php

namespace App\Http\Controllers;

use App\Exports\BlogCategoryExport;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;
use Excel;

class BlogCategoryController extends Controller
{
    // Blog Category Index
     public function blogcategory(){
         $blogcategories = BlogCategory::latest()->get();
         return view ('admin.blogcategory.index', compact('blogcategories'));
     }



      // Add Blog Categories
    public function add(){
        $blogcategories = BlogCategory::where('parent_id', 0)->get();
        return view ('admin.blogcategory.add',compact('blogcategories'));
    }



    // Store Category
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
            'order' => 'required'
        ];
        $customMessages = [
            'category_name.required' => 'Category name is required',
            'category_name.max' => 'You are not allowed to enter more than 255 characters',
            'parent_id.required' => 'Please Select One Under Category',
        ];
        $this->validate($request, $rules, $customMessages);

        $slug = Str::slug($data['category_name']);
        $categoryCount = BlogCategory::where('slug', $slug)->count();

        if($categoryCount > 0){
            Session::flash('error_message', 'Blog Category name already exists in our database');
            return redirect()->back();
        }

        $blogcategories = new BlogCategory();
        $blogcategories->category_name = ucwords(strtolower($data['category_name']));
        $blogcategories->slug = Str::slug($data['category_name']);
        $blogcategories->parent_id = $data['parent_id'];
        $blogcategories->order = $data['order'];
        if($data['status'] == 1){
            $blogcategories->status = 1;
        } else {
            $blogcategories->status = 0;
        }
        $blogcategories->save();
        Session::flash('success_message', 'Blog Category Has Been Added Successfully');
        return redirect()->back();
    }



      // Edit Category
    public function edit($id){
        Session::put('admin_page', 'category');
        $myCategory = BlogCategory::findOrFail($id);
        $blogcategories = BlogCategory::where('parent_id', 0)->orderBy('category_name', 'ASC')->get();
        return view ('admin.blogcategory.edit', compact('blogcategories', 'myCategory'));
    }





    // Update Category
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'category_name' => 'required|max:255',
            'parent_id' => 'required',
            'order' => 'required'

        ];
        $customMessages = [
            'category_name.required' => 'Category name is required',
            'category_name.max' => 'You are not allowed to enter more than 255 characters',
            'parent_id.required' => 'Select One Priority Order',
        ];
        $this->validate($request, $rules, $customMessages);

        $slug = Str::slug($data['category_name']);


        $blogcategories = BlogCategory::findOrFail($id);
        $blogcategories->category_name = ucwords(strtolower($data['category_name']));
        $blogcategories->slug = Str::slug($data['category_name']);
        $blogcategories->parent_id = $data['parent_id'];
        $blogcategories->order = $data['order'];
        if(!empty($data['status'])){
            $blogcategories->status = 1;
        } else {
            $blogcategories->status = 0;
        }

        $blogcategories->save();
        Session::flash('success_message', 'Category Has Been Updated Successfully');
        return redirect()->back();
    }



    // Delete Category
    public function deleteCategory($id){
         $category = BlogCategory::findOrFail($id);
         $category->delete();
         DB::table('blog_categories')->where('parent_id', $id)->delete();
        Session::flash('success_message', 'Blog Category Has Been deleted Successfully');
        return redirect()->back();
    }
}
