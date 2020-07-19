<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiaveEsterne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('user_has_groups', function(Blueprint $table0) {
        //     $table0->foreign('user_id')->references('id')
        //         ->on('users')->onDelete('cascade'); });

        // Schema::table('user_has_groups', function(Blueprint $table0) {
        //     $table0->foreign('group_id')->references('id')
        //         ->on('groups')->onDelete('cascade'); });

        // Schema::table('group_has_services', function(Blueprint $table0) {
        //     $table0->foreign('group_id')->references('id')
        //         ->on('groups')->onDelete('cascade'); });

        // Schema::table('group_has_services', function(Blueprint $table0) {
        //     $table0->foreign('service_id')->references('id')
        //         ->on('services')->onDelete('cascade'); });

        Schema::table('avatars', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('comments', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('comments', function(Blueprint $table0) {
            $table0->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade'); });

        Schema::table('shopping_carts', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('orders', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('orders', function(Blueprint $table0) {
            $table0->foreign('coupon_id')->references('id')
                ->on('coupons')->onDelete('cascade'); });

        Schema::table('orders', function(Blueprint $table0) {
            $table0->foreign('card_id')->references('id')
                ->on('cards')->onDelete('set null'); });

        /*Schema::table('orders', function(Blueprint $table0) {
            $table0->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('cascade'); });*/

        Schema::table('preferences', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('preferences', function(Blueprint $table0) {
            $table0->foreign('producer_id')->references('id')
                ->on('producers')->onDelete('cascade'); });

        Schema::table('general_preferences', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('products', function(Blueprint $table0) {
            $table0->foreign('producer_id')->references('id')
                ->on('producers')->onDelete('cascade'); });

        Schema::table('products', function(Blueprint $table0){
            $table0->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
        });

        Schema::table('categories_have_sizes', function(Blueprint $table0) {
            $table0->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade'); });

         Schema::table('categories_have_sizes', function(Blueprint $table0) {
            $table0->foreign('size_id')->references('id')
                ->on('sizes')->onDelete('cascade'); });

        Schema::table('details', function(Blueprint $table0) {
            $table0->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade'); });

        Schema::table('orders_have_products', function(Blueprint $table0) {
            $table0->foreign('product_id')->references('id')
                ->on('products')->onDelete('set null'); });

        Schema::table('orders_have_products', function(Blueprint $table0) {
            $table0->foreign('order_id')->references('id')
                ->on('orders')->onDelete('cascade'); });

        Schema::table('addresses', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('wish_lists', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('wish_lists', function(Blueprint $table0) {
            $table0->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade'); });


        Schema::table('cards', function(Blueprint $table0) {
            $table0->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); });

        Schema::table('shopping_carts_have_products', function(Blueprint $table0) {
            $table0->foreign('shoppingcart_id')->references('id')
                ->on('shopping_carts')->onDelete('cascade'); });

        Schema::table('shopping_carts_have_products', function(Blueprint $table0) {
            $table0->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade'); });

        Schema::table('users', function(Blueprint $table0) {
            $table0->foreign('default_address')->references('id')
                ->on('addresses')->onDelete('set null'); });

        Schema::table('images', function(Blueprint $table0) {
            $table0->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade'); });

        Schema::table('users_like_comments', function(Blueprint $table0){
            $table0->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
        });    

        Schema::table('users_like_comments', function(Blueprint $table0){
            $table0->foreign('comment_id')->references('id')
            ->on('comments')->onDelete('cascade');
        }); 
        }

        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
