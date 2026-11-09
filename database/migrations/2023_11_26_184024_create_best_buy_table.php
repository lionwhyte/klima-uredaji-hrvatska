<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestBuyTable extends Migration
{
    public function up()
    {
        Schema::create('best_buys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klima_uredaj_id');
            $table->foreign('klima_uredaj_id')->references('id')->on('klima_uredaji')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('best_buys');
    }
}
