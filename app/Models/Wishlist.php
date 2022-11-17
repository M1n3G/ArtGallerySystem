<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Art;

class Wishlist extends Model
{
    use HasFactory;
    
    protected $table = 'wishlists';

    public function user(){
        return $this->belongsTo(User::class);
     }
     
     public function art(){
        return $this->belongsTo(Art::class);
     }
}
