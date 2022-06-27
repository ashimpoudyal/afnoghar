<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Str;

class TagController extends Controller
{
    // Index Page
    public function tag(){
        Session::put('admin_page', 'tag');
         $tags = Tag::latest()->get();
         return view ('admin.tag.index', compact('tags'));
    }


     // Add
    public function add(){
    	$tags = Tag::latest()->get();
        return view ('admin.tag.add', compact('tags'));
    }



    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
        ];
        $customMessages = [
            'name.required' => 'Tag name is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $tag = new Tag();
        $tag->name = $data['name'];
        $tag->slug = Str::slug($data['name']);
        $tag->save();
        Session::flash('success_message', 'Tag Has Been Added Successfully');
        return redirect()->back();

    }


    //Edit

    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view ('admin.tag.edit')->with(compact('tag'));
    }

    // Store
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
        ];
        $customMessages = [
            'name.required' => 'Tag name is required',
            'name.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $tag = Tag::findOrFail($id);
        $tag->name = $data['name'];
        $tag->slug = Str::slug($data['name']);
        $tag->save();
        Session::flash('success_message', 'Tag Has Been Updated Successfully');
        return redirect()->back();

    }




    // Delete Category
    public function deleteCategory($id){
         $tag = Tag::findOrFail($id);
         $tag->delete();
        Session::flash('success_message', 'Tag Has Been deleted Successfully');
        return redirect()->back();
    }








}
