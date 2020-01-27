<?php

use App\Post;
use App\Category;
use App\PostInformation;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {        
        //Creiamo 30 nuovi post
        for ($i=0; $i < 30; $i++) { 
            //Dati del post base
            $newPostData = [
                //prendiamo una categoria random
                'category_id' => Category::inRandomOrder()->first()->id,
                'title' => $faker->word,
                'author' => $faker->name,
            ];

            //Salviamo i dati base
            $newPost = new Post;

            $newPost->fill($newPostData);
            $newPost->save();

            //Creiamo anche i dati per la relazione one to one (dati aggiuntivi)
            $postInformation = new PostInformation;

            $postInformation->fill([
                'post_id' => $newPost->id,
                'description' => $faker->text,
                'slug' => Str::slug($newPost->title)
            ]);

            $postInformation->save();
        }

    }
}
