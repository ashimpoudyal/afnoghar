<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
     public function subCategory(){
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }
}
