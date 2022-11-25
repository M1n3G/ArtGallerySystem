<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";

    public $incrementing = false;

    protected $fillable = [
        'name',
        'contact',
        'address',
        'city',
        'state',
        'postalcode',
        'houseno',
    ];
}