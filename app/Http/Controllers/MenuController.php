<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\MenuCategory;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    // Menu Index 
     public function menu(){
         $menus = Menu::orderBy('order','ASC')->get();
         return view ('admin.menu.index', compact('menus'));
     }




      // Add Menu 
    public function add(){
     
            $categories = MenuCategory::where(['parent_id' => 0])->get();
            $categories_dropdown = "<option selected disabled> Select Category </option>";
            foreach ($categories as $cat){
                $categories_dropdown .= "<option value=' ". $cat->id ." '> ". $cat->category_name ." </option>";
                $sub_categories = MenuCategory::where('parent_id', $cat->id)->get();
                foreach ($sub_categories as $sub_cat){
                    $categories_dropdown .= "<option value='". $sub_cat->id ."'>  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
                }
            }
    
            $menus = Menu::latest()->get();
            return view ('admin.menu.add', compact('menus','categories_dropdown'));
        }
       
    





    // Store Menu
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'image' => 'required',
            'order' => 'required',
            'sellingprice' => 'required',

        ];
        $customMessages = [
            'name.required' => 'Name is required',
            'order.required' => 'Order is required',
            'sellingprice.required' => 'Selling Price is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $menus = new Menu();
        $menus->name = $data['name'];
        $menus->type = $data['type'];
        $menus->slug = Str::slug($data['name']);
        $menus->category_id = $data['category_id'];
        $menus->markedprice = $data['markedprice'];
        $menus->sellingprice = $data['sellingprice'];
        $menus->order = $data['order'];
        $menus->description = $data['description'];

        

        

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/menu/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $menus->image = $filename;
            }
        }


        $menus->save();
        Session::flash('success_message', 'Menu Has Been Added Successfully');
        return redirect()->back();

    }




       // Edit Menu
    public function edit($id){
        $menus = Menu::findOrFail($id);
        return view ('admin.menu.edit', compact('menus'));
    }





      // Update Menu
    public function update(Request $request , $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'order' => 'required',
            'sellingprice' => 'required',

        ];
        $customMessages = [
            'name.required' => 'Name is required',
            'order.required' => 'Order is required',
            'sellingprice.required' => 'Selling Price is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $menus = Menu::findOrFail($id);
        $menus->name = $data['name'];
        $menus->type = $data['type'];
        $menus->category_id = $data['category_id'];
        $menus->slug = Str::slug($data['name']);
        $menus->markedprice = $data['markedprice'];
        $menus->sellingprice = $data['sellingprice'];
        $menus->order = $data['order'];
        $menus->description = $data['description'];

        

        

         $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/menu/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $menus->image = $filename;
            }
        }


        $menus->save();
        Session::flash('success_message', 'Menu Has Been Updated Successfully');
        return redirect()->back();

    }







     // Delete Menu
    public function delete($id){
         $menus = Menu::findOrFail($id);
         $menus->delete();


           $image_path = 'public/uploads/menu/';
         if(!empty($menus->image)){
             if(file_exists($image_path.$menus->image)){
                 unlink($image_path.$menus->image);
             }
         }
        Session::flash('success_message', 'Menu Has Been deleted Successfully');
        return redirect()->back();
    }


















}
