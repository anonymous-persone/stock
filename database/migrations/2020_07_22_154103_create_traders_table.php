<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subregion_id');
            $table->string('name');
            $table->string('phone', 20);
            $table->float('money_indebtedness')->unsigned();
            $table->timestamps();

            $table->foreign('subregion_id')->references('id')->on('subregions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traders');
    }
}
