<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;

class User extends Model
{
    use HasFactory;

    protected $table = "users";

    public $incrementing = false;

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'gender',
        'contactNum',
        'userImg',
        'about',
    ];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}