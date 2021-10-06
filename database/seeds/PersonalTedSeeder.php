<?php

use App\PersonalTed;
use Illuminate\Database\Seeder;

class PersonalTedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalTed::create([
            'NombreCompleto'=>'Dr. Franz Victor Jiménez Vásquez',
            'Cargo'=>'PRESIDENTE',
            'Posicion'=> 1,
        ]);
        PersonalTed::create([
            'NombreCompleto'=>'Dra. Zonia Yujra Porce',
            'Cargo'=>'VICEPRESIDENTA',
            'Posicion'=> 2,
        ]);
        PersonalTed::create([
            'NombreCompleto'=>'Dr. Antonio Condori Huanca',
            'Cargo'=>'VOCAL',
            'Posicion'=> 3,
        ]);
        PersonalTed::create([
            'NombreCompleto'=>'Dra. Gisela Eugenia Pérez Escobar',
            'Cargo'=>'VOCAL',
            'Posicion'=> 4,
        ]);
        PersonalTed::create([
            'NombreCompleto'=>'Lic. Sabino Chávez Mamani',
            'Cargo'=>'VOCAL',
            'Posicion'=> 5,
        ]);
        PersonalTed::create([
            'NombreCompleto'=>'Dr. Alfredo José Guzman Villarreal',
            'Cargo'=>'SECRETARIO DE CAMARA',
            'Posicion'=> 6,
        ]);

    }
}
