<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "users";

    public $incrementing = false;
    
    protected $fillable = [
        'userID',
        'username',
        'name',
        'email',
        'password',
        'contactNum',
    ];
    

}
