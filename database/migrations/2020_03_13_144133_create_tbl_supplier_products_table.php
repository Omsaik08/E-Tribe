<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSupplierProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier_products', function (Blueprint $table) {
			
            $table->bigIncrements('supplier_id');
			$table->string('supplier_name',40);
			$table->string('phone',20)->unique();
			$table->string('supplier_email',40)->unique();
			$table->string('supplier_password',40)->unique();
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
        Schema::dropIfExists('tbl_supplier_products');
    }
}
