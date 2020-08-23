<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('tbl_payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
			
			$table->bigInteger('bill_id')->unsigned();			
			$table->foreign('bill_id')->references('bill_id')->on('tbl_bills');
			
			$table->string('payment_type',20);
			$table->dateTime('payment_date');
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
        Schema::dropIfExists('tbl_payments');
    }
}
