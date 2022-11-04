<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forumcategories extends Model
{
    use HasFactory;

    protected $table = 'forumcategories';

    protected $fillable = [
        'name',
        'description',
        'image',
        'keyword',
        'created_by'
    ];
}
