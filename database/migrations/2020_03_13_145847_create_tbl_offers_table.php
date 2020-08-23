<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('tbl_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('discount_amount');
			
			$table->string('product_id',200);
			
			$table->dateTime('offer_start_date');
			$table->dateTime('offer_end_date');
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
        Schema::dropIfExists('tbl_offers');
    }
}
