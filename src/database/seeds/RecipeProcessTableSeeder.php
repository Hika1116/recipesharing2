<?php

use Illuminate\Database\Seeder;

class RecipeProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipesprocess')->insert([
            [ 
                'recipe_id'=>1,
                 'recipe_order'=>1,
                'process_text'=>'レシピ手順1'
            ],
            [
                'recipe_id' => 1,
                'recipe_order' => 2,
                'process_text' => 'レシピ手順2'
            ],
            [
                'recipe_id' => 1,
                'recipe_order' => 3,
                'process_text' => 'レシピ手順3'
            ],
        ]);
    }
}
