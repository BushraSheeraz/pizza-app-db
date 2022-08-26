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
            $table->increments('id');
            $table->integer('price');
            $table->timestamp('time')->nullable();
            $table->unsignedInteger('order_typeId');
            $table->foreign('order_typeId')->references('id')->on('order_types')->onDelete('cascade');
            $table->unsignedInteger('order_statusId');
            $table->foreign('order_statusId')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->boolean('is_paid')->default(0);
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
