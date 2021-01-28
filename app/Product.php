<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id','name','email','network','country','language','promotional_link','image','cost','post_type','company_name','mobile'
    ];
}
