<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->email = $faker->email();
            $user->password = bcrypt('deliveboo');
            $user->save();
        }
    }
}
