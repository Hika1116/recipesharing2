<?php

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
        DB::table('categorys')->insert([
            ['category_name'=>'朝ごはん',],
            ['category_name' => '昼ごはん',],
            ['category_name' => '夕食',],
            ['category_name' => 'スープ',],
            ['category_name' => '丼ぶり',],
            ['category_name' => '麺類',],
        ]);
    }
}
