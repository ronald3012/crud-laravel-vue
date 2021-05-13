<?php

use Illuminate\Database\Seeder;

class usuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
            'name' => 'Ronald De Leon',
            'email' => 'r.deleon@technologies.com.do',
            'password' => bcrypt('123456')]);
    }
}
