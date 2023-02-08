<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class OrderPlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++){
            DB::table('order_plate')->insert([
                'order_id' => $faker->numberBetween(1, 20),
                'plate_id' => $faker->numberBetween(1, 220),
                'quantity' => $faker->numberBetween(1, 30),
            ]);
        }
    }
}
