<?php

use Illuminate\Database\Seeder;

class MaterialControlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('materialcontrol')->insert([
            [
                'recipe_id' => 1,
                'material_id' => 1,
                'amount' => '100g'
            ],
            [
                'recipe_id' => 1,
                'material_id' => 5,
                'amount' => '本'
            ],
            [
                'recipe_id' => 1,
                'material_id' => 6,
                'amount' => '大さじ1杯'
            ],
            [
                'recipe_id' => 1,
                'material_id' => 4,
                'amount' => '個'
            ],
            [
                'recipe_id' => 2,
                'material_id' => 2,
                'amount' => 'g'
            ],
            [
                'recipe_id' => 2,
                'material_id' => 9,
                'amount' => '本'
            ],
            [
                'recipe_id' => 2,
                'material_id' => 10,
                'amount' => '杯'
            ],
        ]);
    }
}
