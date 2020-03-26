<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RecipeTableSeeder::class);
        $this->call(RecipeProcessTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CategoryControlTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(MaterialControlTableSeeder::class);
    }
}
