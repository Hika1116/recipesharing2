<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name'=> 'hikaru',
            'email'=> 'hiro_hika_1116@icloud.com',
            'password'=> bcrypt('hika1116'),
        ];
        DB::table('users')->insert($param);
    }
}
