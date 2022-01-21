<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('sale_off', ['easy', 'hard']);
            $table->string('value');
            $table->boolean('actived');
            $table->unsignedBigInteger('init_uses');
            $table->unsignedBigInteger('remaining_uses');
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->useCurrent();
            $table->timestamp('deleted_at')->useCurrent();
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
        Schema::dropIfExists('sale_promotions');
    }
}
