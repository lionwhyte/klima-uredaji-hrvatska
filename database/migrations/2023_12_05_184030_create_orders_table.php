<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->unsignedBigInteger('payment_method_id');
            $table->string('buyer_name');
            $table->string('buyer_lastname');
            $table->string('buyer_company_name')->nullable();
            $table->string('buyer_country');
            $table->string('buyer_address');
            $table->string('buyer_apartment_number_or_floor')->nullable();
            $table->string('buyer_city');
            $table->string('buyer_county');
            $table->string('buyer_postal_code');
            $table->string('buyer_phone_number');
            $table->string('buyer_email');
            $table->text('buyer_remarks')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->boolean('email_sent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
