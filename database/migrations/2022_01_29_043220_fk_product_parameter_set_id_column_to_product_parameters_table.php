<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkProductParameterSetIdColumnToProductParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_parameters', function (Blueprint $table) {
            $table->foreign('product_parameter_set_id')->references('id')->on('product_parameter_sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_parameters', function (Blueprint $table) {
            $table->dropForeign(['product_parameter_set_id']);
        });
    }
}
