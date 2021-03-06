<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('order_items')){
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('id')->on('orders');
                $table->unsignedBigInteger('product_id');
                $table->string('product_name');
                $table->string('product_price');
                $table->string('product_image');
                $table->integer('quantity')->default(1);
                $table->decimal('price');

                $table->timestamps();
                $table->softDeletes();
            });
        }
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
