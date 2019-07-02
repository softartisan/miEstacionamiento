<?php

use Illuminate\Database\Seeder;
use App\Estacionamiento;

class EstacionamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estacionamiento::create([
            'precio_hora' => 1000,
            'islibre' => 1,
            'lat' => -33.432379,
            'lon' => -70.615861,
            'direccion' => 'Antonio Varas 536, Providencia, Región Metropolitana',
            'usuario_id' => 2
        ]);

        Estacionamiento::create([
            'precio_hora' => 2000,
            'islibre' => 1,
            'lat' => -33.432885,
            'lon' =>  -70.615899,
            'direccion' => 'Antonio Varas 621, Providencia, Región Metropolitana',
            'usuario_id' => 2
        ]);

        Estacionamiento::create([
            'precio_hora' => 1500,
            'islibre' => 1,
            'lat' => -33.433362,
            'lon' => -70.614542,
            'direccion' => 'Federico Froebel 1698-1492, Providencia, Región Metropolitana',
            'usuario_id' => 2
        ]);
    }
}
