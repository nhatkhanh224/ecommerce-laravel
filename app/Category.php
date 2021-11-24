<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','parent_id','slug','photo_url'];
    public function categoryChildren(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
}
