<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned()->index()->nullable();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger("product_id")->unsigned()->index()->nullable();            
            $table->foreign('product_id')->references('id')->on('products');
            $table->string("transaction")->nullable();
            $table->integer("price")->default(0);
            $table->enum("position",["1","2","3",'4',"HR","RP","pending","lost"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winners');
    }
}
