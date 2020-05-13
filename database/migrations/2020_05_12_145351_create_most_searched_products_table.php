<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMostSearchedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('most_searched_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->integer('count');
            $table->timestamps();
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('most_searched_products');
        Schema::enableForeignKeyConstraints();
    }
}
