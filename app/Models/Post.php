<?php

namespace App\Models;

use App\Models\Forumcategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Forumcategories::class, 'category_id', 'id');
    }
}
