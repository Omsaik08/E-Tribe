<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('tbl_requests', function (Blueprint $table) {
			$table->bigIncrements('request_id');
			
            $table->bigInteger('supplier_id')->unsigned();
			$table->foreign('supplier_id')->references('supplier_id')->on('tbl_supplier_products');
			
			$table->decimal('category_id',3);
			$table->string('product_name',70);
            $table->string('product_image',50);
            $table->decimal('product_quantity');
			$table->string('request_status',40);
            $table->double('price',12,4);
			
            
			
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
        Schema::dropIfExists('tbl_requests');
    }
}
