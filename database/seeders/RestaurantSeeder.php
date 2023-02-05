<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('dataseeder.restaurants');
        foreach ( $restaurants as $restaurant ) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Restaurant::generateSlug($newRestaurant->name);
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->vat = $restaurant['vat'];
            $newRestaurant->email = $restaurant['email'];
            $newRestaurant->phone = $restaurant['phone'];
            $newRestaurant->opening_hours = $restaurant['opening_hours'];
            $newRestaurant->closing_hours = $restaurant['closing_hours'];
            $newRestaurant->opening_days = $restaurant['opening_days'];
            $newRestaurant->image = $restaurant['image'];
            $newRestaurant->website = $restaurant['website'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->rating = $restaurant['rating'];
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->save();
        }
    }
}