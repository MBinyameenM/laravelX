<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->bigIncrements('id');
            $table->integer("category_id")->unsigned();
            $table->integer("product_id")->unsigned();
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign("product_id")->references("id")->on("products")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
}
