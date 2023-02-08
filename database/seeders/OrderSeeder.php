<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newOrder = new Order();
            $newOrder->name = $faker->firstName();
            $newOrder->last_name = $faker->lastName();
            $newOrder->email = $faker->email();
            $newOrder->address = $faker->streetAddress();
            $newOrder->phone = $faker->phoneNumber();
            $newOrder->total_amount = $faker->randomFloat(2, 1, 500);
            $newOrder->payed = $faker->boolean();
            $newOrder->date = $faker->date();
            $newOrder->restaurant_id = $faker->numberBetween(1, 11);
            $newOrder->save();
        }
    }   
}