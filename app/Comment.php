<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    public function images(){
        return $this->hasMany(CommentImage::class,'comment_id');
    }
}
