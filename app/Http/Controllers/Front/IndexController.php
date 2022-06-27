<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Room;
use App\Models\OurService;
use App\Models\Gallery;
use App\Models\Standard;
use App\Models\Video;

class IndexController extends Controller
{
    public function index(){
        $banners = Banner::latest()->get();
        $bannerimage = Banner::first();
        $rooms = Room::latest()->get();
        $roomimage = Room::first();
        $galleries = Gallery::take(12)->get();
        $services = OurService::latest()->get();
        $events = Event::take(3)->get();
        $videos = Video::latest()->get();
        $discounts = Standard::latest()->get();
        return view('front.index',compact('banners','events','bannerimage','rooms','roomimage','galleries','services','videos','discounts'));
    }
    // public function roomdisp(){
    //     $rooms = Room::latest()->get();
    //     $roomimage = Room::first();

    //     return view('front.index',compact('rooms','roomimage'));
    // }
    

    
    public function gallery(){
        $galleries = Gallery::take(12)->get();

        return view ('front.index', compact('galleries'));
    }
    public function reservation(){
        $events = Event::latest()->get();

        return view('front.reservation',compact('events'));
    }
    public function contact(){
        return view('front.contact');
    }
}
