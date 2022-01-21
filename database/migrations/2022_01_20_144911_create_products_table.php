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
            $table->string('sku')->unique();
            $table->string('title')->unique();
            $table->text('description');
            $table->longText('detail');
            $table->unsignedBigInteger('unit_price');
            $table->unsignedBigInteger('thumbnail_id');
            $table->unsignedBigInteger('stock');
            $table->boolean('published');
            $table->timestamp('deleted_at')->useCurrent();
            $table->boolean('purchasable');
            $table->json('parameters');
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
        Schema::dropIfExists('products');
    }
}
