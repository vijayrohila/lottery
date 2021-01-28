<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_id");
            $table->string("name");
            $table->string("email");
            $table->string("mobile");

            $table->BigInteger('network_id')->unsigned();
            $table->foreign('network_id')->references('id')->on('networks');

            $table->BigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->BigInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages');            
            
            $table->string("promotional_link");
            $table->string("image");
            $table->string("cost");
            $table->enum("post_type",["1","0"])->comment("1:18+,0:18+");
            $table->string("company_name")->nullable();
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
        Schema::dropIfExists('products');
    }
}
