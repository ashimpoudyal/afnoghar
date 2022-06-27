<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;
use DataTables;
use DB;

class PostController extends Controller
{
    // Index Page
    public function tag(){
        Session::put('admin_page', 'tag');
         $posts = Post::latest()->get();
         return view ('admin.post.index', compact('posts'));
    }


     // Add Post
    public function add(){
        $categories = BlogCategory::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Select Category </option>";
        foreach ($categories as $cat){
            $categories_dropdown .= "<option value=' ". $cat->id ." '> ". $cat->category_name ." </option>";
            $sub_categories = BlogCategory::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value='". $sub_cat->id ."'>  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
            }
        }

        $tags = Tag::all();
        return view ('admin.post.add', compact('categories_dropdown', 'tags'));
    }

     
   //Store Post

     public function store(Request $request){
        $data = $request->all();
        $rules = [
            'post_title' => 'required|max:255',
            'category_id'=>'required',
            'tag_id'=>'required',
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
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->slug = Str::slug($data['post_title']);
        $post->category_id = $data['category_id'];


         $admin_id =Auth::guard('admin')->user()->id;
        $post->admin_id = $admin_id;




        if(!empty($data['post_content'])){
            $post->post_content = $data['post_content'];
        } else {
            $post->post_content = "";
        }

        $slug = Str::slug($data['post_title']);
        $random = rand(111, 9999999999);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug.'.'.$random.'.'.$extension;
                $image_path = 'public/uploads/posts/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $post->image = $filename;
            }
        }
         if (empty($data['status'])){
            $post->status = 0;
        } else {
            $post->status = 1;
        
        }

        $post->view_count = 0;
        $post->seo_title = $data['seo_title'];
        $post->seo_subtitle = $data['seo_subtitle'];
        $post->seo_keywords = $data['seo_keywords'];
        $post->seo_description = $data['seo_description'];

        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;


        $tags = $data['tag_id'];
        $post->save();
        $post->tags()->attach($tags);
        Session::flash('success_message', 'Post Has Been Added Successfully');
        return redirect()->back();

    }




    // Edit Post
     public function edit($id){
        $post = Post::findOrFail($id);

        $categories = BlogCategory::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option selected disabled> Select Category </option>";
        foreach ($categories as $cat){

            if($cat->id == $post->category_id){
                $selected = "selected";
            } else {
                $selected = "";
            }

            $categories_dropdown .= "<option value=' ". $cat->id ."' ".$selected."> ". $cat->category_name ." </option>";
            $sub_categories = BlogCategory::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id == $post->category_id){
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $categories_dropdown .= "<option value='". $sub_cat->id ."' ".$selected.">  &nbsp; &nbsp; ---- ". $sub_cat->category_name ."</option>";
            }
        }
        $tags = Tag::orderBy('name')->get();
        $post_tag = $post->tags()->pluck('tag_id')->toArray();


        return view ('admin.post.edit', compact('post', 'categories', 'categories_dropdown', 'tags', 'post_tag'));
    }



     //Update Post
     public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'post_title' => 'required|max:255',
        ];
        $customMessages = [
            'post_title.required' => 'Post Title is required',
            'post_title.max' => 'You are not allowed to enter more than 255 characters',
        ];
        $this->validate($request, $rules, $customMessages);
        $post = Post::findOrFail($id);
        $post->post_title = $data['post_title'];
        $post->slug = Str::slug($data['post_title']);
        $post->category_id = $data['category_id'];


         $admin_id =Auth::guard('admin')->user()->id;
        $post->admin_id = $admin_id;



        if(!empty($data['post_content'])){
            $post->post_content = $data['post_content'];
        } else {
            $post->post_content = "";
        }

        $slug = Str::slug($data['post_title']);
        $random = rand(111, 9999999999);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $slug.'.'.$random.'.'.$extension;
                $image_path = 'public/uploads/posts/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $post->image = $filename;
            }
        }

        
        if (empty($data['status'])){
            $post->status = 0;
        } else {
            $post->status = 1;
        
        }

        $post->view_count = 0;
        $post->seo_title = $data['seo_title'];
        $post->seo_subtitle = $data['seo_subtitle'];
        $post->seo_keywords = $data['seo_keywords'];
        $post->seo_description = $data['seo_description'];

        // $admin_id = Auth::guard('admin')->user()->id;
        // $post->admin_id = $admin_id;

        $tags = $data['tag_id'];
        $post->save();
        $post->tags()->sync($tags);
        Session::flash('success_message', 'Post Has Been Updated Successfully');
        return redirect()->back();

    }



     // Delete Category
    public function delete($id){
         $post = Post::findOrFail($id);
         $post->delete();
         DB::table('blog_categories')->where('parent_id', $id)->delete();
        

         $image_path = 'public/uploads/posts/';
         if(!empty($post->image)){
             if(file_exists($image_path.$post->image)){
                 unlink($image_path.$post->image);
             }
         }
        Session::flash('success_message', 'Post Has Been deleted Successfully');
        return redirect()->back();
    }














}
