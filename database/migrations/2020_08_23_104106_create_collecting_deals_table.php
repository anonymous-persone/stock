<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectingDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collecting_deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trader_id');
            $table->unsignedBigInteger('container_id');
            $table->unsignedInteger('container_indebtedness_before');
            $table->unsignedInteger('container_count');
            $table->unsignedInteger('container_indebtedness_after');
            $table->float('money_indebtedness_before')->unsigned();
            $table->float('paid')->unsigned();
            $table->float('money_indebtedness_after')->unsigned();
            $table->timestamps();

            $table->foreign('trader_id')->references('id')->on('traders')->onDelete('cascade');
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collecting_deals');
    }
}
