<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('sales_man_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('price');
            $table->boolean('order_status')->comment('0-Order, 1-Order completed (Paid)');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('customer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('sales_man_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_histories');
    }
}
