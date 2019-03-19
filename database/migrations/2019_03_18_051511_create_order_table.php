<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->string('address');
            $table->string('city',100);
            $table->string('state',100);
            $table->string('pincode',100);
            $table->string('country',100);
            $table->string('mobile',100);
            $table->float('shipping_charges');
            $table->string('order_status',100);
            $table->string('payment_method',100);
            $table->string('grand_total',100);
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
        Schema::dropIfExists('order');
    }
}
