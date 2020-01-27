<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //3 categorie statiche
        $categories = [
            ['title' => 'Tempo Libero', 'slug' => 'tempo-libero'],
            ['title' => 'Informatica', 'slug' => 'informatica'],
            ['title' => 'Viaggi', 'slug' => 'viaggi'],
        ];

        //cicliamo sulle categorie che vogliamo creare e salviamole
        foreach ($categories as $category)
        {
            $newCategory = new Category;
            $newCategory->fill($category);

            $newCategory->save();
        }
    }
}
