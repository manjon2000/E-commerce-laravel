<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'is_admin'    => 1,
            'password' => bcrypt('1234'),
        ]);
        $faker_es = Faker\Factory::create('es_ES');
        for ($i=0; $i < 20; $i++) { 
            User::create([
                'name'=>$faker_es->name,
                'email'=>$faker_es->email,
                'password' => bcrypt('1234'),
            ]);
        }
    }
}
