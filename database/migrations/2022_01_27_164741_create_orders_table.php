<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->enum('status', ['pending', 'delivering', 'succeeded', 'canceled']);
            $table->unsignedBigInteger('total');
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('shipping_fee');
            $table->unsignedBigInteger('discount');
            $table->enum('payment_method', ['cod', 'banking']);
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('phone_number');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'payment_method', 'total', 'first_name', 'last_name', 'address', 'phone_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
