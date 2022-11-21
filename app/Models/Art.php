<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;

class Art extends Model
{
    use HasFactory;
    protected $table="art";
    protected $primaryKey = 'artID';

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userImg', 'username');
    }
}