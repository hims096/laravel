<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'blog_post_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }


    public  function replies(){

        return $this->hasMany(Comment::class,'parent_id');
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
