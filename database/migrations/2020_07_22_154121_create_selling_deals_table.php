<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trader_id');
            $table->unsignedInteger('boxes_count');
            $table->float('boxe_price')->unsigned();
            $table->float('total_paid')->unsigned();
            $table->float('bets')->unsigned();
            $table->timestamps();

            $table->foreign('trader_id')->references('id')->on('traders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selling_deals');
    }
}
