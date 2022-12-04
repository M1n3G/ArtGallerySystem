<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forumcategories;
use App\Models\User;
use App\Models\Comment;
use App\Models\LikeDislike;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'image',
        'imageURL',
        'status',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(Forumcategories::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id', 'id');
    }

    public function likes(){
        return $this->hasMany(LikeDislike::class,'post_id')->sum('like');
    }
    // Dislikes
    public function dislikes(){
        return $this->hasMany(LikeDislike::class,'post_id')->sum('dislike');
    }

}
