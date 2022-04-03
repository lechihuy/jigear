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
            $table->string('title')->fullText();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->longText('detail')->nullable();
            $table->unsignedBigInteger('unit_price')->default(0)->index();
            $table->unsignedBigInteger('stock')->default(0)->index();
            $table->unsignedBigInteger('catalog_id')->nullable();
            $table->boolean('published')->default(false)->index();
            $table->json('parameters')->nullable();
            $table->timestamps();

            $table->unique('title');
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
