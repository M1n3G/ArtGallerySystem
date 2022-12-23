<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Auction extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'auction';
    protected $fillable = [
        'auctionID',
        'username',
        'auctionName',
        'auctionDesc',
        'auctionCate',
        'startPrice',
        'bidPrice',
        'endPrice',
        'start_date',
        'auctionStatus'
    ];

    public function userName()
    {
        return $this->belongsTo(User::class);
    }
}
