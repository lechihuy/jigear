<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->longText('detail')->nullable();
            $table->unsignedBigInteger('unit_price')->nullable()->index();
            $table->unsignedBigInteger('stock')->nullable()->index();
            $table->boolean('published')->default(false)->index();
            $table->boolean('purchasable')->default(true)->index();
            $table->json('parameters')->nullable()->index();
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
        Schema::dropIfExists('products');
    }
}
