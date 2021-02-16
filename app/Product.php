<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id','name','email','network_id','country_id','language_id','promotional_link','image','cost','post_type','company_name','mobile','content','currency','payment_id','delete_count','is_deleted','view'
    ];
}
