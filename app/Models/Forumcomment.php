<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Forumcomment extends Model
{
    use HasFactory;

    public function replies()
    {
        return $this->hasMany(Comment::class, 'replies_id');
    }
}
