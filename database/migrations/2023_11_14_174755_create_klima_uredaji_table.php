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
        Schema::create('klima_uredaji', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 50)->unique();
            $table->string('naslov');
            $table->decimal('cijena', 10, 2);
            $table->string('brend');
            $table->text('opis');
            $table->text('slike');
            $table->decimal('ucinak_hladenja_kw', 5, 2)->nullable();
            $table->string('energetski_razred_hladenja', 50)->nullable();
            $table->decimal('ucinak_grijanja_kw', 5, 2)->nullable();
            $table->string('energetski_razred_grijanja', 50)->nullable();
            $table->string('velicina_prostora_m2', 50)->nullable();
            $table->string('podrucje_rada_grijanje_c', 50)->nullable();
            $table->string('podrucje_rada_hladenje_c', 50)->nullable();
            $table->string('maksimalna_visinska_razlika_m', 50)->nullable();
            $table->string('maksimalna_duljina_cijevi_m', 50)->nullable();
            $table->string('promjer_cijevi_plin_mm', 50)->nullable();
            $table->string('promjer_cijevi_tekucina_mm', 50)->nullable();
            $table->string('razina_buke_vanjske_jedinice', 50)->nullable();
            $table->string('dimenzije_vanjske_jedinice_v_s_d', 50)->nullable();
            $table->string('razina_buke_hladenje_uj', 50)->nullable();
            $table->string('dimenzije_unutarnje_jedinice_v_s_d', 50)->nullable();
            $table->string('radna_tvar', 50)->nullable();
            $table->string('raspon_ucinka_hladenja_kw', 50)->nullable();
            $table->string('seer', 50)->nullable();
            $table->string('raspon_ucinka_grijanja_kw', 50)->nullable();
            $table->string('scop', 50)->nullable();
            $table->decimal('snaga_kw', 10, 1);
            $table->integer('prostor_m2');
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
        Schema::dropIfExists('klima_uredaji');
    }
};
