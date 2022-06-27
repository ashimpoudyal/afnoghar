<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    public function subCategory(){
        return $this->belongsTo(MenuCategory::class, 'parent_id');
    }
}
