<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('is_new_site');
            $table->string('main_features');
            $table->string('ecommerce_payment_options');
            $table->string('ecommerce_products_upload');
            $table->string('ecommerce_products_quantity');
            $table->string('portfolio_features');
            $table->string('blog_options');
            $table->string('size');
            $table->string('public_site_options');
            $table->string('graphics_features');
            $table->string('is_logo_required');
            $table->string('site_content');
            $table->string('time_frame');
            $table->string('total');
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
        Schema::drop('requirements');
    }
}
