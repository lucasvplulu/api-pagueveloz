<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Natela Soluções Web' ,
            'email'     => 'comercial@natelaweb.com.br' ,
            'password'  => bcrypt('natela#2000@') ,
            'is_master' => '1' ,
        ]);
    }
}
