<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function program()
    {
    	for ($i=1; $i < 100; $i++) { 
    		if($i%3 == 0 && $i%7 == 0){
    			echo "OpenSource"."<br/>";
    		} else if($i%3 == 0) {
    			echo "Open"."<br/>";
    		} else if($i%7 == 0) {
    			echo "Source"."<br/>";
    		}  else {
    			echo $i."<br/>";
    		}
    	}
    }
}



Tabel: product
			column: id, pro_name, price, date
					id is the Primary key

Tabel: category
			column: id, cat_name, cat_flag, cat_type
			id s the primary key

Table: procat
			column: product_id, cat_id
			product_id, cat_id are primary key together