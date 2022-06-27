<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

     public function subCategory(){
        return $this->belongsTo(RoomCategory::class, 'parent_id');
    }




    public function images(){
        return $this->belongsTo(RoomCategoryGallery::class, 'category_id');
    }

}
