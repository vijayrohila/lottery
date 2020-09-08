<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'date',  'trust_name', 'state', 'country','amount','image'
    ];
}
