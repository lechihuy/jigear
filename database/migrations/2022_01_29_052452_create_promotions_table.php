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
            $table->string('name')->unique();
            $table->string('code')->unique()->nullable();
            $table->enum('type', ['sale_off', 'voucher']);
            $table->string('value');
            $table->boolean('is_percent_unit');
            $table->unsignedBigInteger('max')->nullable();
            $table->boolean('actived')->default(true);
            $table->unsignedBigInteger('init_uses');
            $table->unsignedBigInteger('remaining_uses');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->useCurrent()->nullable();
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
