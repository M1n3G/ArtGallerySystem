<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forumlikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'postID',
        'commentID',
        'username'
    ];
}
