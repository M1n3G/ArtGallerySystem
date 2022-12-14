<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $table = 'workshopdetails';
    protected $fillable = [
        'workshopID',
        'userID',
        'name',
        'establisher',
        'address',
        'city',
        'state',
        'postcode',
        'description',
        'email',
        'phone',
        'createDate'
    ];
}
