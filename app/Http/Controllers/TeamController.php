<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
   // Team Index
    public function team(){
        Session::put('admin_page', 'team');
        $teams = Team::latest()->get();
        return view ('admin.team.index', compact('teams'));
    }


     // Add Team
    public function add(){
        return view ('admin.team.add');
    }



     // Store TeamTeam
    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'post' => 'required',
        ]);

        $teams = new Team();
        $teams->name = ucwords(strtolower($data['name']));
        $teams->post = ucwords(strtolower($data['post']));
        $teams->intro = $data['intro'];
        $teams->facebook = $data['facebook'];
        $teams->instagram = $data['instagram'];
        $teams->linkedin = $data['linkedin'];


        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/team/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $teams->image = $filename;
            }
        }

        if (empty($data['depart1'])) {
            $teams->depart1 = 0;
        } else {
            $teams->depart1 = 1;
        }
        if (empty($data['depart2'])) {
            $teams->depart2 = 0;
        } else {
            $teams->depart2 = 1;
        }
        if (empty($data['depart3'])) {
            $teams->depart3 = 0;
        } else {
            $teams->depart3 = 1;
        }
        if (empty($data['depart4'])) {
            $teams->depart4 = 0;
        } else {
            $teams->depart4 = 1;
        }







        $teams->save();
        Session::flash('success_message', 'Team Has Been Added Successfully');
        return redirect()->route('team.index');
    }


    // Edit team
    public function edit($id){
        $team = Team::findOrFail($id);
        return view ('admin.team.edit', compact('team'));
    }



     // Update Testimonial
    public function update(Request $request, $id){
        $teams = Team::findOrFail($id);
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'post' => 'required',
    
        ]);
        $teams->name = ucwords(strtolower($data['name']));
        $teams->post = ucwords(strtolower($data['post']));
        $teams->intro = $data['intro'];
        $teams->facebook = $data['facebook'];
        $teams->instagram = $data['instagram'];
        $teams->linkedin = $data['linkedin'];


        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/team/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $teams->image = $filename;
            }
        }


         if (empty($data['depart1'])) {
            $teams->depart1 = 0;
        } else {
            $teams->depart1 = 1;
        }
        if (empty($data['depart2'])) {
            $teams->depart2 = 0;
        } else {
            $teams->depart2 = 1;
        }
        if (empty($data['depart3'])) {
            $teams->depart3 = 0;
        } else {
            $teams->depart3 = 1;
        }
        if (empty($data['depart4'])) {
            $teams->depart4 = 0;
        } else {
            $teams->depart4 = 1;
        }







        $teams->save();

        $image_path = 'public/uploads/team/';
        if(!empty($data['image'])) {
            if (!empty($data['current_image'])){
                if (file_exists($image_path . $data['current_image'])) {
                    unlink($image_path . $data['current_image']);
                }
            }
        }

        Session::flash('success_message', 'Team Has Been updated Successfully');
        return redirect()->route('team.index');
    }



     public function delete($id){
        $teams = Team::findOrFail($id);
        $teams->delete();

        $image_path = 'public/uploads/team/';
        if(!empty($teams->image)){
            if(file_exists($image_path.$teams->image)){
                unlink($image_path.$teams->image);
            }
        }
        Session::flash('success_message', 'Member Has Been deleted Successfully');
        return redirect()->back();
    }




}
