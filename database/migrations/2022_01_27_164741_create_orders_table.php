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
            $table->enum('status', ['pending', 'delivering', 'succeeded', 'canceled'])->index();
            $table->unsignedBigInteger('total')->index();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('shipping_fee');
            $table->unsignedBigInteger('discount');
            $table->enum('payment_method', ['cod', 'banking'])->index();
            $table->string('first_name')->index();
            $table->string('last_name')->index();
            $table->text('address')->index();
            $table->string('phone_number')->index();
            $table->timestamps();
            $table->softDeletes();
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
