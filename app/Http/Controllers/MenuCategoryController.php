<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuCategoryController extends Controller
{
    //Index
    public function menucategory(){
        $menucategories = MenuCategory::latest()->get();
        return view ('admin.menucategory.index', compact('menucategories'));
    }
     // Add Menu Categories
     public function add(){
        $menucategories = MenuCategory::where('parent_id', 0)->get();
        return view ('admin.menucategory.add',compact('menucategories'));
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
        $categoryCount = MenuCategory::where('slug', $slug)->count();

        if($categoryCount > 0){
            Session::flash('error_message', 'Menu Category name already exists in our database');
            return redirect()->back();
        }

        $menucategories = new MenuCategory();
        $menucategories->category_name = ucwords(strtolower($data['category_name']));
        $menucategories->slug = Str::slug($data['category_name']);
        $menucategories->parent_id = $data['parent_id'];
        $menucategories->order = $data['order'];
        if($data['status'] == 1){
            $menucategories->status = 1;
        } else {
            $menucategories->status = 0;
        }
        $menucategories->save();
        Session::flash('success_message', 'Menu Category Has Been Added Successfully');
        return redirect()->back();
    }
}
