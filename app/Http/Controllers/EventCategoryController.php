<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;
use Excel;

class EventCategoryController extends Controller
{
    // Event Category Index
     public function eventcategory(){
         $eventcategories = EventCategory::latest()->get();
         return view ('admin.eventcategory.index', compact('eventcategories'));
     }


      // Add Event Categories
    public function add(){
        $eventcategories = EventCategory::where('parent_id', 0)->get();
        return view ('admin.eventcategory.add',compact('eventcategories'));
    }



     // Store Event Category
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
        $categoryCount = EventCategory::where('slug', $slug)->count();

        if($categoryCount > 0){
            Session::flash('error_message', 'name already exists in our database');
            return redirect()->back();
        }

        $eventcategories = new EventCategory();
        $eventcategories->category_name = ucwords(strtolower($data['category_name']));
        $eventcategories->slug = Str::slug($data['category_name']);
        $eventcategories->parent_id = $data['parent_id'];
       
        $eventcategories->save();
        Session::flash('success_message', 'Event Category Has Been Added Successfully');
        return redirect()->back();
    }



     // Edit  Event Category
    public function editCategory($id){
        Session::put('admin_page', 'eventcategory');
        $myCategory = EventCategory::findOrFail($id);
        $eventcategories = EventCategory::where('parent_id', 0)->orderBy('category_name', 'ASC')->get();
        return view ('admin.eventcategory.edit', compact('eventcategories', 'myCategory'));
    }




     // Update Event Category
    public function update(Request $request, $id){
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

        $categoryCount = EventCategory::where('slug', $slug)->count();

        if($categoryCount > 0){
            Session::flash('error_message', 'name already exists in our database');
            return redirect()->back();
        }

       $eventcategories = EventCategory::findOrFail($id);
        $eventcategories->category_name = ucwords(strtolower($data['category_name']));
        $eventcategories->slug = Str::slug($data['category_name']);
        $eventcategories->parent_id = $data['parent_id'];
       
        $eventcategories->save();
        Session::flash('success_message', 'Event Category Has Been Added Updated');
        return redirect()->back();
    }




    // Delete Event Category
    public function deleteCategory($id){
         $category = EventCategory::findOrFail($id);
         $category->delete();
         DB::table('blog_categories')->where('parent_id', $id)->delete();
        Session::flash('success_message', 'Event Category Has Been deleted Successfully');
        return redirect()->back();
    }




}
