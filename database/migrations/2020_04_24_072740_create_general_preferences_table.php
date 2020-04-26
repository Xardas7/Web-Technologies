<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('weight-unit',['kg','lb'])->default('kg');
            $table->enum('length-unit',['cm','m','in'])->default('cm');
            $table->enum('height',['feet','centimeters'])->default('centimeters');
            $table->enum('value',['dollar','euro'])->default('euro');
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
        Schema::dropIfExists('general_preferences');
    }
}
