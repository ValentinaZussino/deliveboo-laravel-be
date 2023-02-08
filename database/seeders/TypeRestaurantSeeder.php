<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;
use App\Models\Type;

class TypeRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('dataseeder.restaurants');
        // dd($shopkeepers);
        foreach($restaurants as $restaurant) {
            foreach ($restaurant['type_id'] as $type)
                DB::table('restaurant_type')->insert([
                    'restaurant_id' => restaurant::where('name', $restaurant['name'])->first()->id,
                    'type_id' => $type,
                ]);
        }
    }
    }

