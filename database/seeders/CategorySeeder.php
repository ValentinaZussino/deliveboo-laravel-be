<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('dataseeder.categories');
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Category::generateSlug($newCategory->name);
            $newCategory->save();
        }
    }
}
