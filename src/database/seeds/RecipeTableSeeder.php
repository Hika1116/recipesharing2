<?php

use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [ 
                'user_id'=>1
                ,'title'=>'title1'
                , 'sentence'=>'1番目のレシピ投稿です。初めての投稿です。手軽で簡単なレシピなのでみなさん真似してみてください。'
            ],
            [ 
                'user_id'=>1
                ,'title'=>'title3'
                , 'sentence'=>'2番目のレシピ投稿です。'
            ],
            [ 
                'user_id'=>1
                ,'title'=>'title3'
                , 'sentence'=>'3番目のレシピ投稿です。'
            ],
            [ 
                'user_id'=>1
                ,'title'=>'title4'
                , 'sentence'=>'4番目のレシピ投稿です。'
            ],
        ]);
    }
}
