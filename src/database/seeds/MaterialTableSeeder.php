<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            [
                'material_name' => 'ひき肉'
            ],
            [
                'material_name' => '鶏肉'
            ],
            [
                'material_name' => '豚バラ'
            ],
            [
                'material_name' => '玉ねぎ'
            ],
            [
                'material_name' => '人参'
            ],
            [
                'material_name' => '白菜'
            ],
            [
                'material_name' => 'なす'
            ],
            [
                'material_name' => '砂糖'
            ],
            [
                'material_name' => 'しお'
            ],
            [
                'material_name' => '酢'
            ],
            [
                'material_name' => '牛ひき肉'
            ],
            [
                'material_name' => '牛乳'
            ],
            [
                'material_name' => 'にんにく'
            ],
        ]);
    }
}
