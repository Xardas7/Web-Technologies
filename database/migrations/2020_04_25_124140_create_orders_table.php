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
            $table->unsignedBigInteger('billing_address_id');
            $table->unsignedBigInteger('shipping_address_id');
            $table->text('shipping_address');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->string('track')->nullable();
            $table->double('amount');
            $table->enum('state',['in progress','success','shipped','finalized','delivery failed','canceled','returned']);
            $table->date('arrival_time')->nullable();
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
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}
