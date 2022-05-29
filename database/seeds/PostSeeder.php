<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $newPost = new Post();
            $newPost->title = ucfirst($faker->unique()->realTextBetween(6, 16));
            $newPost->text = $faker->realText(400);
            $newPost->author = $faker->name();
            $newPost->img = "https://picsum.photos/id/$i/450/600";
            $newPost->slug = Str::slug($newPost->title, '-')."-$i";
            $newPost->save();
        }
    }
}
