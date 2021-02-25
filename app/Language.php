<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'code','name'
    ];

    public function product()
    {
       return $this->hasMany(Product::class);
    }
}
