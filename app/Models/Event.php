<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    public function category(){
        return $this->belongsTo(EventCategory::class, 'category_id');
    }


      public function images(){
        return $this->hasMany(EventGallery::class, 'event_id');
    }


     
    

}
