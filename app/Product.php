<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id',  'name', 'cost', 'image','start','end'
    ];

    public function batting()
    {
        return $this->hasMany(Winner::class);
    }

    public function winner()
    {
        return $this->hasMany(Winner::class)->whereNotIn("position",["pending","lost"]);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    
}
