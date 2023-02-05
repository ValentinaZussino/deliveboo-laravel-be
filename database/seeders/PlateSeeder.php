<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plate;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = config('dataseeder.plates');
        foreach ($plates as $plate) {
            foreach ($plate['restaurant_id'] as $restaurant_id){
                $newPlate = new Plate();
                $newPlate->name = $plate['name'];
                $newPlate->slug = Plate::generateSlug($newPlate->name, $restaurant_id);
                $newPlate->price = $plate['price'];
                $newPlate->available = $plate['available'];
                $newPlate->image = $plate['image'];
                $newPlate->ingredients = $plate['ingredients'];
                $newPlate->allergens = $plate['allergens'];
                $newPlate->size = $plate['size'];
                $newPlate->restaurant_id = $restaurant_id;
                $newPlate->category_id = $plate['category_id'];
                $newPlate->save();
            }
        }
    }
}