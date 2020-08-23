	<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {

        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');

			$table->bigInteger('supplier_id')->unsigned();
			$table->foreign('supplier_id')->references('supplier_id')->on('tbl_supplier_products');

			$table->bigInteger('category_id')->unsigned();
			$table->foreign('category_id')->references('category_id')->on('tbl_product_categories');


			$table->string('product_name',70);
			$table->decimal('quantity');
			$table->string('image',50);
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
        Schema::dropIfExists('tbl_products');
    }
}
