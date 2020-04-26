<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_has_groups', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('user_has_groups', function(Blueprint $table0) {
            $table0->foreign('group_id')->references('id')
                ->on('groups')->onDelete('cascade'); });

        Schema::table('group_has_services', function(Blueprint $table0) {
            $table0->foreign('group_id')->references('id')
                ->on('groups')->onDelete('cascade'); });

        Schema::table('group_has_services', function(Blueprint $table0) {
            $table0->foreign('service_id')->references('id')
                ->on('services')->onDelete('cascade'); });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
