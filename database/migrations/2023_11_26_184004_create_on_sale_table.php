<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnSaleTable extends Migration
{
    public function up()
    {
        Schema::create('on_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klima_uredaj_id');
            $table->foreign('klima_uredaj_id')->references('id')->on('klima_uredaji')->onDelete('cascade');
            $table->decimal('discount', 5, 2)->nullable();
            $table->timestamp('time_till_sale');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('on_sales');
    }
}
