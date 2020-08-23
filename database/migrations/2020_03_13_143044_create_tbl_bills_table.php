<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tbl_bills', function (Blueprint $table) {
            $table->bigIncrements('bill_id');
			
			$table->bigInteger('order_id')->unsigned();
			$table->foreign('order_id')->references('order_id')->on('tbl_order_details');
			
			$table->dateTime('bill_date');
			$table->integer('discount');
			$table->double('total_bill',12,4);
			
			
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
        Schema::dropIfExists('tbl_bills');
    }
}
