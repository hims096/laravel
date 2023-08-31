<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $table='blog_posts';
    protected $primaryKey='id';
    protected $fillable =['title','content'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    // Custom method to get comments with replies for a specific post
    public function getCommentsWithReplies()
    {
        return $this->comments()
            ->with('replies')

            ->whereNull('parent_id')
            ->get();
    }

}
