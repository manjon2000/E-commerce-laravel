<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_es = Faker\Factory::create('es_ES');
        $faker_fr = Faker\Factory::create('fr_FR');

        for($i=0;$i<100;$i++){
            City::create([
                'name'=>$faker_es->city,
                'country_id'=>1,
            ]);
            City::create([
                'name'=>$faker_fr->city,
                'country_id'=>2,
            ]);
        }
    }
}
