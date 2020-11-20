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
            $table->unsignedBigInteger('container_id');
            $table->unsignedBigInteger('content_id');
            $table->unsignedInteger('container_count')->nullable();
            $table->float('container_price')->unsigned()->nullable();
            $table->float('container_kilos')->unsigned()->nullable();
            $table->float('kilo_price')->unsigned()->nullable();
            $table->float('total_containers_price')->unsigned();
            $table->float('total_paid')->unsigned();
            $table->float('total_unpaid')->unsigned();
            $table->float('bets')->unsigned();
            $table->timestamps();

            $table->foreign('trader_id')->references('id')->on('traders')->onDelete('cascade');
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
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
