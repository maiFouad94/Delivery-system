<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('id');
            $table->string('dest_lat');
            $table->string('dest_long');
            $table->integer('location_id')->default(1);            
            $table->integer('is_picked')->default(0);
            $table->integer('is_delivered')->default(0);
            $table->integer('is_failed')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('user_name');
            $table->string('phone');
            $table->string('dest_address');
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
