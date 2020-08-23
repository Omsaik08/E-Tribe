<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->bigIncrements('order_id');
			
			
			$table->bigInteger('cust_id')->unsigned();
			$table->foreign('cust_id')->references('cust_id')->on('tbl_customers');
			
			$table->bigInteger('product_id')->unsigned();
			$table->foreign('product_id')->references('product_id')->on('tbl_products');
			
			$table->integer('quantity');
			$table->dateTime('order_date');
			$table->double('total_price',12,4);
			$table->dateTime('ship_date');
			
			
			
			
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
        Schema::dropIfExists('tbl_order_details');
    }
}
