<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::all();
        $categoriesId = $categories->pluck('id');

        for ($i=0; $i < 100 ; $i++) { 
            $post = new Post();

            $post->title = $faker->words(7, true);
            $post->slug = Str::slug( $post->title );
            $post->content = $faker->paragraphs(10, true);
            $post->published_at = $faker->randomElement([null, $faker->dateTime()]);

            $post->save();
        }
    }
}
