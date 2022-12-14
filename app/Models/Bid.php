<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $table = 'bid';
    protected $fillable = [
        'bidID',
        'auctionID',
        'Bidder',
        'bidPrice'
    ];
}
