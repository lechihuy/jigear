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
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->enum('status', ['pending', 'delivering', 'succeed', 'canceled'])
                ->default('pending')->index();
            $table->unsignedBigInteger('total')->index();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('shipping_fee');
            $table->unsignedBigInteger('discount')->default(0);
            $table->enum('payment_method', ['cod', 'banking'])->index()->nullable();
            $table->string('first_name')->index()->nullable();
            $table->string('last_name')->index()->nullable();
            $table->enum('gender', [0, 1, 2])->index()->nullable();
            $table->text('address')->fullText()->nullable();
            $table->string('phone_number')->index()->nullable();
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
        Schema::dropIfExists('orders');
    }
}
