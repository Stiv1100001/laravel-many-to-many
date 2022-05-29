<?php

use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ['food', 'travel', 'holiday', 'tech', 'actuality', 'politics', 'adventure'];
        for ($i = 0; $i < count($categories) ; $i++) {
            $newCategory = new Category();
            $newCategory->name = $categories[$i];
            $newCategory->color = $faker->unique()->hexColor();
            $newCategory->save();
        }
    }
}
