<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('coupon_id');
            $table->string('track');
            $table->string('card_number');
            $table->string('name',40);
            $table->string('surname',40);
            $table->date('exp_date');
            $table->integer('cvv');
            $table->double('amount');
            $table->enum('state',['success','in progress','shipped','finalized','delivery failed','canceled','returned']);
            $table->date('arrival_time');
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
        Schema::dropIfExists('orders');
    }
}
