<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Support\Str;



class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$faker = Factory::create();
     
        $categories = [];

        for ($i=0; $i <10 ; $i++) { 

            $title = $faker->unique()->sentence(1);
            $categories[] =[

                'title' => $title ,
                'slug' => Str::slug($title),
            ];
           
            foreach ($categories as $categorie) {
                categories::insert($categorie);
            }

        }*/
        //categories::factory()->count(10)->create(); 

 
      
        $nbCategories = 10;

        \App\Models\Category::factory($nbCategories )->make()->each(function($Categories) {
      
            $Categories->save();
        });



    }
}
