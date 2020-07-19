<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('material');
            $table->string('composition')->nullable();
            $table->integer('quantity')->default('1');
            $table->integer('width')->nullable();;
            $table->integer('height')->nullable();;
            $table->integer('depth')->nullable();;
            $table->integer('weight')->nullable();;
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('details');
        Schema::enableForeignKeyConstraints();
    }
}
