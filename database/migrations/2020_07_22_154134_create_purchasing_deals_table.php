<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasing_deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('seller_name');
            $table->unsignedBigInteger('container_id');
            $table->unsignedBigInteger('content_id');
            $table->unsignedInteger('total_containers');
            $table->unsignedInteger('remaining_containers');
            $table->timestamps();

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
        Schema::dropIfExists('purchasing_deals');
    }
}
