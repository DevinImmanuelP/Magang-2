<?php

namespace Database\Seeders;

use App\Models\celana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class celanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 10 ; $i++) { 
            celana::create([
                'merk'=>$faker->name,
                'ukuran'=>'xl',
                'panjang_cm'=>$faker->phoneNumber
            ]);
        }
    }
}
