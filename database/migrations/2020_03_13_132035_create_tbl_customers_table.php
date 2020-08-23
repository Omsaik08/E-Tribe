<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->bigIncrements('cust_id');
        			$table->string('cust_photo',40);
        			$table->string('cust_name',40);
        			$table->string('cust_phone',20)->unique();
        			$table->string('cust_email',40)->unique();
        			$table->string('cust_password',40)->unique();
        			$table->string('cust_home_addr',100);
        			$table->string('cust_office_addr',100);
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
        Schema::dropIfExists('tbl_customers');
    }
}
