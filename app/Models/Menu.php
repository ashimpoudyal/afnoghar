<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

     public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags');
    }



     public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function getparent()
    {
        return $this->belongsTo(Category::class, 'parent')->where('is_deleted', 0)->withDefault(['title' => 'not found']);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent', 'id')->where('is_deleted', 0);
    }

}
