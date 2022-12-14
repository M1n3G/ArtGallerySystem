<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $fillable = [
        'paymentID',
        'payer_id',
        'userEmail',
        'itemID',
        'type',
        'amount',
        'currency',
        'paymentStatus'
    ];
}
