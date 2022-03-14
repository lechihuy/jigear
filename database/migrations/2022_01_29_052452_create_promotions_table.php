<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->fullText();
            $table->string('code')->unique()->nullable();
            $table->enum('type', ['voucher', 'sale_off'])->index();
            $table->string('value');
            $table->boolean('is_percent_unit');
            $table->boolean('actived')->default(true)->index();
            $table->unsignedBigInteger('init_uses');
            $table->unsignedBigInteger('remaining_uses')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('started_at')->useCurrent()->index();
            $table->timestamp('ended_at')->nullable()->index();

            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}