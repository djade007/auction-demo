<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $guarded = ['id'];

    public function bids() {
        return $this->hasMany(Bid::class);
    }
}
