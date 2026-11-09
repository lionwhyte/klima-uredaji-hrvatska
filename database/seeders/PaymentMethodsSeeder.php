<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            ['name' => 'plaćanje po ponudi'],
            ['name' => 'plaćanje na rate'],
            ['name' => 'gotovinsko plaćanje'],
            // Add more payment methods as needed
        ]);
    }
}
